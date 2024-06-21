<?php

namespace App\Http\Requests;

use App\Models\Insumo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInsumoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('insumo_edit');
    }

    public function rules()
    {
        return [
            'nombre_insumo' => [
                'string',
                'required',
            ],
            'unidad_insumo' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lugar_insumo_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
