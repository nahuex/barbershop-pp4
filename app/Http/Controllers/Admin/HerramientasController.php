<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHerramientumRequest;
use App\Http\Requests\StoreHerramientumRequest;
use App\Http\Requests\UpdateHerramientumRequest;
use App\Models\Barbershop;
use App\Models\Herramientum;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HerramientasController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('herramientum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Herramientum::with(['lugar_herramienta', 'created_by'])->select(sprintf('%s.*', (new Herramientum)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'herramientum_show';
                $editGate      = 'herramientum_edit';
                $deleteGate    = 'herramientum_delete';
                $crudRoutePart = 'herramienta';

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
            $table->editColumn('nombre_herramienta', function ($row) {
                return $row->nombre_herramienta ? $row->nombre_herramienta : '';
            });
            $table->editColumn('unidad_herramienta', function ($row) {
                return $row->unidad_herramienta ? $row->unidad_herramienta : '';
            });
            $table->addColumn('lugar_herramienta_nombre_barbershop', function ($row) {
                return $row->lugar_herramienta ? $row->lugar_herramienta->nombre_barbershop : '';
            });

            $table->editColumn('foto_herramienta', function ($row) {
                if ($photo = $row->foto_herramienta) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'lugar_herramienta', 'foto_herramienta']);

            return $table->make(true);
        }

        return view('admin.herramienta.index');
    }

    public function create()
    {
        abort_if(Gate::denies('herramientum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lugar_herramientas = Barbershop::pluck('nombre_barbershop', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.herramienta.create', compact('lugar_herramientas'));
    }

    public function store(StoreHerramientumRequest $request)
    {
        $herramientum = Herramientum::create($request->all());

        if ($request->input('foto_herramienta', false)) {
            $herramientum->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_herramienta'))))->toMediaCollection('foto_herramienta');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $herramientum->id]);
        }

        return redirect()->route('admin.herramienta.index');
    }

    public function edit(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lugar_herramientas = Barbershop::pluck('nombre_barbershop', 'id')->prepend(trans('global.pleaseSelect'), '');

        $herramientum->load('lugar_herramienta', 'created_by');

        return view('admin.herramienta.edit', compact('herramientum', 'lugar_herramientas'));
    }

    public function update(UpdateHerramientumRequest $request, Herramientum $herramientum)
    {
        $herramientum->update($request->all());

        if ($request->input('foto_herramienta', false)) {
            if (! $herramientum->foto_herramienta || $request->input('foto_herramienta') !== $herramientum->foto_herramienta->file_name) {
                if ($herramientum->foto_herramienta) {
                    $herramientum->foto_herramienta->delete();
                }
                $herramientum->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_herramienta'))))->toMediaCollection('foto_herramienta');
            }
        } elseif ($herramientum->foto_herramienta) {
            $herramientum->foto_herramienta->delete();
        }

        return redirect()->route('admin.herramienta.index');
    }

    public function show(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientum->load('lugar_herramienta', 'created_by');

        return view('admin.herramienta.show', compact('herramientum'));
    }

    public function destroy(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientum->delete();

        return back();
    }

    public function massDestroy(MassDestroyHerramientumRequest $request)
    {
        $herramienta = Herramientum::find(request('ids'));

        foreach ($herramienta as $herramientum) {
            $herramientum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('herramientum_create') && Gate::denies('herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Herramientum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
