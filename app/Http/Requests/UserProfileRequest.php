<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        $rules = User::USER_PROFILE_VALIDATION_RULES;

        $rules['email'][1] = 'unique:users,email,'.request()->route('id');
        
        return $rules; 
    }
}
