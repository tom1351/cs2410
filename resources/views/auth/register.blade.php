@extends('layouts.main.alternate') 

@section('content')

<div class="page-header" filter-color="orange">
    <div class="page-header-image" style="background-image:url(/img/campus.jpg)"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="/img/su-logo.png" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name..." required>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address..." required>

                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password..." required>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                        
                        @include('layouts.errors')
                        
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="pull-left">
                        <h6>
                            <a href="/login" class="link">Login</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a class="link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection 