<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','photo'];

    	public function subcategories($value='')
    {
    	return $this->hasMany('App\Subcategory');
    }
}
