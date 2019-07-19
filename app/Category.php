<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';

    public function books(){
    	return $this->belongsToMany('App\Book','book_category','Category_id','book_id');
    }
}
