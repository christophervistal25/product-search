<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 	protected $fillable = ['barcode', 'name', 'description', 'price'];
 	protected $primaryKey = 'barcode';

 	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'barcode';
	}

	public function categories()
	{
		return $this->belongsToMany('App\Category', 'product_category', 'product_barcode', 'category_id');
	}
}
