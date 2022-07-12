<?php

namespace App\Http\Requests;

use App\Models\Variation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVariationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('variation_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'type' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sku' => [
                'string',
                'nullable',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
