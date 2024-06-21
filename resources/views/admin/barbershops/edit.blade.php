@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.barbershop.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.barbershops.update", [$barbershop->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_barbershop">{{ trans('cruds.barbershop.fields.nombre_barbershop') }}</label>
                <input class="form-control {{ $errors->has('nombre_barbershop') ? 'is-invalid' : '' }}" type="text" name="nombre_barbershop" id="nombre_barbershop" value="{{ old('nombre_barbershop', $barbershop->nombre_barbershop) }}" required>
                @if($errors->has('nombre_barbershop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_barbershop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbershop.fields.nombre_barbershop_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="direccion_barbershop">{{ trans('cruds.barbershop.fields.direccion_barbershop') }}</label>
                <input class="form-control {{ $errors->has('direccion_barbershop') ? 'is-invalid' : '' }}" type="text" name="direccion_barbershop" id="direccion_barbershop" value="{{ old('direccion_barbershop', $barbershop->direccion_barbershop) }}" required>
                @if($errors->has('direccion_barbershop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direccion_barbershop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbershop.fields.direccion_barbershop_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono_barbershop">{{ trans('cruds.barbershop.fields.telefono_barbershop') }}</label>
                <input class="form-control {{ $errors->has('telefono_barbershop') ? 'is-invalid' : '' }}" type="number" name="telefono_barbershop" id="telefono_barbershop" value="{{ old('telefono_barbershop', $barbershop->telefono_barbershop) }}" step="1" required>
                @if($errors->has('telefono_barbershop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono_barbershop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbershop.fields.telefono_barbershop_helper') }}</span>
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