@extends('layouts.master')

@section('content')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet"/>
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="row justify-content-center">

                <!-- Left Panel -->
                <div class="col login-left">
                    <h1 class="login-title-left">Login to GudangKu</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                             <div class="col">
                                <div class="input-group">
                                    <i class="fas fa-envelope login-icon"></i>
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                    <i class="fas fa-lock login-icon"></i>
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">      
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col center">
                                <button type="submit" class="btn btn-large">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>

                <!-- RightPanel -->
                <div class="col login-right">
                    <div class="row">
                        <div class="col center">
                            <h1 class="login-title-right" >Hello, Friend!</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col center">
                            <p>Enter your personal details and start journey with us</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col center">
                            <div class='home-img-wrapper'>
                                <img src="{{asset('img/undraw_Terms_re_6ak4.svg')}}" alt="ilustrasi pendaftaran" class='home-img' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col center">
                            <a href="" class="btn btn-large-secondary">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
