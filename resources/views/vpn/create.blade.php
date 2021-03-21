@extends('layouts.basiclayout')


@section('content')
    <div class="container-fluid relative animatedParent animateOnce my-3">
        @include('layouts.toast')
        <div class="tab-pane animated fadeInUpShort go active" id="v-pills-3">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon icon-plus"></i>
                        Add VPN Account <span class="d-none" id="Reseller"></span>
                        <span class="d-none" id="activeAnyConnect"></span>
                    </h3>
                </div>
            </div>
            <div class="card mb-3 col-md-8 shadow mx-auto no-b r-0">
                <div class="card-header white">
                    <h6>{{ isset($user) ? __("Edit VPN Account") : __("Create VPN Account") }}</h6>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="" id="AddUser" method="post" action="{{ isset($user) ? route('vpn.update',$user->username) : route('vpn.store') }}" enctype="multipart/form-data" >
                        @csrf
                        @if(isset($user))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror " id="username"  name="username" placeholder="Username" aria-describedby="inputGroupPrepend" required="" value="{{ isset($user) ? $user->username : old('username') }}" {{ isset($user) ? __('readonly') : "" }}>
                                    @error('username')
                                    <div class="invalid-feedback" role="alert">
                                        {{ __('Please choose a Username.(Username should consist of small Letters and Numbers.)')}}
                                    </div>
                                    {{--@else
                                        <div class=" valid-feedback">
                                            Looks good!
                                        </div>--}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <label for="password">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror " id="password" name="password" placeholder="Password" required="" value="{{ isset($user) ? $user->password : old('password') }}">
                                {{--<i id="open" style="margin-top:-25px; position:absolute; right:15px; z-index: 99;" class=" icon-eye"></i>
                                <i id="closed" style="display:none; margin-top:-25px; right:15px; color:#03a9f4; position:absolute; z-index: 99; right:15px;" class="icon-eye-slash"></i>--}}
                                @error('password')
                                <div class="invalid-feedback">
                                    Please provide a valid Password.
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone #</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone #" required=""  value="{{ isset($user) ? $user->phone : old('phone') }}">
                                </div>
                                @error('phone')
                                <div class="invalid-feedback d-block">
                                    Please provide a valid phone.
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 {{ isset($user) && $user->expiryDate!=null ? 'd-none' : '' }} ">
                                <label for="days">Number of Days</label>
                                <input type="number" class="form-control @error('days') is-invalid @enderror" id="days" name="days" placeholder="Number of Days" required=""  value="{{ isset($user) ? $user->days : old('days') }}">
                                @error('days')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-control custom-control-inline custom-radio">
                                    <input type="radio" id="android" name="platform" value="OnionVPN"
                                          class="custom-control-input @error('platform') is-invalid @enderror"
                                        {{ isset($user) ? ($user->platform=="OnionVPN" ? __('checked') : "") : ( old('platform')=="OnionVPN" ? __('checked') : "" )}}>
                                    <label for="android" class="custom-control-label"> OnionVPN</label>
                                </div>
                                <div class="custom-control custom-control-inline custom-radio">
                                    <input type="radio" id="ios" name="platform" value="AnyConnect"
                                          class="custom-control-input @error('platform') is-invalid @enderror"
                                        {{ isset($user) ? ($user->platform=="AnyConnect" ? __('checked') : "") :( old('platform')=="AnyConnect" ? __('checked') : "" )}}>
                                    <label for="ios" class="custom-control-label"> AnyConnect</label>
                                </div>
                                @error('platform')
                                <div class="invalid-feedback d-block">
                                    Please Select a Device.
                                </div>
                                @enderror
                            </div>
                        </div>
                        @if(!isset($user))
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">Upload Slip</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input  @error('slip') is-invalid @enderror" id="uploadFile" name="slip" required="" accept="image/*">
                                        <label class="custom-file-label" id="disp_tmp_path" for="validatedCustomFile">Choose File....</label>
                                    </div>
                                    @error('slip')
                                    <div class="invalid-feedback d-block">
                                        Please provide a valid Slip.
                                    </div>
                                    @enderror
                                    <div class=" valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label for="datepicker">Date On Slip</label>
                                    <input type="text" class="form-control  @error('dateOfSlip') is-invalid @enderror" id="datepicker" placeholder="Select Date on the Slip" required="" value="{{ old('dateOfSlip') }}" name="dateOfSlip">
                                    <i class="icon-calendar" onclick="javascript:NewCssCal ('datepicker','yyyyMMdd','arrow',true,'24',true)" style="margin-top:-25px; right:15px; color:#03a9f4; position:absolute; z-index: 99; cursor:pointer; right:15px;" ></i>
                                    @error('dateOfSlip')
                                    <div class="invalid-feedback">
                                        Please provide a Date.
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <button class="btn btn-primary float-center toast-action" type="submit"><span id="submitIcon"><i class="{{ isset($user) ? __('icon-edit') : __('icon-plus') }}"></i></span> | <span id="submitText">{{ isset($user) ? __('Update Account') : __('Create Account') }}</span></button>
                    </form>
                    <button class="btn toast-action d-none"
                            type="button"
                            id="Response"
                            data-title=""
                            data-message=""
                            data-type=""
                            data-position-class="toast-top-right">
                        Error Toast</button>
                    <!--<button class="clipboard" id="copyData" data-clipboard-text=""></button>-->
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#uploadFile').change( function(event) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                //$("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
                $("#disp_tmp_path").html(event.target.files[0]['name']);
            });
            $("#open").click(function() {
                $("#open").hide();
                $("#closed").show();
                $("#password").attr("type", "text");
            });

            $("#closed").click(function() {
                $("#closed").hide();
                $("#open").show();
                $("#password").attr("type", "password");
            });
        });
        (function($, d) {
            $.each(readyQ, function(i, f) {
                $(f)
            });
            $.each(bindReadyQ, function(i, f) {
                $(d).bind("ready", f)
            })
        })(jQuery, document)
    </script>
@endsection
