<?php

namespace App\Http\Requests;

use App\Models\ShippingType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyShippingTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('shipping_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:shipping_types,id',
        ];
    }
}
