@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.servicio.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.servicios.update", [$servicio->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_servicio">{{ trans('cruds.servicio.fields.nombre_servicio') }}</label>
                <input class="form-control {{ $errors->has('nombre_servicio') ? 'is-invalid' : '' }}" type="text" name="nombre_servicio" id="nombre_servicio" value="{{ old('nombre_servicio', $servicio->nombre_servicio) }}" required>
                @if($errors->has('nombre_servicio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_servicio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servicio.fields.nombre_servicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="precio_servicio">{{ trans('cruds.servicio.fields.precio_servicio') }}</label>
                <input class="form-control {{ $errors->has('precio_servicio') ? 'is-invalid' : '' }}" type="number" name="precio_servicio" id="precio_servicio" value="{{ old('precio_servicio', $servicio->precio_servicio) }}" step="0.01" required>
                @if($errors->has('precio_servicio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('precio_servicio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servicio.fields.precio_servicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duracion_servicio">{{ trans('cruds.servicio.fields.duracion_servicio') }}</label>
                <input class="form-control timepicker {{ $errors->has('duracion_servicio') ? 'is-invalid' : '' }}" type="text" name="duracion_servicio" id="duracion_servicio" value="{{ old('duracion_servicio', $servicio->duracion_servicio) }}" required>
                @if($errors->has('duracion_servicio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duracion_servicio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servicio.fields.duracion_servicio_helper') }}</span>
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