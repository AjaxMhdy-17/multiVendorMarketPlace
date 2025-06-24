<div class="form_box">
    <label for="name"
        {{ $attributes->merge(['class' => 'form-label mb-2 font-18 font-heading fw-600']) }}>{{ $label }}</label>
    <input type="{{ $type }}" class="common-input border" id="name" value="{{ $value }}"
        name="{{ $name }}" {{ $readonly ? 'readonly' : '' }} />
    <x-input-error :messages="$errors->get($name)" class="mt-1" />
</div>
