<?php

namespace App\Http\Requests;

use App\Models\Barbero;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBarberoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('barbero_create');
    }

    public function rules()
    {
        return [
            'nombre_barbero' => [
                'string',
                'required',
            ],
            'correo_barbero' => [
                'required',
            ],
            'telefono_barbero' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'servicios_barberos.*' => [
                'integer',
            ],
            'servicios_barberos' => [
                'array',
            ],
        ];
    }
}
