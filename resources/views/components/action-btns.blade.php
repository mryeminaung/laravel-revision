@props(['article'])

@auth
    @if (Auth::user()->id === $article->user_id)
        <a class="btn btn-warning btn-sm" href="{{ url("/articles/$article->id/edit") }}">
            Edit
        </a>
        <a class="btn btn-danger btn-sm" href="{{ url("/articles/delete/$article->id") }}">
            Delete
        </a>
    @endif
@endauth
