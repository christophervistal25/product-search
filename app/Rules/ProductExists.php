<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Product;

class ProductExists implements Rule
{
    protected $product;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exists = $this->product
                        ->where('barcode', 'like', '%' . $value . '%')
                        ->exists();
        return ($exists) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This product is already exists.';
    }
}
