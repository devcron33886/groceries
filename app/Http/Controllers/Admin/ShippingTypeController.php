<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShippingTypeRequest;
use App\Http\Requests\StoreShippingTypeRequest;
use App\Http\Requests\UpdateShippingTypeRequest;
use App\Models\ShippingType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShippingTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipping_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingTypes = ShippingType::all();

        return view('admin.shippingTypes.index', compact('shippingTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipping_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingTypes.create');
    }

    public function store(StoreShippingTypeRequest $request)
    {
        $shippingType = ShippingType::create($request->all());

        return redirect()->route('admin.shipping-types.index');
    }

    public function edit(ShippingType $shippingType)
    {
        abort_if(Gate::denies('shipping_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingTypes.edit', compact('shippingType'));
    }

    public function update(UpdateShippingTypeRequest $request, ShippingType $shippingType)
    {
        $shippingType->update($request->all());

        return redirect()->route('admin.shipping-types.index');
    }

    public function show(ShippingType $shippingType)
    {
        abort_if(Gate::denies('shipping_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shippingTypes.show', compact('shippingType'));
    }

    public function destroy(ShippingType $shippingType)
    {
        abort_if(Gate::denies('shipping_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingType->delete();

        return back();
    }

    public function massDestroy(MassDestroyShippingTypeRequest $request)
    {
        ShippingType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
