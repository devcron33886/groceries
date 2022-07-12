<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShippingAddressRequest;
use App\Http\Requests\StoreShippingAddressRequest;
use App\Http\Requests\UpdateShippingAddressRequest;
use App\Models\PaymentMethod;
use App\Models\ShippingAddress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShippingAddressController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipping_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingAddresses = ShippingAddress::with(['payment_method'])->get();

        return view('admin.shippingAddresses.index', compact('shippingAddresses'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipping_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment_methods = PaymentMethod::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shippingAddresses.create', compact('payment_methods'));
    }

    public function store(StoreShippingAddressRequest $request)
    {
        $shippingAddress = ShippingAddress::create($request->all());

        return redirect()->route('admin.shipping-addresses.index');
    }

    public function edit(ShippingAddress $shippingAddress)
    {
        abort_if(Gate::denies('shipping_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment_methods = PaymentMethod::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shippingAddress->load('payment_method');

        return view('admin.shippingAddresses.edit', compact('payment_methods', 'shippingAddress'));
    }

    public function update(UpdateShippingAddressRequest $request, ShippingAddress $shippingAddress)
    {
        $shippingAddress->update($request->all());

        return redirect()->route('admin.shipping-addresses.index');
    }

    public function show(ShippingAddress $shippingAddress)
    {
        abort_if(Gate::denies('shipping_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingAddress->load('payment_method');

        return view('admin.shippingAddresses.show', compact('shippingAddress'));
    }

    public function destroy(ShippingAddress $shippingAddress)
    {
        abort_if(Gate::denies('shipping_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyShippingAddressRequest $request)
    {
        ShippingAddress::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
