<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <select {{ $attributes->merge(['class' => 'form-control form-select']) }} name={{ $name }}
        id={{ $name }}>
        <option value="">{{ __('Select A Option') }}</option>
        {{ $slot }}
    </select>
    <x-input-error :messages="$errors->get($name)" class="mt-1" />
</div>
