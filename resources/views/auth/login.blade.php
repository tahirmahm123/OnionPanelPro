@extends('layouts.app')

@section('body')
<div id="app">
    <main>
        <div id="primary" class=" p-t-b-100 height-full responsive-phone" style="background: rgb(20,166,227); background: linear-gradient(0deg, rgba(20,166,227,1) 0%, rgba(0,130,187,1) 100%);">
            <div class="container">
                <div class="row my-auto ">
                    <div class="col-lg-6 my-auto">
                        <div class="col-10 offset-1">
                            <img src="{{ asset('img/basic/logo_white.svg') }}" alt="OnionVPN">
                        </div>
                    </div>

                    <div class="col-lg-6 p-t-50">
                        <div class="text-white">
                            <h1>Welcome Back{{ json_encode($errors->all()) }}</h1>
                            <p class="s-18 p-t-b-20 font-weight-lighter">Hey there! Welcome Back Signin Now There is Lot of New Stuff Waiting for You</p>
                        </div>
                        <form action="{{ route('login') }}" method="post" id="formLogin" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group has-icon focused "><i class="icon-envelope-o"></i>
                                        <input id="login" type="text" class="form-control form-control-lg no-b @error('login') is-invalid @enderror" name="login" placeholder="Username OR Email" value="{{ old('login') }}" required autocomplete="email" autofocus>
                                        @error('login')
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group has-icon focused"><i class="icon-user-secret"></i>
                                        <input id="password" type="password" class="form-control form-control-lg no-b @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-success btn-lg btn-block has-icon" id="btnLogin" type="submit"><span id="submitIcon"><i class="icon-signin"></i></span>&nbsp; <span id="submitText">Let Me Enter</span></button>
                                    <p class="forget-pass text-white"></p>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                            {{ __('Have You Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-primary btn-lg toast-action d-none"
                                type="button"
                                id="errorBtn"
                                data-title=""
                                data-message=""
                                data-type=""
                                data-position-class="toast-top-right">
                            Error Toast</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #primary -->
    </main>
</div>
@endsection
