@props(['type' => 'text', 'id' => null, 'name', 'value' => null])

<div class="mb-3">
    <label for="{{ $id ?? $name }}" class="form-label fw-semibold">
        {{ $slot }}
    </label>

    <input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}"
        value="{{ $type !== 'password' ? old($name, $value) : '' }}" placeholder="Enter {{ $name }}"
        {{ $attributes->merge([
            'class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : ''),
        ]) }}>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
