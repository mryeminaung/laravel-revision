@props(['article'])

<ul class="list-group mt-2">
    <li class="list-group-item active">
        <b>Comments ({{ count($article->comments) }})</b>
    </li>
    @foreach ($article->comments as $comment)
        <x-comment-card :comment="$comment" />
    @endforeach
</ul>
