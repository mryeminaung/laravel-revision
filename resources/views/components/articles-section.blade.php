@props(['articles', 'filterTag'])

<div class="row">
    @if ($filterTag)
        @foreach ($articles->where('category.name', $filterTag ?? '') as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <x-article-card :article="$article" />
            </div>
        @endforeach
    @else
        @foreach ($articles as $article)
            <div class="col-12 col-md-6 col-lg-4">
                <x-article-card :article="$article" />
            </div>
        @endforeach
    @endif
</div>
