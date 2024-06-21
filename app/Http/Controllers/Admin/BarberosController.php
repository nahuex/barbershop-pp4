<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBarberoRequest;
use App\Http\Requests\StoreBarberoRequest;
use App\Http\Requests\UpdateBarberoRequest;
use App\Models\Barbero;
use App\Models\Servicio;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BarberosController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('barbero_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Barbero::with(['servicios_barberos', 'created_by'])->select(sprintf('%s.*', (new Barbero)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'barbero_show';
                $editGate      = 'barbero_edit';
                $deleteGate    = 'barbero_delete';
                $crudRoutePart = 'barberos';

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
            $table->editColumn('nombre_barbero', function ($row) {
                return $row->nombre_barbero ? $row->nombre_barbero : '';
            });
            $table->editColumn('correo_barbero', function ($row) {
                return $row->correo_barbero ? $row->correo_barbero : '';
            });
            $table->editColumn('telefono_barbero', function ($row) {
                return $row->telefono_barbero ? $row->telefono_barbero : '';
            });
            $table->editColumn('foto_barbero', function ($row) {
                if ($photo = $row->foto_barbero) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('servicios_barbero', function ($row) {
                $labels = [];
                foreach ($row->servicios_barberos as $servicios_barbero) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $servicios_barbero->nombre_servicio);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'foto_barbero', 'servicios_barbero']);

            return $table->make(true);
        }

        return view('admin.barberos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('barbero_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicios_barberos = Servicio::pluck('nombre_servicio', 'id');

        return view('admin.barberos.create', compact('servicios_barberos'));
    }

    public function store(StoreBarberoRequest $request)
    {
        $barbero = Barbero::create($request->all());
        $barbero->servicios_barberos()->sync($request->input('servicios_barberos', []));
        if ($request->input('foto_barbero', false)) {
            $barbero->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_barbero'))))->toMediaCollection('foto_barbero');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $barbero->id]);
        }

        return redirect()->route('admin.barberos.index');
    }

    public function edit(Barbero $barbero)
    {
        abort_if(Gate::denies('barbero_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servicios_barberos = Servicio::pluck('nombre_servicio', 'id');

        $barbero->load('servicios_barberos', 'created_by');

        return view('admin.barberos.edit', compact('barbero', 'servicios_barberos'));
    }

    public function update(UpdateBarberoRequest $request, Barbero $barbero)
    {
        $barbero->update($request->all());
        $barbero->servicios_barberos()->sync($request->input('servicios_barberos', []));
        if ($request->input('foto_barbero', false)) {
            if (! $barbero->foto_barbero || $request->input('foto_barbero') !== $barbero->foto_barbero->file_name) {
                if ($barbero->foto_barbero) {
                    $barbero->foto_barbero->delete();
                }
                $barbero->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_barbero'))))->toMediaCollection('foto_barbero');
            }
        } elseif ($barbero->foto_barbero) {
            $barbero->foto_barbero->delete();
        }

        return redirect()->route('admin.barberos.index');
    }

    public function show(Barbero $barbero)
    {
        abort_if(Gate::denies('barbero_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barbero->load('servicios_barberos', 'created_by', 'barberoTurnoTurnos');

        return view('admin.barberos.show', compact('barbero'));
    }

    public function destroy(Barbero $barbero)
    {
        abort_if(Gate::denies('barbero_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barbero->delete();

        return back();
    }

    public function massDestroy(MassDestroyBarberoRequest $request)
    {
        $barberos = Barbero::find(request('ids'));

        foreach ($barberos as $barbero) {
            $barbero->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('barbero_create') && Gate::denies('barbero_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Barbero();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
