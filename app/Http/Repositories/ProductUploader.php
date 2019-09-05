<?php
namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\FormatterContract;
use App\Http\Repositories\Contracts\ProductUploaderContract;
use DB;

class ProductUploader implements ProductUploaderContract
{
    public function upload(FormatterContract $formatter, string $content)
    {
        return DB::insert('REPLACE INTO products(name, description, price, barcode) VALUES ' . $formatter->format($content));
    }
}
