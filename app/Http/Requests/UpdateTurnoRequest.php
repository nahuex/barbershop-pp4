<?php

namespace App\Http\Requests;

use App\Models\Turno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTurnoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('turno_edit');
    }

    public function rules()
    {
        return [
            'cliente_turno_id' => [
                'required',
                'integer',
            ],
            'barbershop_turno_id' => [
                'required',
                'integer',
            ],
            'barbero_turno_id' => [
                'required',
                'integer',
            ],
            'servicio_turno_id' => [
                'required',
                'integer',
            ],
            'fecha_turno' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
