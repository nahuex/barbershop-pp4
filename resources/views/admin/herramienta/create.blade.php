@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.herramientum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.herramienta.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_herramienta">{{ trans('cruds.herramientum.fields.nombre_herramienta') }}</label>
                <input class="form-control {{ $errors->has('nombre_herramienta') ? 'is-invalid' : '' }}" type="text" name="nombre_herramienta" id="nombre_herramienta" value="{{ old('nombre_herramienta', '') }}" required>
                @if($errors->has('nombre_herramienta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_herramienta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.nombre_herramienta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unidad_herramienta">{{ trans('cruds.herramientum.fields.unidad_herramienta') }}</label>
                <input class="form-control {{ $errors->has('unidad_herramienta') ? 'is-invalid' : '' }}" type="number" name="unidad_herramienta" id="unidad_herramienta" value="{{ old('unidad_herramienta', '') }}" step="1" required>
                @if($errors->has('unidad_herramienta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unidad_herramienta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.unidad_herramienta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lugar_herramienta_id">{{ trans('cruds.herramientum.fields.lugar_herramienta') }}</label>
                <select class="form-control select2 {{ $errors->has('lugar_herramienta') ? 'is-invalid' : '' }}" name="lugar_herramienta_id" id="lugar_herramienta_id" required>
                    @foreach($lugar_herramientas as $id => $entry)
                        <option value="{{ $id }}" {{ old('lugar_herramienta_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lugar_herramienta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lugar_herramienta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.lugar_herramienta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto_herramienta">{{ trans('cruds.herramientum.fields.foto_herramienta') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto_herramienta') ? 'is-invalid' : '' }}" id="foto_herramienta-dropzone">
                </div>
                @if($errors->has('foto_herramienta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_herramienta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.foto_herramienta_helper') }}</span>
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
    Dropzone.options.fotoHerramientaDropzone = {
    url: '{{ route('admin.herramienta.storeMedia') }}',
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
      $('form').find('input[name="foto_herramienta"]').remove()
      $('form').append('<input type="hidden" name="foto_herramienta" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_herramienta"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($herramientum) && $herramientum->foto_herramienta)
      var file = {!! json_encode($herramientum->foto_herramienta) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_herramienta" value="' + file.file_name + '">')
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