@extends('layouts.basiclayout')


@section('content')
    <div class="container-fluid relative animatedParent animateOnce my-3">
        <div class="tab-pane animated fadeInUpShort go active" id="v-pills-3">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon icon-dollar"></i>
                        Extend User<span class="d-none" id="Reseller"></span>
                        <span class="d-none" id="activeAnyConnect"></span>
                    </h3>
                </div>
            </div>
            <form action="/vpn/{{ $user->username }}/extendByDate" method="post" id="ExtendUser" enctype="multipart/form-data"  class="needs-validation" novalidate="" >
                @csrf
                @method('PUT')
                <div class="card mb-3 col-md-8 shadow mx-auto no-b r-0">
                    <div class="card-header white">
                        <h6>Extending User "{{ $user->username }}"</h6>
                    </div>

                    <div class="card-body">
                        <table class="col-12">
                            <tr>
                                <td>
                                    <input type="radio" id="date" name="extend" checked="" value="date">
                                </td>
                                <td>
                                    <label for="date"> Extend by Date</label>
                                </td>
                                <td>
                                    <input type="radio" id="day" name="extend" value="day">
                                </td>
                                <td>
                                    <label for="day"> Extend by Day</label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-row">
                        <div class="col-6 px-2 m-0 mb-2 form-group p-0">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="" value="{{ $user->username }}" readonly>
                        </div>
                        <div id="bydate" class="col-6 mb-2 input-group">
                            <input type="text" class="form-control @error('extendByDate') is-invalid @enderror " name="extendByDate"
                                   id="datePickerExtend" placeholder="Select a date to extend" value="{{ old('extendByDate') }}" >
                            <i class="icon-calendar btn btn-primary p-2 input-group-append"
                               onclick="javascript:NewCssCal ('datePickerExtend','yyyyMMdd','arrow',false,12,true)"></i>
                            @error('extendByDate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class=" col-6 form-inline mb-2 align-center" id="byday" style="display: none;">
                            <input type="number" name="extendByDay" id="daysExtend" class="form-control col-8 p-2 m-0 @error('extendByDay') is-invalid @enderror"
                                   placeholder="Numbers to Extend...">
                            <select id="typeOfDate" name="" class="custom-select custom-control-inline col-4 p-2 m-0">
                                <option value="1">Day(s)</option>
                                <option value="7">Week(s)</option>
                                <option value="30">Month(s)</option>
                                <option value="365">Year(s)</option>
                            </select>
                            @error('extendByDaY')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-6 px-2 mb-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="slip"
                                       accept="image/*">
                                <label class="custom-file-label @error('slip') is-invalid @enderror" id="disp_tmp_path" for="file">Choose File....</label>
                            </div>
                            <!--<input hidden="" id="file" type="file" name="file" accept="image/*">
                            <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="fileUpload">
                                <div class="dz-default dz-message">
                                    <span>Drop picture of Slip</span>
                                    <div>You can also click to open file browser</div>
                                </div>
                            </div>-->
                            @error('slip')
                            <div class="invalid-feedback d-block">
                                Please Upload Valid Slip
                            </div>
                            @enderror
                        </div>
                        <div class="col-6 form-group px-2 mb-2">
                            <input type="text" class="form-control" name="dateOnSlip" id="dateOnSlip" placeholder="Date on Slip" required=""
                                   onfocus="javascript:NewCssCal ('dateOnSlip','yyyyMMdd','arrow',true,'24',true)" value="{{old('dateOnSlip')}}">
                        </div>
                    </div>
                    <button class="btn btn-primary float float-right toast-action my-3" type="submit" name="submitForm">
                        <i class="icon-dollar"></i> | Extend
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#file').change( function(event) {
                /*var tmppath = URL.createObjectURL(event.target.files[0]);
                $("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));*/
                $("#disp_tmp_path").html(event.target.files[0]['name']);
            });
            $('#date').click(function() {
                $("#daysExtend").removeAttr("name");
                $("#typeOfDate").removeAttr("name");
                $("#ExtendUser").attr('action','/vpn/{{ $user->username }}/extendByDate');
                $("#datePickerExtend").attr("name","extendByDate");
                $('#byday').hide();
                $('#bydate').show();
            });
            $('#day').click(function() {
                $("#datePickerExtend").removeAttr("name");
                $("#ExtendUser").attr('action','/vpn/{{ $user->username }}/extendByDay');
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
        })
    </script>

@endsection
