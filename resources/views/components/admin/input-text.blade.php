<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}
        placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $readonly ? 'readonly' : '' }} />
    <x-input-error :messages="$errors->get($name)" class="mt-1" />
</div>
