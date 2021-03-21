@extends('layouts.basiclayout')

@section('content')
    <div class="container-fluid relative animatedParent animateOnce p-lg-3">
        <div class="row row-eq-height my-2">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>Last Update</div>
                                    <div><span class="badge badge-pill badge-primary" id="totalUserTime">00:00</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter" id="totalUser">0</div>
                                    All Users
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>Last Update</div>
                                    <div><span class="badge badge-pill badge-primary" id="activeUserTime">00:00</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter" id="activeUser">0</div>
                                    Active Users
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>Last Update</div>
                                    <div><span class="badge badge-pill badge-primary" id="deactiveUserTime">00:00</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter" id="deactiveUser">0</div>
                                    Deactivated Users
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>Last Update</div>
                                    <div><span class="badge badge-pill badge-primary" id="demoUserTime">00:00</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter" id="demoUser">0</div>
                                    Demo Created
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>Last Update</div>
                                    <div><span class="badge badge-pill badge-primary" id="onionVPNTime">00:00</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter" id="onionVPN">0</div>
                                    Onion VPN Server
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>Last Update</div>
                                    <div><span class="badge badge-pill badge-primary" id="anyConnectTime">00:00</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter" id="anyConnect">0</div>
                                    AnyConnect Server
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-timer s-18"></i></div>
                                    <div><span class="badge badge-pill badge-primary">4:30</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">68</div>
                                    Total Added Servers
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-user-circle-o s-18"></i></div>
                                    <div><span class="badge badge-pill badge-danger">4:30</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">170</div>
                                    Active Servers
                                </div>

                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body no-p">
                    <div class="bg-primary text-white lighten-2">
                        <div class="pt-5 pb-4 pl-5 pr-5">
                            <h5 class="font-weight-normal s-14">Online Onion VPN Users</h5>
                            <span class="s-48 font-weight-lighter text-primary" id="totalOnlineUser">
                                        0</span>
                            <div class="float-right">
                                <span class="icon icon-money-bag s-48"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="card-body no-p">
                    <div class="bg-primary text-white lighten-2">
                        <div class="pt-5 pb-4 pl-5 pr-5">
                            <h5 class="font-weight-normal s-14">Online AnyConnect Users</h5>
                            <span class="s-48 font-weight-lighter text-primary" id="totalAnyConnectUser">0
                                        </span>
                            <div class="float-right">
                                <span class="icon icon-money-bag s-48"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header white">
                <h6> Active Users </h6>
            </div>
            <div class="card-body p-0">
                <div class="lSSlideOuter "><div class="lSSlideWrapper usingCss" style="transition-duration: 400ms; transition-timing-function: ease;"><div class="lightSlider showSlider lsGrab lSSlide" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true" data-loop="true" style="width: 3146.5px; transform: translate3d(-1348.5px, 0px, 0px); height: 210px; padding-bottom: 0%;"><div class="p-5 light clone left" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Helium</h5>
                                <span class="s-48 font-weight-lighter text-primary">300</span>
                                <div> Hydrogen
                                    <span class="text-primary">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div><div class="p-5 clone left" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Carbon</h5>
                                <span class="s-48 font-weight-lighter amber-text">700</span>
                                <div> Helium
                                    <span class="amber-text">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div><div class="p-5 light clone left" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Oxygen</h5>
                                <span class="s-48 font-weight-lighter text-indigo">411</span>
                                <div> Iron
                                    <span class="text-indigo">
                        <i class="icon icon-arrow_downward"></i> 89%</span>
                                </div>
                            </div><div class="p-5 clone left" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Helium</h5>
                                <span class="s-48 font-weight-lighter pink-text">224</span>
                                <div> Sodium
                                    <span class="pink-text">
                        <i class="icon icon-arrow_downward"></i> 47%</span>
                                </div>
                            </div>
                            <div class="p-5 bg-primary text-white lslide" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Sodium</h5>
                                <span class="s-48 font-weight-lighter text-primary">675</span>
                                <div> Oxygen
                                    <span class="text-primary">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div>
                            <div class="p-5 lslide" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Iron</h5>
                                <span class="s-48 font-weight-lighter light-green-text">675</span>
                                <div> Carbon
                                    <span class="text-light-green">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div>
                            <div class="p-5 light lslide active" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Helium</h5>
                                <span class="s-48 font-weight-lighter text-primary">300</span>
                                <div> Hydrogen
                                    <span class="text-primary">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div>
                            <div class="p-5 lslide" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Carbon</h5>
                                <span class="s-48 font-weight-lighter amber-text">700</span>
                                <div> Helium
                                    <span class="amber-text">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div>
                            <div class="p-5 light lslide" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Oxygen</h5>
                                <span class="s-48 font-weight-lighter text-indigo">411</span>
                                <div> Iron
                                    <span class="text-indigo">
                        <i class="icon icon-arrow_downward"></i> 89%</span>
                                </div>
                            </div>
                            <div class="p-5 lslide" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Helium</h5>
                                <span class="s-48 font-weight-lighter pink-text">224</span>
                                <div> Sodium
                                    <span class="pink-text">
                        <i class="icon icon-arrow_downward"></i> 47%</span>
                                </div>
                            </div>
                            <div class="p-5 bg-primary text-white clone right" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Sodium</h5>
                                <span class="s-48 font-weight-lighter text-primary">675</span>
                                <div> Oxygen
                                    <span class="text-primary">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div><div class="p-5 clone right" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Iron</h5>
                                <span class="s-48 font-weight-lighter light-green-text">675</span>
                                <div> Carbon
                                    <span class="text-light-green">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div><div class="p-5 light clone right" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Helium</h5>
                                <span class="s-48 font-weight-lighter text-primary">300</span>
                                <div> Hydrogen
                                    <span class="text-primary">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div><div class="p-5 clone right" style="width: 218.75px; margin-right: 6px;">
                                <h5 class="font-weight-normal s-14">Carbon</h5>
                                <span class="s-48 font-weight-lighter amber-text">700</span>
                                <div> Helium
                                    <span class="amber-text">
                        <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>
                            </div></div><div class="lSAction" style=""><a class="lSPrev"><span class="icon-left-arrow"></span></a><a class="lSNext"><span class="icon-right-arrow"></span></a></div></div></div>
            </div>
        </div>
    </div>
@endsection
