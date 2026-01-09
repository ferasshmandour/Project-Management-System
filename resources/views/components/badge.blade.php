@props(['type' => 'secondary'])

<span class="badge bg-{{ $type }}">
    {{ ucfirst($slot) }}
</span>
