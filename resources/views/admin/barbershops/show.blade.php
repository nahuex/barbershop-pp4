@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.barbershop.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barbershops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.barbershop.fields.id') }}
                        </th>
                        <td>
                            {{ $barbershop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbershop.fields.nombre_barbershop') }}
                        </th>
                        <td>
                            {{ $barbershop->nombre_barbershop }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbershop.fields.direccion_barbershop') }}
                        </th>
                        <td>
                            {{ $barbershop->direccion_barbershop }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barbershop.fields.telefono_barbershop') }}
                        </th>
                        <td>
                            {{ $barbershop->telefono_barbershop }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barbershops.index') }}">
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
            <a class="nav-link" href="#barbershop_turno_turnos" role="tab" data-toggle="tab">
                {{ trans('cruds.turno.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="barbershop_turno_turnos">
            @includeIf('admin.barbershops.relationships.barbershopTurnoTurnos', ['turnos' => $barbershop->barbershopTurnoTurnos])
        </div>
    </div>
</div>

@endsection