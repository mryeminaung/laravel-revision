@props(['article'])

@if (Auth::check())
    @if (auth()->user()->id === $article->user->id)
        <a href="/articles?category={{ $article->category->name }}"
            class="badge bg-danger">{{ $article->category->name }}</a>
    @else
        <a href="/articles?category={{ $article->category->name }}"
            class="badge bg-primary">{{ $article->category->name }}</a>
    @endif
@else
    <a href="/articles?category={{ $article->category->name }}"
        class="badge bg-primary">{{ $article->category->name }}</a>
@endif
