<?php

namespace App\Http\Controllers;

use App\Slips;
use Illuminate\Http\Request;

class SlipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slips.index')->withSlips(Slips::where('status','pending')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slips  $slips
     * @return \Illuminate\Http\Response
     */
    public function show(Slips $slips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slips  $slips
     * @return \Illuminate\Http\Response
     */
    public function edit(Slips $slips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slips  $slips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slips $slips)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slips  $slips
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slips $slips)
    {
        //
    }

    /**
     * @param Slips $slip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Slips $slip){
        $slip->update([
            'status' => 'approved'
        ]);
        session()->flash('success','Payment Approved Successfully');
        return redirect()->back();
    }

    /**
     * @param Slips $slip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deny(Slips $slip){
        $slip->update([
            'status' => 'denied'
        ]);
        session()->flash('fail','Payment Denied');
        return redirect()->back();
    }
}
