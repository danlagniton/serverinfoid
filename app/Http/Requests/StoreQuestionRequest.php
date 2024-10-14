<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use App\Models\Question;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return Auth::user()->role_id === Role::IS_ADMIN || Auth::user()->role_id === Role::IS_NURSE;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return Question::VALIDATION_RULES;
    }
}
