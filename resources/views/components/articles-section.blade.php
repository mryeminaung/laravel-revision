@props(['articles', 'filterTag'])

@foreach ($articles as $article)
    @if ($filterTag)
        @if ($article->category->name === $filterTag)
            <x-article-card :article="$article" />
        @endif
    @else
        <x-article-card :article="$article" />
    @endif
@endforeach
