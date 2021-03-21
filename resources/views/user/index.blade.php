@extends('layouts.basiclayout')
@section('body-class') sidebar-mini sidebar-collapsex sidebar-expanded-on-hoverx @endsection
@section('content')
    <div class="container-fluid relative animatedParent animateOnce my-3">
        @include('layouts.toast')
        <div class="tab-pane animated fadeInUpShort go active" id="v-pills-3">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">
                        <i class="icon icon-th"></i>
                        View Users
                    </h3>
                </div>
                <div class="col-6">
                    <a href="{{ route('user.create') }}" class="btn btn-primary float-right"> <i
                            class="fa fa-plus"></i> Add Reseller</a>
                </div>
            </div>
            <section class="paper-card">
                <!-- /.row -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="example2" class="table table-bordered table-hover data-tables"
                               data-options='{ "paging": false; "searching":false}'>
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Remaining Accounts</th>
                                <th>Income</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <div>
                                            <strong>Alexander Pierce</strong>
                                        </div>
                                        <small> UserNmae:@abc</small>
                                    </div>
                                </td>
                                <td>****</td>
                                <td>20/50</td>
                                <td>50 AED</td>
                                <td><span class="badge badge-success r-5">Administrator</span></td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="#" class="btn-fab btn-fab-sm btn-primary r-5 toast-action"
                                       data-title="Hey, Bro!"
                                       data-message="Paper Panel has toast as well."
                                       data-type="success"
                                       data-position-class="toast-top-right">
                                        <i class="icon-copy p-0"></i>
                                    </a>
                                    <a href="#" class="btn-fab btn-fab-sm btn-secondary r-5">
                                        <i class="icon-edit p-0"></i>
                                    </a>
                                    <a href="#" class="btn-fab btn-fab-sm btn-success r-5" data-toggle="control-sidebar">
                                        <i class="feather icon-dollar p-0"></i>
                                    </a>
                                    <a href="#" class="btn-fab btn-fab-sm btn-danger r-5">
                                        <i class="feather icon-settings p-0"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Remaining Accounts</th>
                                <th>Income</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
@endsection

@section('right-side')
    <aside class="control-sidebar fixed white " style="z-index: 98">
        <div class="sidebar-header">
            <h4>Payment History<b>(Username)</b></h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="slimScroll">
            <div class="mb-5">
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <tbody>
                        <tr>
                            <td>
                                <a href="#" >Serial # here</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Paid</span>
                            </td>
                            <td>20 AED</td>
                            <td>
                                <a href="#" class="btn-fab btn-fab-sm btn-primary r-5" data-toggle="control-sidebar">
                                    <i class="feather icon-edit p-0"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </aside>
@endsection
