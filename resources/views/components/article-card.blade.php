@props(['article'])

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
