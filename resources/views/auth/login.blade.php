@extends('layouts.app')

@section('css')
<style>
    :root{
        --sapphire : #2e4b9b;
        --white : #fff;
    }
    .eb_fs{
        font-size: 7px;
        top: 100%;
        left: 40%;
        transform: translate(0, -60%);
    }

    .bg_eb{
        background-color: var(--sapphire);
    }
    .border_col{
        border-color: var(--sapphire);
    }

    input{
        caret-color: var(--sapphire);
        caret-shape: bar;
        border: none;
        border-bottom: 1px solid var(--sapphire);
        background-color: transparent;

    }
    .form-control:focus{
        box-shadow: 0 0 0 0.10rem var(--sapphire);
    }
    .form-check-input:focus{
        box-shadow: none;
    }
    .btn_bg{
        background-color: var(--sapphire);
        color: var(--white);
    }
    .btn_bg:hover{
        background-color: var(--white);
        color: var(--sapphire);
        border: 1px solid var(--sapphire);
    }
    .btn_text{
        color: var(--sapphire);
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center g-md-2">
        <div class="text-center col-md-4 position-relative">
            <img class="w-100 h-100" src="{{ asset('images/Programming-amico.png') }}" alt="">
            <small class="small text-muted eb_fs position-absolute">{{ __('Web illustrations by') }} <a class="text-decoration-none" href="https://storyset.com/web">{{ __('Storyset') }}</a></small>
        </div>
        <div class="col-md-7">
            <div class="card border_col">
                <div class="card-header bg_eb text-light fw-bold">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn_bg fw-bold">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn_text text-decoration-none" href="{{ route('password.request') }}">
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
