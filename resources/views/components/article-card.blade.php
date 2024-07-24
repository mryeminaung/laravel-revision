@props(['article'])

<div class="card mb-3 border bg-white shadow">
    <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
            <h3 class="card-title fw-bold me-2">{{ Str::limit($article->title, '40', '...') }}</h3>
            <x-badge :article="$article" />
        </div>
        <div class="card-subtitle mb-2 small">
            <x-avatar :article="$article" />
        </div>
        <p class="card-text">{{ Str::limit($article->body, '200', '...') }}</p>
        <a class="card-link" href="{{ url("/articles/detail/$article->slug") }}">
            View Detail &raquo;
        </a>
    </div>
</div>
