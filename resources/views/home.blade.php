@extends('layouts.app')

@section('title') Home @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <i class="fas fa-home"></i>
                    {{ __('You are logged in!') }}
                        <hr>
                    <button class="test btn btn-primary">Test</button>
                        <hr>
                    {{ \App\Base::$name }}
                        <hr>
                    {{ \App\Base::$description }}
                        <hr>
                    {{ \App\Base::showName() }}
                        <hr>
                    {{ env("APP_NAME") }}
                        <hr>
                        <img src="{{ asset(\App\Base::$logo) }}" class="w-25" alt="">
                        <hr>
                    {{ date("d-M-Y / h:i:s / a") }}
                        <hr>
                    {{ B::$description }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script>
        $('.test').click(function (){
            alert('hello');
        })
    </script>
@endsection
