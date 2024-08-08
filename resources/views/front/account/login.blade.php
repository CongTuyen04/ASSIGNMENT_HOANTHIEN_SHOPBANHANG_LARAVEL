@extends('front.layout.master')

@section('title', 'Login')

@section('body') 

{{-- Điều hướng --}}
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i>Home</a>
                    <span>Login</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end điều hướng --}}

{{-- login --}}
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>

                    @if (session('notification'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('notification') }}
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf           
                        <div class="group-input">
                            <label for="username">email address *</label>
                            <input type="text" id="username" name="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" id="pass" name="password">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" name="remember" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Forget Your Password</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">LOGIN</button>
                    </form>
                    <div class="switch-login">
                        <a href="/account/register" class="or-login">Or Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection