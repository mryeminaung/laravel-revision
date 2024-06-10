@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url("articles/{$article->id}/update") }}">
            @csrf
            @method('put')
            @method('patch')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}">
            </div>
            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control">{{ $article->body }}</textarea>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"
                            {{ $article->category->name == $category['name'] ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
@endsection
