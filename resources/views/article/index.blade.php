@extends('layouts.app')

@section('title') Article List @endsection

@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="feather-list text-primary"></i>
                            <h5 class="d-inline-block mb-0 mr-2">Article List</h5>
                        </div>
                        <div>
                            @isset(request()->search)
                                <p class="d-inline-block mb-0 mr-2">
                                    Search by: <b>{{ request()->search }}</b>
                                </p>
                            @endisset
                            <form action="{{ route('article.index') }}" method="get" class="d-inline-block">
                                <div class="form-inline">
                                    <label>
                                        <input type="text" name="search" placeholder="search" value="{{ request()->search }}" class="form-control mr-2 @error('title') is-invalid @enderror ">
                                    </label>
                                    <button class="btn btn-outline-primary btn-sm mr-2">
                                        <i class="feather-search"></i>
                                    </button>
                                    <a href="{{ route('article.create') }}" class="btn btn-outline-primary btn-sm d-inline-block mr-2">
                                        <i class="feather-plus-circle"></i>
                                    </a>
                                    @isset(request()->search)
                                        <a href="{{ route('article.index') }}" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-list"></i>
                                        </a>
                                    @endisset
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    @if(session("message"))
                        <small class="alert alert-success w-100 d-block mb-1">{{ session('message') }}</small>
                    @endif
                    @if(session("deleteMessage"))
                        <small class="alert alert-danger w-100 d-block mb-1">{{ session('deleteMessage') }}</small>
                    @endif
                    <table class="table table-hover table-bordered table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Category</th>
                            <th>Controls</th>
                            <th>Created At:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    <span class="text-primary">{{ \Illuminate\Support\Str::words($article->title,5) }}</span>
                                    <br>
                                    <small class="text-black-50">{{ \Illuminate\Support\Str::words($article->description,8) }}</small>
                                </td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->category->title }}</td>
                                <td>
                                    <a href="{{ route('article.edit',$article->id) }}" class="btn btn-primary btn-sm">
                                        <i class="feather-edit"></i>
                                    </a>
                                    <form action="{{ route('article.destroy',[$article->id,'page'=>request()->page]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this article?')">
                                            <i class="feather-trash-2"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('article.show',$article->id) }}" class="btn btn-info btn-sm">
                                        <i class="feather-info"></i>
                                    </a>
                                </td>
                                <td>
                                    <small>
                                        <i class="feather-calendar"></i>
                                        {{ $article->created_at->format("d-M-y") }}
                                        <br>
                                        <i class="feather-clock"></i>
                                        {{ $article->created_at->format("h:i A") }}
                                    </small>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">There is no Article</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            {{ $articles->appends(request()->all())->links() }}
                        </div>
                        <h5 class="text-primary">Total : {{ $articles->total() }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

