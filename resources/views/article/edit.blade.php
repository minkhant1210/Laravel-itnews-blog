@extends('layouts.app')

@section('title') Article Update @endsection

@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <i class="feather-plus-circle text-primary"></i>
                        <h5 class="d-inline mb-0">Article Update</h5>
                    </div>
                    <form action="{{ route('article.update',$article->id) }}" method="post" id="createArticle">
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card mt-2 rounded">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="category">Select Category</label>
                        <select name="category" id="category" class="custom-select @error('category') is-invalid @enderror" form="createArticle">
                            <option value="">select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category',$article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card mt-2 rounded">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <div class="form-group">
                            <label for="title">Article Title</label>
                            <input type="text" name="title" value="{{ old('title',$article->title) }}" id="title" class="form-control @error('title') is-invalid @enderror" form="createArticle">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="from-group mb-0">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror" form="createArticle">{{ old('description',$article->description) }}</textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card mt-2 rounded">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button class="btn btn-primary w-100" form="createArticle">Update Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
