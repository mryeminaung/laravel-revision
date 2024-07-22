@props(['articles', 'categories', 'filterTag', 'user'])

<x-layout>
    <div class="container">

        <x-alert name="delete" />

        <x-alert name="add" />

        <x-filter-btns :user="$user ?? null" :categories="$categories" :filterTag="$filterTag" />

        <x-articles-section :articles="$articles" :filterTag="$filterTag" />

    </div>
</x-layout>
