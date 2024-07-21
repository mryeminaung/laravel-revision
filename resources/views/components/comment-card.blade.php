@props(['comment'])

<li class="list-group-item bg-white">
    @auth
        @if ($comment->user->name === Auth::user()->name)
            <a class="btn-close float-end" href="{{ url("/comments/{$comment->id}/delete") }}" role="button">
            </a>
        @endif
    @endauth
    {{ $comment->content }}
    <div class="small text-muted mt-2">
        By <b>{{ $comment->user->name }}</b>,
        {{ $comment->created_at->diffForHumans() }}
    </div>
</li>
