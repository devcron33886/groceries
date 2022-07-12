@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shippingAddress.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipping-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.id') }}
                        </th>
                        <td>
                            {{ $shippingAddress->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.address') }}
                        </th>
                        <td>
                            {{ $shippingAddress->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.city') }}
                        </th>
                        <td>
                            {{ $shippingAddress->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.postcode') }}
                        </th>
                        <td>
                            {{ $shippingAddress->postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.mobile') }}
                        </th>
                        <td>
                            {{ $shippingAddress->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $shippingAddress->payment_method->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipping-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection