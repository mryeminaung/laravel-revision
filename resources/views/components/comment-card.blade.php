@props(['comment'])

<li class="list-group-item bg-white">
    @auth
        @if ($comment->user->name === Auth::user()->name)
            <a class="btn-close float-end" href="{{ url("/comments/{$comment->id}/delete") }}" role="button">
            </a>
        @endif
    @endauth
    {{ $comment->content }}
    <div class="small text-muted  mt-2">
        By <a class="text-black text-muted"
            href="{{ route('user.articles', ['user' => $comment->user]) }}"><strong>{{ $comment->user->name }}</strong></a>,
        {{ $comment->created_at->diffForHumans() }}
    </div>
</li>
