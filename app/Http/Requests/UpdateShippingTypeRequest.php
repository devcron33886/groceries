<?php

namespace App\Http\Requests;

use App\Models\ShippingType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShippingTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipping_type_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
