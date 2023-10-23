<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'addres' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'status' => 'required|enum|accepted|in:status_option1,status_option2',
            'updated_at' => 'required|date_format:format',
            'status' => 'required|enum|accepted',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
