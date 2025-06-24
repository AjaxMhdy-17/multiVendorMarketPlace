<div class="form_box">
    <label for="{{ $name }}" class="form-label mb-2 font-18 font-heading fw-600">Country</label>
    <div class="select-has--icon">
        <select {{ $attributes->merge(['class' => 'common-input border select_2']) }} name="{{ $name }}"
            id="{{ $name }}">
            <option value="">{{ __('Select Country') }}</option>
            {{ $slot }}
        </select>
        <x-input-error :messages="$errors->get('country')" class="mt-1" />
    </div>
</div>
