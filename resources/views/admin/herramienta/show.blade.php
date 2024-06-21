@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.herramientum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.id') }}
                        </th>
                        <td>
                            {{ $herramientum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.nombre_herramienta') }}
                        </th>
                        <td>
                            {{ $herramientum->nombre_herramienta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.unidad_herramienta') }}
                        </th>
                        <td>
                            {{ $herramientum->unidad_herramienta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.lugar_herramienta') }}
                        </th>
                        <td>
                            {{ $herramientum->lugar_herramienta->nombre_barbershop ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.foto_herramienta') }}
                        </th>
                        <td>
                            @if($herramientum->foto_herramienta)
                                <a href="{{ $herramientum->foto_herramienta->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $herramientum->foto_herramienta->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection