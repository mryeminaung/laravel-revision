@props(['relatedArticles'])

<section>
    <h2 class="text-center">Related blogs</h2>
    <div class="px-2">
        @foreach ($relatedArticles as $article)
            <div class="card mb-3 border bg-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <h4 class="card-title fw-bold mr-2">{{ $article->title }}</h4>
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
        @endforeach
    </div>
</section>
