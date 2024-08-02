@props(['relatedArticles'])

<section>
    <h2 class="text-center">Related blogs</h2>
    <div class="px-2">
        @foreach ($relatedArticles as $article)
            <div class="card mb-3 border bg-white shadow-sm">
                <div class="card-body">
                    <img src="{{ $article->article_img ? asset($article->article_img) : "https://dummyimage.com/700x400/000/fff.png&text=Blog+Img" }}" alt="{{ $article->slug }}" class="h-25 w-100 rounded">
                    <div class="d-flex align-items-start mt-3 justify-content-between">
                        <h5 class="card-title fw-bold me-2">{{ Str::limit($article->title, '50', '...') }}</h5>
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
        @endforeach
    </div>
</section>
