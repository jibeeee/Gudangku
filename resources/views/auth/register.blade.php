@extends('layouts.master')

@section('content')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet"/>
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="row justify-content-center">

                <!-- Left Panel -->
                <div class="col register-left">
                    <div class="row">
                        <div class="col center">
                            <h1 class="register-title-left">Welcome Back!</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col center">
                            <p>To keep connected with us, please login with your personal info</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col center">
                            <div class='home-img-wrapper-register'>
                                <img src="{{asset('img/undraw_Hire_re_gn5j.svg')}}" alt="ilustrasi pendaftaran" class='home-img' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col center">
                            <a href="/login" class="btn btn-large-secondary-2">{{ __('Login') }}</a>
                        </div>
                    </div>
                </div>
                
                <!-- RightPanel -->
                <div class="col register-right">
                    <h1 class="register-title-right">Create Account</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col">
                                <div class="input-group">
                                    <i class="fas fa-user register-icon"></i>
                                    <input id="name" type="text" placeholder="Fullname" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <div class="input-group">
                                    <i class="fas fa-envelope register-icon"></i>
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">                                    
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                 <div class="input-group">
                                    <i class="fas fa-lock register-icon"></i>
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">      
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <div class="input-group">
                                    <i class="fas fa-lock register-icon"></i>
                                    <input id="password-confirm" type="password" placeholder="Confirm password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col center">
                                <button type="submit" class="btn btn-large-2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
