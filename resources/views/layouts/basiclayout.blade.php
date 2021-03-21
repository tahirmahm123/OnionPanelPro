@extends('layouts.app')

@section('body-class')
    {{ _('sidebar-mini sidebar-collapsex sidebar-expanded-on-hoverx') }}
@endsection
@section('body')
<div id="app">
    @php
    $slipLink = array("slip.index");
    $vpnLink = array("home","vpn.create","vpn.index","vpn.edit","vpn.extend","user.index","user.create");
    $serverLink = array("/server-setup","/server-setup-done");
    @endphp
    <aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
        <div class="sidebar">
            <div class="d-flex hv-100 align-items-stretch">
                <div class="primary-blue  ">
                    <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        <a class="nav-link {{ in_array(Route::currentRouteName(),$vpnLink) ? "active" : ""   }} " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="feather icon-shield"></i></a>
                        <a class="nav-link {{ in_array(Route::currentRouteName(),$serverLink) ? "active" : ""   }}" id="v_pills_server_tab" data-toggle="pill" href="#v_pills_server" role="tab" aria-controls="v-pills-server" aria-selected="false"><i class="feather icon-server"></i></a>
                        <a class="nav-link {{ in_array(Route::currentRouteName(),$slipLink) ? "active" : ""   }}" id="v-pills-payment-tab" data-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false"><i class="icon-dollar"></i></a>
                        <!--<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="icon-settings"></i></a>
                        <a href="">
                            <figure class="avatar">
                                <img src="assets/img/dummy/u6.png" alt="">
                                <span class="avatar-badge online"></span>
                            </figure>
                        </a>-->
                    </div>
                </div>
                <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                    <div class="tab-pane fade {{ in_array(Route::currentRouteName(),$vpnLink) ? "show active" : ""   }} " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="relative brand-wrapper sticky b-b">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <div class="w-120px mb-10 mx-auto">
                                    <img src="{{ asset('img/basic/logo_blue.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <ul class="sidebar-menu ">
                            <li class="treeview" id="d-menu"><a href="{{ route('home') }}">
                                    <i class="icon icon-home s-24"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="tree view">
                                <a href="{{ route('vpn.index') }}">
                                    <i class="icon icon icon-shield s-24"></i><i class=" icon-angle-left  pull-right"></i>
                                    <span>VPN Manager</span>
                                </a>
                                <ul class="tree view- menu d-none">
                                    <li><a href="add-vpn"><i class="icon icon-add"></i> Add VPN</a>
                                    </li>
                                    <li><a href="view-users"><i class="icon icon-th"></i>View Users </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="tree  view">
                                <a href="{{ route('user.index') }}">
                                    <i class="icon icon-account_box s-24"></i>
                                    Resellers
                                    <i class="icon-angle-left  pull-right"></i>
                                </a>
                                <ul class="tree view -menu d-none">
                                    <li><a href="add-reseller"><i class="icon icon-add"></i>Add User</a>
                                    </li>
                                    <li><a href="view-reseller"><i class="icon icon-user"></i>User Profiles </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade <?php echo (in_array($_SERVER['REQUEST_URI'],$serverLink) ? "show active" : $_SERVER['REQUEST_URI'] ); ?>" id="v_pills_server" role="tabpanel" aria-labelledby="v_pills_server_tab">
                        <div class="relative brand-wrapper sticky b-b p-3">
                            <h3 class="my-3">
                                <i class="icon icon-server"></i>
                                Server Setup
                            </h3>
                        </div>
                        <div class="sticky slimScroll">
                            <ul class="sidebar-menu ">
                                <li class="treeview" id="openconnect-setup"><a href="#">
                                        <figure class="avatar avatar-md">
                                            <img src="assets/img/openconnect.png" alt="Open Connect">
                                        </figure>
                                        <i class=" icon-angle-left  pull-right"></i>
                                        <span>Setup Server (Open Connect)</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="server-setup"><i class="icon icon-plus"></i>Setup Server </a>
                                        </li>
                                    </ul>
                                    <ul class="treeview-menu">
                                        <li><a href="servers-setup-done"><i class="icon icon-th"></i>View All Server Done  </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ in_array(Route::currentRouteName(),$slipLink) ? "show active" : ""   }}" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                        <div class="relative brand-wrapper sticky b-b p-3">
                            <h3 class="my-3">
                                <i class="icon-dollar"></i>
                                Payment
                            </h3>
                        </div>
                        <ul class="sidebar-menu ">
                            <li class="treeview" id="d-menu"><a href="{{ route('slip.index') }}">
                                    <i class="icon icon-dollar"></i> <span>Payment Confirmation</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="relative brand-wrapper sticky b-b p-3">
                            <h3 class="my-3">
                                <i class="icon-settings"></i>
                                Settings
                            </h3>
                        </div>
                        <ul class="sidebar-menu ">
                            <li class="treeview"><a href="#">
                                    <i class="icon icon icon-shield s-24"></i><i class=" icon-angle-left  pull-right"></i>
                                    <span>VPN Settings</span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="add-vpn"><i class="icon icon-add"></i> Add VPN</a>
                                    </li>
                                    <li><a href="view-users"><i class="icon icon-th"></i>View Users </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 my-auto fixed">
        <i></i>
    </a>
    <div class="has-sidebar-left has-sidebar-tabs">
        <div class="sticky">
            <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
                <div class="relative">
                    <div class="d-flex">
                        <div class="d-none d-md-block">
                        </div>
                    </div>
                </div>
                <!--Top Menu Start -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown custom-dropdown user user-menu ">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <i class="icon-more_vert "></i>
                            </a>
                            <div class="dropdown-menu p-4 dropdown-menu-right">
                                <div class="row box justify-content-between my-4">
                                    <div class="col">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" >
                                            <i class="icon-power_settings_new indigo lighten-2 avatar  r-5"></i>
                                            <div class="pt-1">Logout</div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    @yield('right-side')
</div>
@endsection
