<?php

namespace App\Http\Requests\Core;

use App\Models\Concept;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreConceptPost extends FormRequest
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
        $concept_id = $this->route('concept');
        return [
            'code' => $concept_id ? "required|unique:concepts,code,$concept_id,id" : 'required|unique:concepts,code',
            'name' => 'required',
            'taxable_type' => Rule::requiredIf($this->cat_concept_type_id == 1),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'code.required' => 'El campo código es requerido',
            'code.unique' => 'Ya existe un registro con este código',
            'name.required' => 'Debe proporcionar un nombre para este concepto',
            'taxable_type.numeric' => 'Debe proporcionar una gravabilidad para este concepto',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors()->all(), 422));
    }
}
