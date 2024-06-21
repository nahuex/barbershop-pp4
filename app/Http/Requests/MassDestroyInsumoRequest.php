<?php

namespace App\Http\Requests;

use App\Models\Insumo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInsumoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('insumo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:insumos,id',
        ];
    }
}
