@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- @dd($authArticles) --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                    <div class="px-3 mb-4 bg-white">
                        @foreach ($articles as $article)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
