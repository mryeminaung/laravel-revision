<x-layout>
    <div class="container border rounded shadow bg-white p-4">
        <form method="post" action="{{ url('articles/store') }}">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                <x-error name="title" />
            </div>
            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control">{{ old('body') }}</textarea>
                <x-error name="body" />
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select class="form-select" name="category_id">
                    <option selected disabled>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected(old('category_id') == $category['id'])>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
                <x-error name="category_id" />
            </div>
            <a href="{{ session('pre_url') }}" class="btn btn-primary " role="button">Cancel</a>
            <input type="submit" value="Add Article" class="btn btn-primary">
        </form>
    </div>
</x-layout>
