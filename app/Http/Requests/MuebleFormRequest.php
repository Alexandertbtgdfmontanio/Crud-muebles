<?php

namespace app\Http\Requests;
namespace app\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;

class MuebleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mueble'=>'required|max:50',
            'material'=>'max:256',
            
        ];
    }
}
