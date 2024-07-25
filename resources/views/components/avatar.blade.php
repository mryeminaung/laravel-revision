@props(['article'])

<div class="d-flex align-items-start justify-content-between">
    <div class="d-flex align-items-center gap-2">
        <img src="{{ $article->user->avatar }}" alt="" class="rounded-pill" style="width: 40px">
        <div class="d-flex flex-column">
            <a class="text-black text-muted"
                href="{{ route('user.articles', ['user' => $article->user]) }}"><strong>{{ $article->user->name }}</strong></a>
            {{ $article->created_at->diffForHumans() }}
        </div>
    </div>

    <a href=" {{ route('bookmark.add', ['article' => $article]) }}" class="text-black">
        <svg class="mt-0" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
            class="bi bi-bookmark-plus" viewBox="0 0 16 16">
            <path
                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
            <path
                d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4" />
        </svg>
    </a>

</div>
