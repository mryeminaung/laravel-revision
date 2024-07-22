@props(['article'])

<div class="card mb-3 border bg-white shadow">
    <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
            <h5 class="card-title">{{ $article->title }}</h5>
            @if (auth()->user()->id === $article->user->id)
                <a href="/articles?category={{ $article->category->name }}"
                    class="badge bg-danger">{{ $article->category->name }}</a>
            @else
                <a href="/articles?category={{ $article->category->name }}"
                    class="badge bg-primary">{{ $article->category->name }}</a>
            @endif
        </div>
        <div class="card-subtitle mb-2 small">
            By <a class="text-black text-muted"
                href="{{ route('user.articles', ['user' => $article->user]) }}"><strong>{{ $article->user->name }}</strong></a>,
            {{ $article->created_at->diffForHumans() }}
        </div>
        <p class="card-text">{{ $article->body }}</p>
        <a class="card-link" href="{{ url("/articles/detail/$article->slug") }}">
            View Detail &raquo;
        </a>
    </div>
</div>
