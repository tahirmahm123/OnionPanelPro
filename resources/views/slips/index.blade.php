@extends('layouts.basiclayout')

@section('content')
    <div class="container-fluid relative animatedParent animateOnce my-3">
        @include('layouts.toast')
        <div class="tab-pane animated fadeInUpShort go active" id="v-pills-3">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon icon-th"></i>
                        Payment Confirmation
                    </h3>
                </div>
            </div>
            <section class="paper-card">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <section class="paper-card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <div class="box-tools">
                                                <div class="input-group focused col-md-4 mb-3" >
                                                    <input name="table_search" class="form-control float-right" placeholder="Search" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover" id="paymentSlips">
                                            <thead>
                                                <tr>
                                                    <th>Serial #</th>
                                                    <th>User</th>
                                                    <th>Date/Time</th>
                                                    <th>Status</th>
                                                    <th>Reseller</th>
                                                    <th>Uploaded By</th>
                                                    <th>View Slip</th>
                                                    <th>Payment History</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php  $count=0 @endphp
                                            @foreach($slips as $slip)
                                                <tr>
                                                    <td>{{ ++$count }}</td>
                                                    <td>{{ $slip->username }}</td>
                                                    <td>{{ $slip->dateOnSlip }}</td>
                                                    <td><span class="badge text-white bg-{{ $slip->currentStatus->color }}">{{ $slip->currentStatus->text }}</span></td>
                                                    <td>{{ $slip->vpnuser->updatedBy }}</td>
                                                    <th>{{ $slip->uploadedBy }}</th>
                                                    <td><a href="{{ asset($slip->slipPath) }}" target="_blank"><span class="badge text-white bg-info">View Slip</span></a></td>
                                                    <td><a href="#" class="viewHistory" data-toggle="control-sidebar" id="history_{{ $slip->username }}"><span class="badge text-white bg-blue">View History</span></a></td>
                                                    <td>
                                                        <div class="row text-center">
                                                            <form action="{{ route('slips.approve',$slip->id) }}"
                                                                  method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn" type="submit">
                                                                    <i class="fa fa-check text-green"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('slips.deny',$slip->id) }}"
                                                                  method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn" type="submit">
                                                                    <i class="fas fa-times text-red"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection


@section('right-side')
    <aside class="control-sidebar fixed white " style="z-index: 98">
        <div class="sidebar-header">
            <h4>Payment History (<b id="renewUserName">(Username)</b>)</h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="slimScroll">
            <div class="mb-5">
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <td>Sr. #</td>
                                <td>Payment<br>Status</td>
                                <td>Slip</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody id="recentSlipRecord">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </aside>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            var tableID = "#paymentSlips";
            $(tableID).DataTable({
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: { search: "" , searchPlaceholder: "Search...",}
            });
            // $(tableID+"_filter").addClass('form-group');
            $(".viewHistory").on('click',function (e) {
                var id = e.currentTarget.id.split("_")[1];
                $("#recentSlipRecord").empty().html("<tr><td colspan='4'><center><div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div></center></td></tr>");
                $("#renewUserName").text(id);
                $.ajax({
                    url : "/vpn/"+id+"/slips",
                    success : function(response){
                        $("#recentSlipRecord").empty().html(response);
                    },
                    error : function(error) { console.log(error) }
                });
            })
        });
    </script>
@endsection
