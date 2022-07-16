<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
            ],
            'type' => [
                'required', 'string', 'max:255',
            ],
            'photo' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000',
            ],
            'qty' => [
                'required', 'string', 'max:255',
            ],
            'price' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}
