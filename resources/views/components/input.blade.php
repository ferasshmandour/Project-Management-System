@props(['type' => 'text', 'id' => null, 'name'])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label fw-semibold">
        {{ $slot }}
    </label>

    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ old($name) }}"
        placeholder="Enter {{ $name }}" class="form-control @error($name) is-invalid @enderror">

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
