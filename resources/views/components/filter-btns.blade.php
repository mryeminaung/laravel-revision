@props(['categories', 'filterTag'])

<div class="mb-3">
    <div class="d-flex flex-wrap align-items-center">
        @foreach ($categories as $category)
            <a href="/articles?category={{ $category['name'] }}" role="button"
                class="btn d-block me-2 mb-2 {{ $category['name'] === $filterTag ? 'btn-primary' : 'btn-outline-primary' }} btn-sm mb-1">
                <strong>{{ $category['name'] }}</strong>
            </a>
        @endforeach
        @if ($filterTag)
            <a href="/articles" role="button" class="mb-1">
                <strong>Clear</strong>
            </a>
        @endif
    </div>
</div>
