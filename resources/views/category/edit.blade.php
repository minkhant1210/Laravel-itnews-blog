@extends('layouts.app')

@section('title') Manage Category @endsection

@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="d-inline mb-0">
                            <i class="feather-edit text-primary"></i>
                            Edit Category
                        </h5>
                    </div>
                    <hr>
                    <form action="{{ route('category.update',$category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-inline">
                            <label>
                                <input type="text" name="title" autofocus placeholder="Update Category" value="{{ old('title',$category->title) }}" class="form-control mr-2 @error('title') is-invalid @enderror ">
                            </label>
                            <button class="btn btn-primary">Update</button>
                            @if(session("message"))
                                <small class="alert alert-success ml-2 d-block mb-0 w-25">{{ session('message') }}</small>
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
