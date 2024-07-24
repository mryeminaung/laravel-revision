@props(['articles', 'categories', 'filterTag', 'user'])

<x-layout>

    <x-alert name="delete" />

    <x-alert name="add" />

    <x-filter-btns :user="$user ?? null" :categories="$categories" :filterTag="$filterTag" />

    <x-articles-section :articles="$articles" :filterTag="$filterTag" />

</x-layout>
