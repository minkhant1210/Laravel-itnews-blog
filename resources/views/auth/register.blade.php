@extends('layouts.app')

@section('content')
    <section class="main container ">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-mg-6 col-lg-5">
                <div class="my-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <img src="{{ asset(\App\Base::$logo) }}" class="w-25" alt="">
                    </div>
                    <div class="border bg-white rounded-lg shadow-sm">
                        <div class="p-4">
                            <h4 class="text-center font-weight-normal">Create Account</h4>
                            <p class="text-center text-black-50 mb-4">
                                Already have an account?
                                <a href="{{ route('login') }}">Sign in here</a>
                            </p>
                            <a href="#" class="btn btn-outline-secondary btn-block">
                                <i class="feather-log-in"></i>
                                Sign in with Google
                            </a>
                            <hr class="">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="row mb-2">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="email" class=" col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox" required>
                                        <label class="custom-control-label text-muted" for="termsCheckbox">
                                            I accept the <a href="#">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <hr>
{{--                                <button type="submit" class="btn btn-lg btn-block btn-primary">Sign Up</button>--}}

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
