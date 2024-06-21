<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTurnoRequest;
use App\Http\Requests\StoreTurnoRequest;
use App\Http\Requests\UpdateTurnoRequest;
use App\Models\Barbero;
use App\Models\Barbershop;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Turno;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TurnosController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('turno_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Turno::with(['cliente_turno', 'barbershop_turno', 'barbero_turno', 'servicio_turno', 'created_by'])->select(sprintf('%s.*', (new Turno)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'turno_show';
                $editGate      = 'turno_edit';
                $deleteGate    = 'turno_delete';
                $crudRoutePart = 'turnos';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('cliente_turno_nombre_cliente', function ($row) {
                return $row->cliente_turno ? $row->cliente_turno->nombre_cliente : '';
            });

            $table->editColumn('cliente_turno.correo_cliente', function ($row) {
                return $row->cliente_turno ? (is_string($row->cliente_turno) ? $row->cliente_turno : $row->cliente_turno->correo_cliente) : '';
            });
            $table->editColumn('cliente_turno.telefono_cliente', function ($row) {
                return $row->cliente_turno ? (is_string($row->cliente_turno) ? $row->cliente_turno : $row->cliente_turno->telefono_cliente) : '';
            });
            $table->addColumn('barbershop_turno_nombre_barbershop', function ($row) {
                return $row->barbershop_turno ? $row->barbershop_turno->nombre_barbershop : '';
            });

            $table->editColumn('barbershop_turno.direccion_barbershop', function ($row) {
                return $row->barbershop_turno ? (is_string($row->barbershop_turno) ? $row->barbershop_turno : $row->barbershop_turno->direccion_barbershop) : '';
            });
            $table->editColumn('barbershop_turno.telefono_barbershop', function ($row) {
                return $row->barbershop_turno ? (is_string($row->barbershop_turno) ? $row->barbershop_turno : $row->barbershop_turno->telefono_barbershop) : '';
            });
            $table->addColumn('barbero_turno_nombre_barbero', function ($row) {
                return $row->barbero_turno ? $row->barbero_turno->nombre_barbero : '';
            });

            $table->addColumn('servicio_turno_nombre_servicio', function ($row) {
                return $row->servicio_turno ? $row->servicio_turno->nombre_servicio : '';
            });

            $table->editColumn('servicio_turno.duracion_servicio', function ($row) {
                return $row->servicio_turno ? (is_string($row->servicio_turno) ? $row->servicio_turno : $row->servicio_turno->duracion_servicio) : '';
            });
            $table->editColumn('servicio_turno.precio_servicio', function ($row) {
                return $row->servicio_turno ? (is_string($row->servicio_turno) ? $row->servicio_turno : $row->servicio_turno->precio_servicio) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'cliente_turno', 'barbershop_turno', 'barbero_turno', 'servicio_turno']);

            return $table->make(true);
        }

        return view('admin.turnos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('turno_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente_turnos = Cliente::pluck('nombre_cliente', 'id')->prepend(trans('global.pleaseSelect'), '');

        $barbershop_turnos = Barbershop::pluck('nombre_barbershop', 'id')->prepend(trans('global.pleaseSelect'), '');

        $barbero_turnos = Barbero::pluck('nombre_barbero', 'id')->prepend(trans('global.pleaseSelect'), '');

        $servicio_turnos = Servicio::pluck('nombre_servicio', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.turnos.create', compact('barbero_turnos', 'barbershop_turnos', 'cliente_turnos', 'servicio_turnos'));
    }

    public function store(StoreTurnoRequest $request)
    {
        $turno = Turno::create($request->all());

        return redirect()->route('admin.turnos.index');
    }

    public function edit(Turno $turno)
    {
        abort_if(Gate::denies('turno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente_turnos = Cliente::pluck('nombre_cliente', 'id')->prepend(trans('global.pleaseSelect'), '');

        $barbershop_turnos = Barbershop::pluck('nombre_barbershop', 'id')->prepend(trans('global.pleaseSelect'), '');

        $barbero_turnos = Barbero::pluck('nombre_barbero', 'id')->prepend(trans('global.pleaseSelect'), '');

        $servicio_turnos = Servicio::pluck('nombre_servicio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turno->load('cliente_turno', 'barbershop_turno', 'barbero_turno', 'servicio_turno', 'created_by');

        return view('admin.turnos.edit', compact('barbero_turnos', 'barbershop_turnos', 'cliente_turnos', 'servicio_turnos', 'turno'));
    }

    public function update(UpdateTurnoRequest $request, Turno $turno)
    {
        $turno->update($request->all());

        return redirect()->route('admin.turnos.index');
    }

    public function show(Turno $turno)
    {
        abort_if(Gate::denies('turno_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turno->load('cliente_turno', 'barbershop_turno', 'barbero_turno', 'servicio_turno', 'created_by');

        return view('admin.turnos.show', compact('turno'));
    }

    public function destroy(Turno $turno)
    {
        abort_if(Gate::denies('turno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turno->delete();

        return back();
    }

    public function massDestroy(MassDestroyTurnoRequest $request)
    {
        $turnos = Turno::find(request('ids'));

        foreach ($turnos as $turno) {
            $turno->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
