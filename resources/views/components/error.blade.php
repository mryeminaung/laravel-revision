@props(['name'])

@error($name)
    <span class="text-danger">{{ $message }}</span>
    @if ($name == 'content')
        <br />
    @endif
@enderror
