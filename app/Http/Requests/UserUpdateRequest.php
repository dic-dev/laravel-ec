<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postal_code' => ['required', 'numeric'],
            'pref_id' => ['required', 'numeric'],
            'city' => ['required', 'string'],
            'address1' => ['required', 'string'],
            'address2' => ['string'],
            'tel' => ['required', 'numeric']
        ];
    }
}
