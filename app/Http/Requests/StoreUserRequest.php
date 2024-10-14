<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return Auth::user()->role_id === Role::IS_ADMIN;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        // get initial rules from model
        $rules = User::VALIDATION_RULES; 

        // update validation for updating user
        if($this->getMethod() == 'PUT') {

            // modify validation for email
            $rules['email'][1] = 'unique:users,email,'.request()->route('id');
            
            unset($rules['password']);
        }

        if(!$this->is_uas_employee){
            $this->is_uas_employee = "false";
            $this->position_id = null;
            $this->department_id = null;

            unset($rules['position_id']);
            unset($rules['department_id']);
        } else {
            $this->is_uas_employee = "true";

        }

        return $rules;
    }
}
