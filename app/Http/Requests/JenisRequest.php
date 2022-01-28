<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenisRequest extends FormRequest
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
        if($this->routeIs('jenis.store')) $codeValidation = 'required';
        else if($this->routeIs('jenis.update')) $codeValidation = 'sometimes';
        else $codeValidation = 'nullable';

        return [
            'code' => [$codeValidation, 'string', 'unique:App\Models\Jenis,code'],
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
