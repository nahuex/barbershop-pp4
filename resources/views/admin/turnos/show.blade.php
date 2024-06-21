@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.turno.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.turnos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.turno.fields.id') }}
                        </th>
                        <td>
                            {{ $turno->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turno.fields.cliente_turno') }}
                        </th>
                        <td>
                            {{ $turno->cliente_turno->nombre_cliente ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turno.fields.barbershop_turno') }}
                        </th>
                        <td>
                            {{ $turno->barbershop_turno->nombre_barbershop ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turno.fields.barbero_turno') }}
                        </th>
                        <td>
                            {{ $turno->barbero_turno->nombre_barbero ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turno.fields.servicio_turno') }}
                        </th>
                        <td>
                            {{ $turno->servicio_turno->nombre_servicio ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turno.fields.fecha_turno') }}
                        </th>
                        <td>
                            {{ $turno->fecha_turno }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.turnos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection