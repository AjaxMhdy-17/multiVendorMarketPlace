<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'level_id' => 'sometimes',
            'balance' => 'sometimes',
            'user_type' => 'sometimes',
            'country' => 'sometimes',
            'city' => 'sometimes',
            'address' => 'sometimes',
            'kyc_status' => 'sometimes',
            'total_sales' => 'sometimes',
            'withdraw_method_id' => 'sometimes',
        ];
    }
}
