@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cliente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clientes.update", [$cliente->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_cliente">{{ trans('cruds.cliente.fields.nombre_cliente') }}</label>
                <input class="form-control {{ $errors->has('nombre_cliente') ? 'is-invalid' : '' }}" type="text" name="nombre_cliente" id="nombre_cliente" value="{{ old('nombre_cliente', $cliente->nombre_cliente) }}" required>
                @if($errors->has('nombre_cliente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_cliente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nombre_cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="correo_cliente">{{ trans('cruds.cliente.fields.correo_cliente') }}</label>
                <input class="form-control {{ $errors->has('correo_cliente') ? 'is-invalid' : '' }}" type="email" name="correo_cliente" id="correo_cliente" value="{{ old('correo_cliente', $cliente->correo_cliente) }}" required>
                @if($errors->has('correo_cliente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correo_cliente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.correo_cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono_cliente">{{ trans('cruds.cliente.fields.telefono_cliente') }}</label>
                <input class="form-control {{ $errors->has('telefono_cliente') ? 'is-invalid' : '' }}" type="number" name="telefono_cliente" id="telefono_cliente" value="{{ old('telefono_cliente', $cliente->telefono_cliente) }}" step="1" required>
                @if($errors->has('telefono_cliente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono_cliente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.telefono_cliente_helper') }}</span>
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