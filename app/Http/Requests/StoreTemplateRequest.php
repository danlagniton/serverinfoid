<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use App\Models\Role;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class StoreTemplateRequest extends FormRequest
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
        // get initial rules from model
        $rules = Template::VALIDATION_RULES; 
        
        // update validation for updating template
        if($this->getMethod() == 'PUT') {
            // modify validation for template name
            $rules['template_name'][1] = 'unique:templates,template_name,'.request()->route('id');
            // add validation for status field
            $rules += ['status' => 'required'];
        }

        return $rules;
    }
}
