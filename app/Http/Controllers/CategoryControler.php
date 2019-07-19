<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Categories as CategoryResourceCollection;
use App\Http\Resources\Category as CategoryResource;

class CategoryControler extends Controller
{
    public function random($count){
    	$criteria = \App\Category::inRandomOrder()
    	->limit($count)
    	->get();
    	return new CategoryResourceCollection($criteria);
    }

    public function index(){
    	$criteria = \App\Category::paginate(6);
    	return new CategoryResourceCollection($criteria);
    }

    public function slug($slug){
    	$criteria = \App\Category::where('slug',$slug)->first();
    	return new CategoryResource($criteria);
    }
}
