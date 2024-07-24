@props(['article'])

<div class="d-flex align-items-center gap-2">
    <img src="{{ $article->user->avatar }}" alt="" class="rounded-pill" style="width: 40px">
    <div class="d-flex flex-column">
        <a class="text-black text-muted"
            href="{{ route('user.articles', ['user' => $article->user]) }}"><strong>{{ $article->user->name }}</strong></a>
        {{ $article->created_at->diffForHumans() }}
    </div>
</div>
