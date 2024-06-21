@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.turno.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.turnos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="cliente_turno_id">{{ trans('cruds.turno.fields.cliente_turno') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente_turno') ? 'is-invalid' : '' }}" name="cliente_turno_id" id="cliente_turno_id" required>
                    @foreach($cliente_turnos as $id => $entry)
                        <option value="{{ $id }}" {{ old('cliente_turno_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente_turno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cliente_turno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.turno.fields.cliente_turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="barbershop_turno_id">{{ trans('cruds.turno.fields.barbershop_turno') }}</label>
                <select class="form-control select2 {{ $errors->has('barbershop_turno') ? 'is-invalid' : '' }}" name="barbershop_turno_id" id="barbershop_turno_id" required>
                    @foreach($barbershop_turnos as $id => $entry)
                        <option value="{{ $id }}" {{ old('barbershop_turno_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('barbershop_turno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('barbershop_turno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.turno.fields.barbershop_turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="barbero_turno_id">{{ trans('cruds.turno.fields.barbero_turno') }}</label>
                <select class="form-control select2 {{ $errors->has('barbero_turno') ? 'is-invalid' : '' }}" name="barbero_turno_id" id="barbero_turno_id" required>
                    @foreach($barbero_turnos as $id => $entry)
                        <option value="{{ $id }}" {{ old('barbero_turno_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('barbero_turno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('barbero_turno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.turno.fields.barbero_turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="servicio_turno_id">{{ trans('cruds.turno.fields.servicio_turno') }}</label>
                <select class="form-control select2 {{ $errors->has('servicio_turno') ? 'is-invalid' : '' }}" name="servicio_turno_id" id="servicio_turno_id" required>
                    @foreach($servicio_turnos as $id => $entry)
                        <option value="{{ $id }}" {{ old('servicio_turno_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('servicio_turno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('servicio_turno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.turno.fields.servicio_turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_turno">{{ trans('cruds.turno.fields.fecha_turno') }}</label>
                <input class="form-control datetime {{ $errors->has('fecha_turno') ? 'is-invalid' : '' }}" type="text" name="fecha_turno" id="fecha_turno" value="{{ old('fecha_turno') }}" required>
                @if($errors->has('fecha_turno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_turno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.turno.fields.fecha_turno_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection