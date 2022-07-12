<?php

namespace App\Http\Requests;

use App\Models\ShippingAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShippingAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipping_address_create');
    }

    public function rules()
    {
        return [
            'address' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'postcode' => [
                'string',
                'nullable',
            ],
            'mobile' => [
                'string',
                'required',
            ],
        ];
    }
}
