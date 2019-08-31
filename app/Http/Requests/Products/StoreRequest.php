<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;
use App\Rules\ProductExists;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|max:50',
            'description' => 'required|max:100',
            'price'       => 'required',
            'barcode'     => ['required', new ProductExists(new Product)],
        ];
    }
}
