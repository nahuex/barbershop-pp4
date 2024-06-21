<?php

namespace App\Http\Requests;

use App\Models\Herramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('herramientum_create');
    }

    public function rules()
    {
        return [
            'nombre_herramienta' => [
                'string',
                'required',
            ],
            'unidad_herramienta' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lugar_herramienta_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
