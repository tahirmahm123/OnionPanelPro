@extends('layouts.basiclayout')

@section('content')
    <div class="container-fluid relative animatedParent animateOnce my-3">
        <div class="tab-pane animated fadeInUpShort go active" id="v-pills-3">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon icon-plus"></i>
                        Create Reseller
                    </h3>
                </div>
            </div>
            <div class="card mb-3 col-md-8 shadow mx-auto no-b r-0">
                <div class="card-header white">
                    <div class="row">
                        <h6>Create Reseller</h6>
                        <div class="col-4" style="text-align: right;">
                            <input type="radio" id="bybulk" name="extend" checked="">
                            <label for="bybulk"> Bulk Reseller</label>
                        </div>
                        <div class="col-4" style="text-align: right;">
                            <input type="radio" id="bycomission" name="extend">
                            <label for="bycomission"> Comission Reseller</label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Full Name" required="">
                                <div class="invalid-feedback">
                                    Please choose a name.
                                </div>
                                <div class=" valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <label for="email">Email (Optional)</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" required="">
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                                <div class=" valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="username" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                    <div class=" valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" required="">
                                <i id="open" style="margin-top:-25px; position:absolute; right:15px; z-index: 99;" class=" icon-eye"></i>
                                <i id="closed" style="display:none; margin-top:-25px; right:15px; color:#03a9f4; position:absolute; z-index: 99; right:15px;" class="icon-eye-slash"></i>
                                <div class="invalid-feedback">
                                    Please provide a valid Password.
                                </div>
                                <div class=" valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom04">Phone #</label>
                                <input type="text" class="form-control" id="validationCustom04" placeholder="Phone #" required="">
                                <div class="invalid-feedback">
                                    Please provide a valid phone.
                                </div>
                                <div class=" valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <label for="days">Number of VPN accounts</label>
                                <input type="number" class="form-control" id="days" placeholder="Number of Days" required="">
                                <div class="invalid-feedback">
                                    Please enter days.
                                </div>
                                <div class=" valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3 " id="comission"style="display: none;">
                                <label for="percentage">Comission %</label>
                                <input type="number" class="form-control" id="percentage" placeholder="Number of percentage" required="">
                                <div class="invalid-feedback">
                                    Please enter days.
                                </div>
                                <div class=" valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-center toast-action" type="submit"
                                data-title="Hey, Administrator!"
                                data-message="Reseller has created."
                                data-type="success"
                                data-position-class="toast-top-right"><i class="icon-plus"></i> | Create Reseller</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#open").click(function(){
                $("#open").hide();
                $("#closed").show();
                $("#password").attr("type","text");
            });

            $("#closed").click(function(){
                $("#closed").hide();
                $("#open").show();
                $("#password").attr("type","password");
            });
            //for reseller type choose
            $('#bybulk').click(function () {
                $('#comission').hide();
                $('#bulk').show();
            });
            $('#bycomission').click(function () {
                $('#bulk').hide();
                $('#comission').show();
            });
        });
    </script>
@endsection
