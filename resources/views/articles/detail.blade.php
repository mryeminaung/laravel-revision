<x-layout>

    <div class="container">
        <x-alert name="update" />

        <div class="row">
            <div class="col-12 col-md-6 mb-3 ">
                @if (session('dashboard_url'))
                    <a class="btn btn-primary mb-2" href="{{ session('dashboard_url') }}" role="button">
                        Back
                    </a>
                @else
                    <a class="btn btn-primary mb-2" href="{{ session('pre_url') }}" role="button">
                        Back
                    </a>
                @endif

                <div class="card mb-2 border rounded shadow-sm bg-white mt-1">
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
