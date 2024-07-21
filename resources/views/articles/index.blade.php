@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('delete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('delete') }}</strong>
            </div>
        @endif
        @if (session('add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('add') }}</strong>
            </div>
        @endif

        <div class="mb-3">
            <div class="d-flex flex-wrap">
                @foreach ($categories as $category)
                    <a href="/articles?category={{ $category['name'] }}" role="button"
                        class="btn d-block me-2 mb-2 {{ $category['name'] === $filterTag ? 'btn-primary' : 'btn-outline-primary' }} btn-sm mb-1">
                        <strong>{{ $category['name'] }}</strong>
                    </a>
                @endforeach
                @if ($filterTag)
                    <a href="/articles" role="button" class="mb-1">
                        <strong>Clear</strong>
                    </a>
                @endif
            </div>
        </div>


        @foreach ($articles as $article)
            @if ($filterTag)
                @if ($article->category->name === $filterTag)
                    <div class="card mb-3 border bg-white shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <span
                                    class="badge @if (Auth::user()->id === $article->user_id) bg-danger @else bg-primary @endif">{{ $article->category->name }}</span>
                            </div>
                            <div class="card-subtitle mb-2 text-muted small">
                                By <strong>{{ $article->user->name }}</strong>,
                                {{ $article->created_at->diffForHumans() }}
                            </div>
                            <p class="card-text">{{ $article->body }}</p>
                            <a class="card-link" href="{{ url("/articles/detail/$article->slug") }}">
                                View Detail &raquo;
                            </a>
                        </div>
                    </div>
                @endif
            @else
                <div class="card mb-3 border bg-white shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <span
                                class="badge @if (Auth::user()->id === $article->user_id) bg-danger @else bg-primary @endif">{{ $article->category->name }}</span>
                        </div>
                        <div class="card-subtitle mb-2 text-muted small">
                            By <strong>{{ $article->user->name }}</strong>,
                            {{ $article->created_at->diffForHumans() }}
                        </div>
                        <p class="card-text">{{ $article->body }}</p>
                        <a class="card-link" href="{{ url("/articles/detail/$article->slug") }}">
                            View Detail &raquo;
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    </div>
@endsection
