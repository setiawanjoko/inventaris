<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if($this->routeIs('ruang.store')) $codeValidation = 'required';
        else if($this->routeIs('ruang.update')) $codeValidation = 'sometimes';
        else $codeValidation = 'nullable';

        return [
            'code' => [$codeValidation, 'string', 'unique:App\Models\Ruang,code'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Kode ruang wajib diisi.',
            'code.unique' => 'Kode ruang telah dipakai.',
            'name.required' => 'Nama ruang wajib diisi.'
        ];
    }

    public function prepareForValidation()
    {
        if(is_null($this->code)) {
            $this->request->remove('code');
        }
    }
}
