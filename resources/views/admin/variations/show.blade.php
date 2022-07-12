@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.variation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.variations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.id') }}
                        </th>
                        <td>
                            {{ $variation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.product') }}
                        </th>
                        <td>
                            {{ $variation->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.name') }}
                        </th>
                        <td>
                            {{ $variation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.type') }}
                        </th>
                        <td>
                            {{ $variation->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.price') }}
                        </th>
                        <td>
                            {{ $variation->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.variation_image') }}
                        </th>
                        <td>
                            @if($variation->variation_image)
                                <a href="{{ $variation->variation_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $variation->variation_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.sku') }}
                        </th>
                        <td>
                            {{ $variation->sku }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variation.fields.order') }}
                        </th>
                        <td>
                            {{ $variation->order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.variations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection