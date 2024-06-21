<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyServicioRequest;
use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Models\Servicio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ServiciosController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('servicio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Servicio::with(['created_by'])->select(sprintf('%s.*', (new Servicio)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'servicio_show';
                $editGate      = 'servicio_edit';
                $deleteGate    = 'servicio_delete';
                $crudRoutePart = 'servicios';

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
            $table->editColumn('nombre_servicio', function ($row) {
                return $row->nombre_servicio ? $row->nombre_servicio : '';
            });
            $table->editColumn('precio_servicio', function ($row) {
                return $row->precio_servicio ? $row->precio_servicio : '';
            });
            $table->editColumn('duracion_servicio', function ($row) {
                return $row->duracion_servicio ? $row->duracion_servicio : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.servicios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('servicio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.servicios.create');
    }

    public function store(StoreServicioRequest $request)
    {
        $servicio = Servicio::create($request->all());

        return redirect()->route('admin.servicios.index');
    }

    public function edit(Servicio $servicio)
    {
        abort_if(Gate::denies('servicio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicio->load('created_by');

        return view('admin.servicios.edit', compact('servicio'));
    }

    public function update(UpdateServicioRequest $request, Servicio $servicio)
    {
        $servicio->update($request->all());

        return redirect()->route('admin.servicios.index');
    }

    public function show(Servicio $servicio)
    {
        abort_if(Gate::denies('servicio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicio->load('created_by', 'servicioTurnoTurnos');

        return view('admin.servicios.show', compact('servicio'));
    }

    public function destroy(Servicio $servicio)
    {
        abort_if(Gate::denies('servicio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicio->delete();

        return back();
    }

    public function massDestroy(MassDestroyServicioRequest $request)
    {
        $servicios = Servicio::find(request('ids'));

        foreach ($servicios as $servicio) {
            $servicio->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
