<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVariationRequest;
use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;
use App\Models\Product;
use App\Models\Variation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VariationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('variation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variations = Variation::with(['product', 'media'])->get();

        return view('admin.variations.index', compact('variations'));
    }

    public function create()
    {
        abort_if(Gate::denies('variation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.variations.create', compact('products'));
    }

    public function store(StoreVariationRequest $request)
    {
        $variation = Variation::create($request->all());

        if ($request->input('variation_image', false)) {
            $variation->addMedia(storage_path('tmp/uploads/' . basename($request->input('variation_image'))))->toMediaCollection('variation_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $variation->id]);
        }

        return redirect()->route('admin.variations.index');
    }

    public function edit(Variation $variation)
    {
        abort_if(Gate::denies('variation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $variation->load('product');

        return view('admin.variations.edit', compact('products', 'variation'));
    }

    public function update(UpdateVariationRequest $request, Variation $variation)
    {
        $variation->update($request->all());

        if ($request->input('variation_image', false)) {
            if (!$variation->variation_image || $request->input('variation_image') !== $variation->variation_image->file_name) {
                if ($variation->variation_image) {
                    $variation->variation_image->delete();
                }
                $variation->addMedia(storage_path('tmp/uploads/' . basename($request->input('variation_image'))))->toMediaCollection('variation_image');
            }
        } elseif ($variation->variation_image) {
            $variation->variation_image->delete();
        }

        return redirect()->route('admin.variations.index');
    }

    public function show(Variation $variation)
    {
        abort_if(Gate::denies('variation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variation->load('product');

        return view('admin.variations.show', compact('variation'));
    }

    public function destroy(Variation $variation)
    {
        abort_if(Gate::denies('variation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variation->delete();

        return back();
    }

    public function massDestroy(MassDestroyVariationRequest $request)
    {
        Variation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('variation_create') && Gate::denies('variation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Variation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
