@props(['articles'])

<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <x-alert name="delete" />
                <x-alert name="add" />

                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                    </div>

                    <div class="px-3 mb-4 bg-white">
                        @foreach ($articles as $article)
                            <x-article-card :article="$article" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
