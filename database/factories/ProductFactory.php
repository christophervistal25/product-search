<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
		'barcode'     => $faker->ean13,
		'name'        => $faker->name,
		'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'price'       => $faker->randomDigit
 ];
});
