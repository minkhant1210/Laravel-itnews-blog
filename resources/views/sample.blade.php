@extends('layouts.app')

@section('title') Sample @endsection

@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="#">Sample</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sample Photo</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <i class="feather-feather text-primary"></i>
                        <h5 class="d-inline mb-0">Category List</h5>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
