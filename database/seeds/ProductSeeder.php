<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		factory(App\Category::class, 20)->create();

		factory(App\Product::class, 50)->create();

		$categories = App\Category::all();

		App\Product::all()->each(function ($product) use ($categories) { 
		    $product->categories()->attach(
		    	$categories->random(1,3)->pluck('id')->toArray()
		    ); 
		});
    }
}
