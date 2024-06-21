@can('turno_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.turnos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.turno.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.turno.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-barbershopTurnoTurnos">
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
                <tbody>
                    @foreach($turnos as $key => $turno)
                        <tr data-entry-id="{{ $turno->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $turno->id ?? '' }}
                            </td>
                            <td>
                                {{ $turno->cliente_turno->nombre_cliente ?? '' }}
                            </td>
                            <td>
                                {{ $turno->cliente_turno->correo_cliente ?? '' }}
                            </td>
                            <td>
                                {{ $turno->cliente_turno->telefono_cliente ?? '' }}
                            </td>
                            <td>
                                {{ $turno->barbershop_turno->nombre_barbershop ?? '' }}
                            </td>
                            <td>
                                {{ $turno->barbershop_turno->direccion_barbershop ?? '' }}
                            </td>
                            <td>
                                {{ $turno->barbershop_turno->telefono_barbershop ?? '' }}
                            </td>
                            <td>
                                {{ $turno->barbero_turno->nombre_barbero ?? '' }}
                            </td>
                            <td>
                                {{ $turno->servicio_turno->nombre_servicio ?? '' }}
                            </td>
                            <td>
                                {{ $turno->servicio_turno->duracion_servicio ?? '' }}
                            </td>
                            <td>
                                {{ $turno->servicio_turno->precio_servicio ?? '' }}
                            </td>
                            <td>
                                {{ $turno->fecha_turno ?? '' }}
                            </td>
                            <td>
                                @can('turno_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.turnos.show', $turno->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('turno_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.turnos.edit', $turno->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('turno_delete')
                                    <form action="{{ route('admin.turnos.destroy', $turno->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('turno_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.turnos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-barbershopTurnoTurnos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection