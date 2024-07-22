@props(['name'])

@if (session($name))
    <a class="btn btn-primary btn-sm mb-2" href="{{ session($name) }}" role="button">
        Back
    </a>
@endif
