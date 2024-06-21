@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.barbero.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barberos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.barbero.fields.id') }}
                        </th>
                        <td>
                            {{ $barbero->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbero.fields.nombre_barbero') }}
                        </th>
                        <td>
                            {{ $barbero->nombre_barbero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbero.fields.correo_barbero') }}
                        </th>
                        <td>
                            {{ $barbero->correo_barbero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbero.fields.telefono_barbero') }}
                        </th>
                        <td>
                            {{ $barbero->telefono_barbero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbero.fields.foto_barbero') }}
                        </th>
                        <td>
                            @if($barbero->foto_barbero)
                                <a href="{{ $barbero->foto_barbero->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $barbero->foto_barbero->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbero.fields.servicios_barbero') }}
                        </th>
                        <td>
                            @foreach($barbero->servicios_barberos as $key => $servicios_barbero)
                                <span class="label label-info">{{ $servicios_barbero->nombre_servicio }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barberos.index') }}">
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
            <a class="nav-link" href="#barbero_turno_turnos" role="tab" data-toggle="tab">
                {{ trans('cruds.turno.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="barbero_turno_turnos">
            @includeIf('admin.barberos.relationships.barberoTurnoTurnos', ['turnos' => $barbero->barberoTurnoTurnos])
        </div>
    </div>
</div>

@endsection