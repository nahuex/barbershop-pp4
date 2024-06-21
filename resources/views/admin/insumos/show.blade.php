@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.insumo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insumos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.insumo.fields.id') }}
                        </th>
                        <td>
                            {{ $insumo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insumo.fields.nombre_insumo') }}
                        </th>
                        <td>
                            {{ $insumo->nombre_insumo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insumo.fields.unidad_insumo') }}
                        </th>
                        <td>
                            {{ $insumo->unidad_insumo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insumo.fields.lugar_insumo') }}
                        </th>
                        <td>
                            {{ $insumo->lugar_insumo->nombre_barbershop ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insumo.fields.foto_insumo') }}
                        </th>
                        <td>
                            @if($insumo->foto_insumo)
                                <a href="{{ $insumo->foto_insumo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $insumo->foto_insumo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insumos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection