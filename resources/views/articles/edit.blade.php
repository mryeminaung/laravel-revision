@extends('layouts.app')

@section('content')
    <div class="container border rounded shadow bg-white p-4">

        <form method="POST" action="{{ url("articles/{$article->id}/update") }}">
            @csrf
            @method('put')
            @method('patch')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') ?? $article->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control">{{ old('body') ?? $article->body }}</textarea>
                @error('body')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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
@endsection
