@extends('layouts.basiclayout')
@section('body-class') sidebar-mini sidebar-collapsex sidebar-expanded-on-hoverx @endsection
@section('content')
    <div class="container-fluid relative animatedParent animateOnce my-3">
        @include('layouts.toast')
        <div class="tab-pane animated fadeInUpShort go active" id="v-pills-3">
            <div class="col-12">
                <div class="row">
                    <div class="col">
                        <h3 class="my-3">
                            <i class="icon icon-th"></i>
                            View Users
                        </h3>
                        <span class="d-none" id="activeAnyConnect"></span>
                        <span class="d-none" id="reseller"></span>
                    </div>
                    <div class="col float-right">
                        <a href="{{route('vpn.create')}}">
                            <button class="btn btn-primary float-right"><i class="icon-plus"></i>&nbsp;Add VPN</button>
                        </a>
                    </div>
                </div>
            </div>
            <section class="paper-card">
                <!-- /.row -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="row float-left" >
                            <div class="col-6 ">
                                <select type="select"  name="customSelect" class="custom-select custom-control-inline" id="filterActive">
                                    <option value="All">All</option>
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                </select>
                            </div>
                            <div class="col-6 ">
                                <select type="select"  name="customSelect" class="custom-select custom-control-inline" id="filterPlatform">
                                    <option value="All">All</option>
                                    <option value="OnionVPN">Onion VPN</option>
                                    <option value="AnyConnect">AnyConnect</option>
                                </select>
                            </div>
                        </div>
                        <table id="userTable" class="table col-12 table-hover table-striped">
                            <thead>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Expiry Date</th>
                            <th>Phone #</th>
                            <th>Device</th>
                            <!--<th>Payment</th>-->
                            <th>Status</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            {{--@foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->expiryDate==null ? __('NULL') : $user->expiryDate }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->platform }}</td>
                                --}}{{--<td><span class="badge badge-success r-5">Paid</span></td>--}}{{--
                                <td>
                                    <label class="switch">
                                      <input type="checkbox" {{ $user->isActive ? "checked" : "" }}>
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
                                    <a href="{{ route('vpn.edit',$user->username) }}" class="btn-fab btn-fab-sm btn-secondary r-5">
                                        <i class="icon-edit p-0"></i>
                                    </a>
                                    <a href="#" class="btn-fab btn-fab-sm btn-success r-5" data-toggle="control-sidebar">
                                        <i class="feather icon-dollar p-0"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach--}}
                            </tbody>
                            <tfoot>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Expiry Date</th>
                            <th>Phone #</th>
                            <th>Device</th>
                            <!--<th>Payment</th>-->
                            <th>Status</th>
                            <th>Actions</th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <button class='d-none toast-action' id="responseDisplay" data-title=''  data-message='' data-type='' data-position-class='toast-top-right' ></button>
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>
@endsection
@section('right-side')
    <!-- Right Sidebar -->
    <aside class="control-sidebar fixed white " style="z-index: 98">
        <div class="sidebar-header">
            <h4>Payment History <b>(<span id="renewUserName">Username</span>)</b></h4>
            <a href="#" id="closeExtendUser" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="slimScroll">
            <form id="extendUserForm" class="needs-validation" novalidate="" method="post" action="">
                <div class="mb-2">
                    <div class="table-responsive" >
                        <table class="table table-hover">
                            <!-- mb-0 ps-container ps-theme-default-->
                            <thead>
                            <td>Sr. #</td>
                            <td>Payment<br>Status</td>
                            <td>Slip</td>
                            <td>Date</td>
                            </thead>
                            <tbody id="recentSlipRecord"></tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </aside>
    <div class="control-sidebar-bg shadow white fixed"></div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var extendUserReference;
            $('#file').change( function(event) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                //$("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
                $("#disp_tmp_path").html(event.target.files[0]['name']);
            });
            var table = $('#userTable').DataTable({
                // dom: 'Bfrtip',
                ajax : "vpn/show",
                fixedColumns: true,
                buttons: [],
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: { search: "" , searchPlaceholder: "Search...",},
                columns : [{
                    "data" : "username"
                },{
                    "data" : "password"
                },{
                    "data" : null,//expiryDate,
                    render : function(data,type,row){
                        if(row.expiryDate==null) return "NULL";
                        var date = new Date();
                        date.setTime(row.expiryDate.time);
                        return date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
                    }
                },{
                    "data" : null,
                    visible : false
                },{
                    "data" : "platform",
                    render : function(data){
                        return "<button class='btn badge badge-"+(data=="OnionVPN" || data=="Android"?"success":"danger")+" r-5 text-white changePlatform'>"+data+"</button>";
                    }
                },/*{
                  "data" : "payment",
                  render : function()
              },*/{
                    "data" : "isActive",
                    render : function(data){
                        return "<label class='switch'><input type='checkbox' "+ (data ? "checked=''" : "") +" class='activeStatus'><span class='slider'></span></label>"
                    }
                },{
                    "data" : null,
                    render : function(data,type,row){
                        var response  = "<button type='button' class='btn r-5 copyCredentials'><i class='text-blue icon-copy p-0'></i></button><a href='/vpn/"+row.username+"/edit' class='r-5 btn '><i class='text-purple icon-edit p-0'></i></a><button type='button' id='history_"+row.username+"' class='btn r-5 extendUser' data-toggle='control-sidebar'><i class='text-yellow icon-history m-0'></i></button>";
                        if(row.expiryDate!=null)
                            response+="<a href='/vpn/"+row.username+"/extend' class='btn r-5 ' ><i class='text-green icon-dollar m-0'></i></a>";
                        return response;
                    }
                }
                ]
            });
            $.fn.dataTable.ext.errMode = 'throw';
            $("#filterPlatform").change(function(){ table.draw(); });
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex,row ) {
                    var filter = $("#filterPlatform").val();
                    if(filter=="All") return true;
                    else if(filter=="OnionVPN") { if(row.platform == "OnionVPN") return true; }
                    else if(filter=="AnyConnect") {if(row.platform == "AnyConnect") return true; }
                    return false;
                });
            $("#filterActive").change(function(){ table.draw(); });
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex,row ) {
                    var filter = $("#filterActive").val();
                    if(filter=="All") return true;
                    else if(filter=="Active") { if(row.isActive) return true; }
                    else if(filter=="Deactive") { if(!row.isActive) return true; }
                    return false;
                });
            $("#userTable tbody ").on("click",".copyCredentials",function(e){
                var data = table.row(e.currentTarget.parentElement.parentElement).data();
                var credentials = "Here are Your Credentials : "+(data['platform']=="OnionVPN" ? "" : "<br>Server: "+$("#activeAnyConnect").text())+"<br>Username: "+data['username']+"<br>Password: "+data['password'];
                $("#responseDisplay").attr("data-title","Copy User Credentials")
                    .attr("data-type","success")
                    .attr("data-message",credentials)
                    .trigger("click");
                Copier(credentials.replace(/<br>/g,"\n"));

            }).on("click",".changePlatform",function(e){
                var rowRef = e.currentTarget.parentElement.parentElement
                var ref = table.row(rowRef);
                var data = ref.data();
                console.log(data+"      "+e.target.innerText);
                $(e.target.parentElement).text("").html("<div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div>");
                $.ajax({
                    url : "/vpn/"+data.username+"/changePlatform",
                    type : "post",
                    header : {
                        "Accept" : "application/json",
                        "Content-Type" : "application/json"
                    },
                    data : {
                        '_token' : "<?php echo csrf_token(); ?>",
                        '_method' : "PUT"
                    },
                    success : function(res){
                        console.log(res);
                        if(res.state==1 || res.state==2){
                            data.platform = res.platform;
                            ref.data(data).draw();
                            table.fixedColumns().update();
                        }
                    }
                });
            }).on("click",".activeStatus",function(e){
                var rowRef = e.currentTarget.parentElement.parentElement.parentElement;
                var ref = table.row(rowRef);
                var data = ref.data();
                console.log(data);
                $(e.currentTarget.parentElement).text("").html("<div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div>");
                $.ajax({
                    url : "/vpn/"+data.username+"/"+( !data.isActive ? "active" : "deactive"),
                    type : "post",
                    header : {
                        "Accept" : "application/json",
                        "Content-Type" : "application/json"
                    },
                    data : {
                        '_token' : "<?php echo csrf_token(); ?>",
                        '_method' : "PUT"
                    },
                    success : function(response){
                        console.log(response);
                        data.isActive = response.isActive;//$(e.target).is(":checked");
                        ref.data(data).draw();
                        table.fixedColumns().update();
                        $("#closeExtendUser").trigger("click");
                    },
                    error : function(error) { console.log(error) }
                });
            }).on("click",".extendUser",function(e){
                $("#recentSlipRecord").empty().html("<tr><td colspan='4'><center><div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div></center></td></tr>");
                var rowRef = e.currentTarget.parentElement.parentElement;
                var ref = table.row(rowRef);
                var data = ref.data();
                extendUserReference = ref;
                $("#renewUserName").text(data.username);
                $.ajax({
                    url : "/vpn/"+data.username+"/slips",
                    success : function(response){
                        $("#recentSlipRecord").empty().html(response);
                    },
                    error : function(error) { console.log(error) }
                });
            });
            $("#extendUserForm").submit(function(event){
                event.preventDefault();
                var formData = new FormData(event.target);
                formData.append("username",$("#renewUserName").text());
                formData.append("reseller",$("#reseller").text());
                console.log(event.target.elements);
                $.ajax({
                    url : "api/apiExtendUser",
                    type : "POST",
                    data : formData,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success : function(response){
                        console.log(response);
                        var res = JSON.parse(response);
                        if(res.state==1){
                            alert("Success");
                            var data = extendUserReference.data();
                            data.expiryDate = res.expiryDate;
                            extendUserReference.data(data).draw();
                            table.fixedColumns().update();
                        }
                        else if(res.state==2){ alert("Please Enter Date"); }
                        else if(res.state==3){ alert("Please Enter Days"); }
                        else { alert("Failed"); }

                    },
                    error : function(error){
                        console.log(error);
                    }
                });
            });
            $('#date').click(function() {
                $("#daysExtend").removeAttr("name");
                $("#typeOfDate").removeAttr("name");
                $("#datePickerExtend").attr("name","extendByDate");
                $('#byday').hide();
                $('#bydate').show();
            });
            $('#day').click(function() {
                $("#datePickerExtend").removeAttr("name");
                $("#daysExtend").attr("name","daysExtend");
                $("#typeOfDate").attr("name","typeOfDate");
                $('#bydate').hide();
                $('#byday').show();
            });
            jQuery(function(){
                jQuery('#date_timepicker_start').datetimepicker({
                    format: 'Y/m/d',
                    onShow: function(ct) {
                        this.setOptions({
                            maxDate: jQuery('#date_timepicker_end').val() ? jQuery('#date_timepicker_end').val() : false
                        })
                    },
                    timepicker: false
                });
                jQuery('#date_timepicker_end').datetimepicker({
                    format: 'Y/m/d',
                    onShow: function(ct) {
                        this.setOptions({
                            minDate: jQuery('#date_timepicker_start').val() ? jQuery('#date_timepicker_start').val() : false
                        })
                    },
                    timepicker: false
                });
            });
        });
        function Copier(str){
            var el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style = {position: 'absolute', left: '-9999px'};
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }
    </script>
    <script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
@endsection
@section('styles')

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
