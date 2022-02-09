@extends('layouts.app')

@section('title') {{ $article->title }} @endsection

@section('head')
    <style>
        .description{
            white-space: pre-line;
        }
    </style>
@endsection

@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="mb-0 text-primary">{{ $article->title }}</h5>
                        <small class="d-inline-block text-black-50">
                            <span class="mr-1">
                                <i class="feather-user text-primary"></i>
                                {{ $article->user->name }}
                            </span>
                            <span class="mr-1">
                                <i class="feather-layers text-primary"></i>
                                {{ $article->category->title }}
                            </span>
                            <span class="mr-1">
                                <i class="feather-calendar text-primary"></i>
                                {{ $article->created_at->format("d-M-y") }}
                            </span>
                            <span class="mr-1">
                                <i class="feather-clock text-primary"></i>
                                {{ $article->created_at->format("h:i A") }}
                            </span>
                        </small>
                    </div>
                    <p class="text-black-50 description">
                        {{ $article->description }}
                    </p>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <p class="mb-0 text-primary">{{ $article->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="">
                            <a href="{{ route('article.edit',$article->id) }}" class="btn btn-primary btn-sm">
                                <i class="feather-edit"></i>
                            </a>
                            <form action="{{ route('article.destroy',$article->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are u sure to delete this article?')">
                                    <i class="feather-trash-2"></i>
                                </button>
                            </form>
                            <a href="{{ route('article.index') }}" class="btn btn-sm btn-info">
                                <i class="fas fa-list"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
