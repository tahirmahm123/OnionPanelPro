<?php

namespace App\Http\Controllers;

use App\Http\Requests\VPN\CreateVPNRequest;
use App\Http\Requests\VPN\ExtendVPNByDateRequest;
use App\Http\Requests\VPN\ExtendVPNByDayRequest;
use App\Http\Requests\VPN\UpdateVPNRequest;
use App\Slips;
use App\VPNUser;
use Illuminate\Http\Request;

class VPNUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vpn.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vpn.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVPNRequest $request)
    {
        $slip = $image = "storage/".$request->slip->store("slips");
        VPNUser::create([
            'username' => $request->username,
            'password' => $request->password,
            'platform' => $request->platform,
            'days' => $request->days,
            'phone' => $request->phone,
            'createdBy' => auth()->user()->username,
            'updatedBy' => auth()->user()->username,
            'isActive' => true
        ]);
        Slips::create([
            'username' => $request->username,
            'slipPath' => $slip,
            'dateOnSlip' => $request->dateOfSlip,
            'uploadedBy' => auth()->user()->username,
        ]);
        session()->flash('createVPN' , [
            'message' => "VPN Account Created Successfully.",
            'username' => $request->username,
            'password' => $request->password
        ]);
        return redirect(route('vpn.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VPNUser  $vPNUser
     * @return \Illuminate\Http\Response
     */
    public function show(VPNUser $vPNUser)
    {
        return response()->json(["data"=>VPNUser::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VPNUser  $vPNUser
     * @return \Illuminate\Http\Response
     */
    public function edit(VPNUser $vpn)
    {
        /*$user = VPNUser::find($vPNUser);*/
        return view('vpn.create')->withUser($vpn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VPNUser  $vPNUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVPNRequest $request, VPNUser $vpn)
    {
        $vpn->update([
            'username' => $request->username,
            'password' => $request->password,
            'platform' => $request->platform,
            'days' => $request->days,
            'phone' => $request->phone,
            'updatedBy' => auth()->user()->username,
            'isActive' => true
        ]);
        return redirect(route('vpn.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VPNUser  $vPNUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(VPNUser $vPNUser)
    {
        //
    }

    /**
     * @param VPNUser $vpn
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePlatform(VPNUser $vpn){
        $platform = ($vpn->platform == "OnionVPN" ? "AnyConnect" : "OnionVPN" );
        $vpn->update([
            'platform' => $platform,
            'updatedBy' => auth()->user()->username
        ]);
        return response()->json([
            'state' => true,
            'platform' => $platform
        ]);
    }

    /**
     * @param VPNUser $vpn
     * @return \Illuminate\Http\JsonResponse
     */
    public function activeUser(VPNUser $vpn){
        $vpn->update([
            'isActive' => true,
            'updatedBy' => auth()->user()->username
        ]);
        return response()->json(array("status"=>true,"message"=>"User ".$vpn->username. " Activated",'isActive'=>true));
    }

    /**
     * @param VPNUser $vpn
     * @return \Illuminate\Http\JsonResponse
     */
    public function deactiveUser(VPNUser $vpn){
        $vpn->update([
            'isActive' => false,
            'updatedBy' => auth()->user()->username
        ]);
        return response()->json(array("status"=>true,"message"=>"User ".$vpn->username. " Deactivated",'isActive'=>false));
    }

    /**
     * @param VPNUser $vpn
     * @return string
     */
    public function getUserSlips(VPNUser $vpn){
        $data = $vpn->slips;
        $output = "";
        if(count($data)>0){
            $count = 0;
            foreach($data as $key){
                $output.="<tr><td>".++$count."</td>
                    <td><span class='badge text-white bg-" . $key->currentStatus->color . "'>" . $key->currentStatus->text . "</span></td>
                    <td><a href='".asset($key->slipPath)."' target='_blank'>View Slip</a></td>
                    <td>".$key->dateOnSlip."</td></tr>";
            }
        }else{
            $output.="<tr><td colspan='4'><center>No Record Found</center></td></tr>";
        }
        return $output;
    }
    public function extendUser(VPNUser $vpn){
        return view('vpn.extend')->withUser($vpn);
    }

    /**
     * @param ExtendVPNByDateRequest $request
     * @param VPNUser $vpn
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function extendUserByDate(ExtendVPNByDateRequest $request, VPNUser $vpn){
        $vpn->update([
            'expiryDate' => $request->extendByDate,
            'updatedBy' => auth()->user()->username
        ]);
        $slip = $image = "storage/".$request->slip->store("slips");
        Slips::create([
            'username' => $request->username,
            'slipPath' => $slip,
            'dateOnSlip' => $request->dateOnSlip,
            'uploadedBy' => auth()->user()->username,
        ]);
        return redirect(route('vpn.index'));
    }

    /**
     * @param ExtendVPNByDayRequest $request
     * @param VPNUser $vpn
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function extendUserByDay(ExtendVPNByDayRequest $request, VPNUser $vpn){
        $days = $request->extendByDay*$request->typeOfDate;
        if($vpn->expiryDate==null){
            $vpn->update([
                'days' => $days+$vpn->days,
                'updatedBy' => auth()->user()->username
            ]);
        }else{
            $dateArray = explode("-",$vpn->expiryDate);
            $dateStamp = mktime(0,0,0,$dateArray[1],$dateArray[2],$dateArray[0])+($days*86400);
            $vpn->update([
                'expiryDate' => date('Y-m-d',$dateStamp)
            ]);
        }
        $slip = $image = "storage/".$request->slip->store("slips");
        Slips::create([
            'username' => $request->username,
            'slipPath' => $slip,
            'dateOnSlip' => $request->dateOnSlip,
            'uploadedBy' => auth()->user()->username,
        ]);
        return redirect(route('vpn.index'));
    }
}
