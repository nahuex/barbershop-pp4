@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.insumo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.insumos.update", [$insumo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_insumo">{{ trans('cruds.insumo.fields.nombre_insumo') }}</label>
                <input class="form-control {{ $errors->has('nombre_insumo') ? 'is-invalid' : '' }}" type="text" name="nombre_insumo" id="nombre_insumo" value="{{ old('nombre_insumo', $insumo->nombre_insumo) }}" required>
                @if($errors->has('nombre_insumo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_insumo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.insumo.fields.nombre_insumo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unidad_insumo">{{ trans('cruds.insumo.fields.unidad_insumo') }}</label>
                <input class="form-control {{ $errors->has('unidad_insumo') ? 'is-invalid' : '' }}" type="number" name="unidad_insumo" id="unidad_insumo" value="{{ old('unidad_insumo', $insumo->unidad_insumo) }}" step="1" required>
                @if($errors->has('unidad_insumo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unidad_insumo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.insumo.fields.unidad_insumo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lugar_insumo_id">{{ trans('cruds.insumo.fields.lugar_insumo') }}</label>
                <select class="form-control select2 {{ $errors->has('lugar_insumo') ? 'is-invalid' : '' }}" name="lugar_insumo_id" id="lugar_insumo_id" required>
                    @foreach($lugar_insumos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lugar_insumo_id') ? old('lugar_insumo_id') : $insumo->lugar_insumo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lugar_insumo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lugar_insumo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.insumo.fields.lugar_insumo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto_insumo">{{ trans('cruds.insumo.fields.foto_insumo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto_insumo') ? 'is-invalid' : '' }}" id="foto_insumo-dropzone">
                </div>
                @if($errors->has('foto_insumo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_insumo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.insumo.fields.foto_insumo_helper') }}</span>
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
    Dropzone.options.fotoInsumoDropzone = {
    url: '{{ route('admin.insumos.storeMedia') }}',
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
      $('form').find('input[name="foto_insumo"]').remove()
      $('form').append('<input type="hidden" name="foto_insumo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_insumo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($insumo) && $insumo->foto_insumo)
      var file = {!! json_encode($insumo->foto_insumo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_insumo" value="' + file.file_name + '">')
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