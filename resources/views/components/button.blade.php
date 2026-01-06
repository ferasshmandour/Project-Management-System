@props(['type' => 'button', 'class' => 'btn btn-primary', 'href' => null, 'needConfirm' => false])

@if ($href)
    <a href="{{ $href }}" class="{{ $class }}">
        {{ $slot }}
    </a>
@else
    @if ($needConfirm)
        <button type="{{ $type }}" class="{{ $class }}" onclick="return confirm('Are you sure?')">
            {{ $slot }}
        </button>
    @else
        <button type="{{ $type }}" class="{{ $class }}">
            {{ $slot }}
        </button>
    @endif
@endif
