<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBarbershopRequest;
use App\Http\Requests\StoreBarbershopRequest;
use App\Http\Requests\UpdateBarbershopRequest;
use App\Models\Barbershop;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BarbershopsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('barbershop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Barbershop::with(['created_by'])->select(sprintf('%s.*', (new Barbershop)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'barbershop_show';
                $editGate      = 'barbershop_edit';
                $deleteGate    = 'barbershop_delete';
                $crudRoutePart = 'barbershops';

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
            $table->editColumn('nombre_barbershop', function ($row) {
                return $row->nombre_barbershop ? $row->nombre_barbershop : '';
            });
            $table->editColumn('direccion_barbershop', function ($row) {
                return $row->direccion_barbershop ? $row->direccion_barbershop : '';
            });
            $table->editColumn('telefono_barbershop', function ($row) {
                return $row->telefono_barbershop ? $row->telefono_barbershop : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.barbershops.index');
    }

    public function create()
    {
        abort_if(Gate::denies('barbershop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.barbershops.create');
    }

    public function store(StoreBarbershopRequest $request)
    {
        $barbershop = Barbershop::create($request->all());

        return redirect()->route('admin.barbershops.index');
    }

    public function edit(Barbershop $barbershop)
    {
        abort_if(Gate::denies('barbershop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barbershop->load('created_by');

        return view('admin.barbershops.edit', compact('barbershop'));
    }

    public function update(UpdateBarbershopRequest $request, Barbershop $barbershop)
    {
        $barbershop->update($request->all());

        return redirect()->route('admin.barbershops.index');
    }

    public function show(Barbershop $barbershop)
    {
        abort_if(Gate::denies('barbershop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barbershop->load('created_by', 'barbershopTurnoTurnos');

        return view('admin.barbershops.show', compact('barbershop'));
    }

    public function destroy(Barbershop $barbershop)
    {
        abort_if(Gate::denies('barbershop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barbershop->delete();

        return back();
    }

    public function massDestroy(MassDestroyBarbershopRequest $request)
    {
        $barbershops = Barbershop::find(request('ids'));

        foreach ($barbershops as $barbershop) {
            $barbershop->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
