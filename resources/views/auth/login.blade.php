@extends('layouts.app')

@section('content')
    <section class="main container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-mg-6 col-lg-5">
                <div class="my-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <img src="{{ asset(\App\Base::$logo) }}" class="w-25" alt="">
                    </div>
                    <div class="border bg-white rounded-lg shadow-sm">
                        <div class="p-4">
                            <h4 class="text-center font-weight-normal">Sign In</h4>
                            <p class="text-center text-black-50 mb-4">
                                Don't have an account yet?
                                <a href="{{ route('register') }}">Sign up here</a>
                            </p>
                            <a href="#" class="btn btn-outline-secondary btn-block">
                                <i class="feather-log-in"></i>
                                Sign in with Google
                            </a>
                            <hr class="mb-5">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class=" col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
