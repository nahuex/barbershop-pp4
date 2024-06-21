@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.barbero.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.barberos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_barbero">{{ trans('cruds.barbero.fields.nombre_barbero') }}</label>
                <input class="form-control {{ $errors->has('nombre_barbero') ? 'is-invalid' : '' }}" type="text" name="nombre_barbero" id="nombre_barbero" value="{{ old('nombre_barbero', '') }}" required>
                @if($errors->has('nombre_barbero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_barbero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbero.fields.nombre_barbero_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="correo_barbero">{{ trans('cruds.barbero.fields.correo_barbero') }}</label>
                <input class="form-control {{ $errors->has('correo_barbero') ? 'is-invalid' : '' }}" type="email" name="correo_barbero" id="correo_barbero" value="{{ old('correo_barbero') }}" required>
                @if($errors->has('correo_barbero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correo_barbero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbero.fields.correo_barbero_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono_barbero">{{ trans('cruds.barbero.fields.telefono_barbero') }}</label>
                <input class="form-control {{ $errors->has('telefono_barbero') ? 'is-invalid' : '' }}" type="number" name="telefono_barbero" id="telefono_barbero" value="{{ old('telefono_barbero', '') }}" step="1" required>
                @if($errors->has('telefono_barbero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono_barbero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbero.fields.telefono_barbero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto_barbero">{{ trans('cruds.barbero.fields.foto_barbero') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto_barbero') ? 'is-invalid' : '' }}" id="foto_barbero-dropzone">
                </div>
                @if($errors->has('foto_barbero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_barbero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbero.fields.foto_barbero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="servicios_barberos">{{ trans('cruds.barbero.fields.servicios_barbero') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('servicios_barberos') ? 'is-invalid' : '' }}" name="servicios_barberos[]" id="servicios_barberos" multiple>
                    @foreach($servicios_barberos as $id => $servicios_barbero)
                        <option value="{{ $id }}" {{ in_array($id, old('servicios_barberos', [])) ? 'selected' : '' }}>{{ $servicios_barbero }}</option>
                    @endforeach
                </select>
                @if($errors->has('servicios_barberos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('servicios_barberos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barbero.fields.servicios_barbero_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fotoBarberoDropzone = {
    url: '{{ route('admin.barberos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto_barbero"]').remove()
      $('form').append('<input type="hidden" name="foto_barbero" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_barbero"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($barbero) && $barbero->foto_barbero)
      var file = {!! json_encode($barbero->foto_barbero) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_barbero" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection