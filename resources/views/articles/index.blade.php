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
            @foreach ($categories as $category)
                <a href="/articles?category={{ $category['name'] }}" role="button"
                    class="btn {{ $category['name'] === $filterTag ? 'btn-primary' : 'btn-outline-primary' }} btn-sm mb-1">
                    <strong>{{ $category['name'] }}</strong>
                </a>
            @endforeach
            @if ($filterTag)
                <a href="/articles" role="button" class="mb-1">
                    <strong>Clear</strong>
                </a>
            @endif
        </div>

        {{-- {{ $articles->links() }} --}}

        @foreach ($articles as $article)
            @if ($filterTag)
                @if ($article->category->name === $filterTag)
                    <div class="card mb-2 bg-white">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}
                                <span class="badge bg-primary">{{ $article->category->name }}</span>
                            </h5>
                            <div class="card-subtitle mb-2 text-muted small">
                                {{ $article->created_at->diffForHumans() }}
                            </div>
                            <p class="card-text">{{ $article->body }}</p>
                            <a class="card-link" href="{{ url("/articles/detail/$article->id") }}">
                                View Detail &raquo;
                            </a>
                        </div>
                    </div>
                @endif
            @else
                <div class="card mb-2 bg-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}
                            <span class="badge bg-primary">{{ $article->category->name }}</span>
                        </h5>
                        <div class="card-subtitle mb-2 text-muted small">
                            {{ $article->created_at->diffForHumans() }}
                        </div>
                        <p class="card-text">{{ $article->body }}</p>
                        <a class="card-link" href="{{ url("/articles/detail/$article->id") }}">
                            View Detail &raquo;
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
