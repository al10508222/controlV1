<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'name'    => 'required|string',
                    'key'     => 'required|string|unique:cat_permissions,key,:id',
                ];
                break;
            default:
                $rules = [
                    'name'    => 'required|string',
                    'key'     => 'required|string|unique:cat_permissions', 
                ];
                break;
        }
        
        return $rules;
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'key.required'  => 'La llave es requerida'
            
        ];
    }
}
