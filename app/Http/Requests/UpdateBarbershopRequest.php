<?php

namespace App\Http\Requests;

use App\Models\Barbershop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBarbershopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('barbershop_edit');
    }

    public function rules()
    {
        return [
            'nombre_barbershop' => [
                'string',
                'required',
            ],
            'direccion_barbershop' => [
                'string',
                'required',
            ],
            'telefono_barbershop' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
