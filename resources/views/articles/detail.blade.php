@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('update') }}</strong>
            </div>
        @endif

        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <a class="btn btn-primary mb-2" href="{{ session('pre_url') }}" role="button">
                    Back
                </a>
                <div class="card mb-2 bg-white mt-1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}
                            <span class="badge bg-primary">{{ $article->category->name }}</span>
                        </h5>
                        <div class="card-subtitle mb-2 text-muted small">
                            By <strong>{{ $article->user->name }}</strong>,
                            {{ $article->created_at->diffForHumans() }}
                        </div>
                        <p class="card-text">{{ $article->body }}</p>

                        @auth
                            @if (Auth::user()->id === $article->user_id)
                                <a class="btn btn-warning btn-sm" href="{{ url("/articles/$article->id/edit") }}">
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ url("/articles/delete/$article->id") }}">
                                    Delete
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
                {{-- @auth --}}
                <form action="{{ url('/comments/add') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                    <textarea name="content" class="form-control mb-2 bg-white" placeholder="New Comment"></textarea>
                    <input type="submit" value="Add Comment" class="btn btn-secondary btn-sm">
                </form>
                {{-- @endauth --}}
            </div>
            <div class="col-12 col-md-6">
                <ul class="list-group mt-md-5">
                    <li class="list-group-item active">
                        <b>Comments ({{ count($article->comments) }})</b>
                    </li>
                    @foreach ($article->comments as $comment)
                        <li class="list-group-item bg-white">
                            @auth
                                @if ($comment->user->name === Auth::user()->name)
                                    <a class="btn-close float-end" href="{{ url("/comments/{$comment->id}/delete") }}"
                                        role="button">
                                    </a>
                                @endif
                            @endauth
                            {{ $comment->content }}
                            <div class="small text-muted mt-2">
                                By <b>{{ $comment->user->name }}</b>,
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
