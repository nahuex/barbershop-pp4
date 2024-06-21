@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.servicio.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.servicios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.servicio.fields.id') }}
                        </th>
                        <td>
                            {{ $servicio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicio.fields.nombre_servicio') }}
                        </th>
                        <td>
                            {{ $servicio->nombre_servicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicio.fields.precio_servicio') }}
                        </th>
                        <td>
                            {{ $servicio->precio_servicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicio.fields.duracion_servicio') }}
                        </th>
                        <td>
                            {{ $servicio->duracion_servicio }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.servicios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#servicio_turno_turnos" role="tab" data-toggle="tab">
                {{ trans('cruds.turno.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="servicio_turno_turnos">
            @includeIf('admin.servicios.relationships.servicioTurnoTurnos', ['turnos' => $servicio->servicioTurnoTurnos])
        </div>
    </div>
</div>

@endsection