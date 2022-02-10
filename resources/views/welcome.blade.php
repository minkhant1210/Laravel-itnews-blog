@extends('blog.master')
@section('title') Home @stop
@section('content')
    @forelse($articles as $article)
        <div class="">
            <div class="border-bottom article-preview">
                <div class="p-0 p-md-3">
                    <a class="fw-bold h4 d-block text-decoration-none"
                       href="{{ route('detail',$article->slug) }}">
                        {{ \Illuminate\Support\Str::words($article->title, 10) }}
                    </a>

                    <div class="small post-category mb-3">
                        <a href="{{ route('baseOnCategory',$article->category->id) }}" rel="category tag">
                            {{ $article->category->title }}
                        </a>

                    </div>

                    <div class="text-black-50 the-excerpt">
                        <p>
                            {{ \Illuminate\Support\Str::words($article->description, 50) }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center see-more-group">
                        <div class="d-flex align-items-center">
                            @if($article->user->photo)
                                <img alt="" src="{{ asset('storage/profile/'.$article->user->photo) }}"
                                     class="avatar avatar-50 photo rounded-circle" height="50" width="50"
                                     loading="lazy">
                            @else
                                <img alt="" src="{{ asset('dashboard/img/user-default-photo.png') }}"
                                     class="avatar avatar-50 photo rounded-circle" height="40" width="40"
                                     loading="lazy">
                            @endif
                            <div class="ms-2">
                                    <span class="small">
                                        <i class="feather-user"></i>
                                        {{ $article->user->name }}
                                    </span>
                                <br>
                                <span class="small">{{ $article->created_at->format("d F Y ") }}</span>
                            </div>
                        </div>

                        <a href="{{ route('detail',$article->slug) }}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @empty
        <div class="col-12 col-lg-6">

            <div class="mb-4 pb-4">
                <div class="py-5 my-5 text-center text-lg-start">
                    <p class="fw-bold text-primary">Dear Viewer</p>
                    <h1 class="fw-bold">
                        There is no article 😔 ...
                    </h1>
                    <p>Please go back to Home Page</p>
                    <a class="btn btn-outline-primary rounded-pill px-3" href="{{ route('index') }}">
                        <i class="feather-home"></i>
                        Blog Home
                    </a>
                </div>
            </div>
        </div>
    @endforelse

@endsection

@section('pagination-place')
    {{ $articles->onEachSide(1)->links() }}
@endsection
