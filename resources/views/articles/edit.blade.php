<x-layout>

    <div class="container border rounded shadow bg-white p-4">

        <form method="POST" enctype="multipart/form-data" action="{{ url("articles/{$article->id}/update") }}">
            @csrf
            @method('put')
            @method('patch')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') ?? $article->title }}">
                <x-error name="title" />
            </div>
            <div class="mb-3">
                <label for="article_img">Upload Image</label>
                <input type="file" class="form-control" id="article_img" name="article_img">
            </div>
            <x-error name="article_img" />
            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control">{{ old('body') ?? $article->body }}</textarea>
                <x-error name="body" />
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select class="form-select" name="category_id">
                    <option disabled>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($category['id'] == (old('category_id') ?? $article->category->id))>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <a href="{{ url("/articles/detail/$article->slug") }}" class="btn btn-primary " role="button">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</x-layout>
