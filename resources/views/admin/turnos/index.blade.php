@extends('layouts.admin')
@section('content')
@can('turno_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.turnos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.turno.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Turno', 'route' => 'admin.turnos.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.turno.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Turno">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.turno.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.turno.fields.cliente_turno') }}
                    </th>
                    <th>
                        {{ trans('cruds.cliente.fields.correo_cliente') }}
                    </th>
                    <th>
                        {{ trans('cruds.cliente.fields.telefono_cliente') }}
                    </th>
                    <th>
                        {{ trans('cruds.turno.fields.barbershop_turno') }}
                    </th>
                    <th>
                        {{ trans('cruds.barbershop.fields.direccion_barbershop') }}
                    </th>
                    <th>
                        {{ trans('cruds.barbershop.fields.telefono_barbershop') }}
                    </th>
                    <th>
                        {{ trans('cruds.turno.fields.barbero_turno') }}
                    </th>
                    <th>
                        {{ trans('cruds.turno.fields.servicio_turno') }}
                    </th>
                    <th>
                        {{ trans('cruds.servicio.fields.duracion_servicio') }}
                    </th>
                    <th>
                        {{ trans('cruds.servicio.fields.precio_servicio') }}
                    </th>
                    <th>
                        {{ trans('cruds.turno.fields.fecha_turno') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('turno_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.turnos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.turnos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'cliente_turno_nombre_cliente', name: 'cliente_turno.nombre_cliente' },
{ data: 'cliente_turno.correo_cliente', name: 'cliente_turno.correo_cliente' },
{ data: 'cliente_turno.telefono_cliente', name: 'cliente_turno.telefono_cliente' },
{ data: 'barbershop_turno_nombre_barbershop', name: 'barbershop_turno.nombre_barbershop' },
{ data: 'barbershop_turno.direccion_barbershop', name: 'barbershop_turno.direccion_barbershop' },
{ data: 'barbershop_turno.telefono_barbershop', name: 'barbershop_turno.telefono_barbershop' },
{ data: 'barbero_turno_nombre_barbero', name: 'barbero_turno.nombre_barbero' },
{ data: 'servicio_turno_nombre_servicio', name: 'servicio_turno.nombre_servicio' },
{ data: 'servicio_turno.duracion_servicio', name: 'servicio_turno.duracion_servicio' },
{ data: 'servicio_turno.precio_servicio', name: 'servicio_turno.precio_servicio' },
{ data: 'fecha_turno', name: 'fecha_turno' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Turno').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection