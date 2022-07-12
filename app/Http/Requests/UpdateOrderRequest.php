<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'order_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'shipping_address_id' => [
                'required',
                'integer',
            ],
            'shipping_type_id' => [
                'required',
                'integer',
            ],
            'payment_method_id' => [
                'required',
                'integer',
            ],
            'email' => [
                'required',
            ],
            'subtotal' => [
                'required',
            ],
        ];
    }
}
