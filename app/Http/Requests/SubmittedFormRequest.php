<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use App\Models\SubmittedForm;

class SubmittedFormRequest extends FormRequest
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
        return SubmittedForm::VALIDATION_RULES;
    }
}
