<?php
namespace App\Http\Repositories\Contracts;

interface FormatterContract
{
    public function format(string $content) :string;
}
