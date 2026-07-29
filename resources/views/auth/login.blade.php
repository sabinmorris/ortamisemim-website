@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-top: 100px;">

                <div class="text-center"><img src="{{ asset('assets/img/smz_logo.png')}}" alt="" style="width: 100px; height:100px;"></div>
                <div class="card-header text-center">{{ __('Login to Start your Session') }}</div>

                
                <div class="card-body">
                @include('admin.ainc.messages')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group has-feedback">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email/Username" required autocomplete="email" autofocus>
                            <!-- <span class="bi bi-users form-control-feedback"></span> -->
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br />
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" placeholder="Password" required autocomplete="current-password">
                            <!-- <span class="bi bi-lock form-control-feedback"></span> -->
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br />
                        <div class="row mb-3">
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-8">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection