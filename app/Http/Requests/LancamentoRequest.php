<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LancamentoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'valor' => 'required',
            'descricao' => 'required',
            'data' => 'required|date',
            'tipo' => 'required',
            'user_id' => 'required'
        ];
    }
}
