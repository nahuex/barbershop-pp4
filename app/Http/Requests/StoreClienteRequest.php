<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClienteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cliente_create');
    }

    public function rules()
    {
        return [
            'nombre_cliente' => [
                'string',
                'required',
            ],
            'correo_cliente' => [
                'required',
            ],
            'telefono_cliente' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
