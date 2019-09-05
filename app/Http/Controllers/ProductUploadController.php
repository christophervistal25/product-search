<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\Products\UploadRequest;
use App\Http\Repositories\CSVFormatter;
use App\Http\Repositories\Contracts\FormatterContract;
use App\Http\Repositories\ProductUploader;

class ProductUploadController extends Controller
{

    public function __construct(CSVFormatter $formatter, ProductUploader $uploader)
    {
        $this->formatter = $formatter;
        $this->uploader  = $uploader;
    }

    
    public function index()
    {
        return view('products.uploads.index');
    }

    public function upload(UploadRequest $request)
    {
        $file = file_get_contents($request->file('product_csv'));
        $this->uploader->upload($this->formatter, $file);
        return back()->with('success', 'Succesfully upload all content from CSV');
    }
}
