@props(['article', 'relatedArticles'])

<x-layout>

    <div class="container">
        <x-alert name="update" />

        <div class="row">
            <div class="col-12 col-lg-8 mb-3 ">
                <x-back-btn name="dashboard_url" />
                <x-back-btn name="pre_url" />
                <x-back-btn name="user_url" />

                <div class="card mb-2 border rounded shadow-sm bg-white mt-1">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <h3 class="card-title fw-bold me-2">{{ $article->title }}</h3>
                            <x-badge :article="$article" />
                        </div>
                        <div class="card-subtitle mb-2 small">

                            <x-avatar :article="$article" />
                           
                        </div>
                        <p class="card-text">{{ $article->body }}</p>

                        <x-action-btns :article="$article" />

                    </div>
                </div>
                <x-comment-form :article="$article" />
                <x-comments :article="$article" />
            </div>
            <div class="col-12 col-lg-4">
                <x-related-blogs :relatedArticles="$relatedArticles" />
            </div>
        </div>
    </div>
</x-layout>
