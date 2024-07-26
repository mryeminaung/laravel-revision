@props(['article'])

<div class="card mb-3 border bg-white shadow">
    <div class="card-body">
        <img src="{{ $article->article_img }}" class="h-25 w-100 border border-secondary rounded">
        <div class="d-flex align-items-start justify-content-between mt-3">
            <h4 class="card-title fw-bold me-2">{{ Str::limit($article->title, '40', '...') }}</h4>
            <x-badge :article="$article" />
        </div>
        <div class="card-subtitle mb-2 small">
            <x-avatar :article="$article" />
        </div>
        <p class="card-text">{{ Str::limit($article->body, '100', '...') }}</p>
        <a class="card-link" href="{{ url("/articles/detail/$article->slug") }}">
            View Detail &raquo;
        </a>
    </div>
</div>
