@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('update') }}</strong>
            </div>
        @endif

        <a class="btn btn-primary mb-2 btn-sm" href="{{ session('pre_url') }}" role="button">Back</a>

        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}
                    <span class="badge bg-primary">{{ $article->category->name }}</span>
                </h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a class="btn btn-warning" href="{{ url("/articles/$article->id/edit") }}">
                    Edit
                </a>
                <a class="btn btn-danger" href="{{ url("/articles/delete/$article->id") }}">
                    Delete
                </a>
            </div>
        </div>
    </div>
@endsection
