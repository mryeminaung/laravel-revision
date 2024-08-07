@props(['name'])

@if (session($name))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ session($name) }}</strong>
    </div>
@endif
