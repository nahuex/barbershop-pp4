<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInsumoRequest;
use App\Http\Requests\StoreInsumoRequest;
use App\Http\Requests\UpdateInsumoRequest;
use App\Models\Barbershop;
use App\Models\Insumo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InsumosController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('insumo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Insumo::with(['lugar_insumo', 'created_by'])->select(sprintf('%s.*', (new Insumo)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'insumo_show';
                $editGate      = 'insumo_edit';
                $deleteGate    = 'insumo_delete';
                $crudRoutePart = 'insumos';

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
            $table->editColumn('nombre_insumo', function ($row) {
                return $row->nombre_insumo ? $row->nombre_insumo : '';
            });
            $table->editColumn('unidad_insumo', function ($row) {
                return $row->unidad_insumo ? $row->unidad_insumo : '';
            });
            $table->addColumn('lugar_insumo_nombre_barbershop', function ($row) {
                return $row->lugar_insumo ? $row->lugar_insumo->nombre_barbershop : '';
            });

            $table->editColumn('foto_insumo', function ($row) {
                if ($photo = $row->foto_insumo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'lugar_insumo', 'foto_insumo']);

            return $table->make(true);
        }

        return view('admin.insumos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('insumo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lugar_insumos = Barbershop::pluck('nombre_barbershop', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.insumos.create', compact('lugar_insumos'));
    }

    public function store(StoreInsumoRequest $request)
    {
        $insumo = Insumo::create($request->all());

        if ($request->input('foto_insumo', false)) {
            $insumo->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_insumo'))))->toMediaCollection('foto_insumo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $insumo->id]);
        }

        return redirect()->route('admin.insumos.index');
    }

    public function edit(Insumo $insumo)
    {
        abort_if(Gate::denies('insumo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lugar_insumos = Barbershop::pluck('nombre_barbershop', 'id')->prepend(trans('global.pleaseSelect'), '');

        $insumo->load('lugar_insumo', 'created_by');

        return view('admin.insumos.edit', compact('insumo', 'lugar_insumos'));
    }

    public function update(UpdateInsumoRequest $request, Insumo $insumo)
    {
        $insumo->update($request->all());

        if ($request->input('foto_insumo', false)) {
            if (! $insumo->foto_insumo || $request->input('foto_insumo') !== $insumo->foto_insumo->file_name) {
                if ($insumo->foto_insumo) {
                    $insumo->foto_insumo->delete();
                }
                $insumo->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_insumo'))))->toMediaCollection('foto_insumo');
            }
        } elseif ($insumo->foto_insumo) {
            $insumo->foto_insumo->delete();
        }

        return redirect()->route('admin.insumos.index');
    }

    public function show(Insumo $insumo)
    {
        abort_if(Gate::denies('insumo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insumo->load('lugar_insumo', 'created_by');

        return view('admin.insumos.show', compact('insumo'));
    }

    public function destroy(Insumo $insumo)
    {
        abort_if(Gate::denies('insumo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insumo->delete();

        return back();
    }

    public function massDestroy(MassDestroyInsumoRequest $request)
    {
        $insumos = Insumo::find(request('ids'));

        foreach ($insumos as $insumo) {
            $insumo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('insumo_create') && Gate::denies('insumo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Insumo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
