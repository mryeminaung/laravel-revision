@props(['article'])

<div class="card mb-3 border bg-white shadow">
    <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
            <h3 class="card-title fw-bold mr-2">{{ $article->title }}</h3>
            <x-badge :article="$article" />
        </div>
        <div class="card-subtitle mb-2 small">
            <x-avatar :article="$article" />
        </div>
        <p class="card-text">{{ $article->body }}</p>
        <a class="card-link" href="{{ url("/articles/detail/$article->slug") }}">
            View Detail &raquo;
        </a>
    </div>
</div>
