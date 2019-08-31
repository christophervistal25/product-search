<?php
namespace App\Http\Repositories\Contracts;

interface ProductUploaderContract
{
	public function upload(FormatterContract $formatter, string $content);
}
