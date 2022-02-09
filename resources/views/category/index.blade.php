@extends('layouts.app')

@section('title') Manage Category @endsection

@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">Category List</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>

                        <h5 class="d-inline mb-0">
                            <i class="feather-layers text-primary"></i>
                            Category List
                        </h5>
                    </div>
                    <hr>
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-inline">
                            <label>
                                <input type="text" name="title" placeholder="New Category" value="{{ old('title') }}" class="form-control mr-2 @error('title') is-invalid @enderror ">
                            </label>
                            <button class="btn btn-primary">Add Category</button>
                            @if(session("message"))
                                <small class="alert alert-success ml-2 d-block mb-0 w-25">{{ session('message') }}</small>
                                @endif
                            @if(session("delete-message"))
                                <small class="alert alert-danger ml-2 d-block mb-0 w-25">{{ session('delete-message') }}</small>
                            @endif
                            @error('title')
                            <small class="alert alert-danger d-block ml-2 mb-0 w-25">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>
                    <hr>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection
