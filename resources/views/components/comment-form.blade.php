@props(['article'])

<form action="{{ url('/comments/add') }}" method="post">
    @csrf
    @method('post')
    
    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <textarea name="content" class="form-control mb-2 border shadow-sm bg-white" placeholder="New Comment"></textarea>

    <x-error name="content" />

    <input type="submit" value="Add Comment" class="btn btn-secondary btn-sm">
</form>
