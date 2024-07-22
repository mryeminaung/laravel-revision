<x-layout>

    <div class="container">
        <x-alert name="update" />

        <div class="row">
            <div class="col-12 col-md-6 mb-3 ">
                <x-back-btn name="dashboard_url" />
                <x-back-btn name="pre_url" />
                <x-back-btn name="user_url" />

                <div class="card mb-2 border rounded shadow-sm bg-white mt-1">
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

                        <x-action-btns :article="$article" />

                    </div>
                </div>
                <x-comment-form :article="$article" />
            </div>
            <div class="col-12 col-md-6">
                <x-comments :article="$article" />
            </div>
        </div>
    </div>
</x-layout>
