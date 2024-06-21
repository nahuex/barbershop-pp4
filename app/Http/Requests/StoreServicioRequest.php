<?php

namespace App\Http\Requests;

use App\Models\Servicio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServicioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('servicio_create');
    }

    public function rules()
    {
        return [
            'nombre_servicio' => [
                'string',
                'required',
            ],
            'precio_servicio' => [
                'required',
            ],
            'duracion_servicio' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}
