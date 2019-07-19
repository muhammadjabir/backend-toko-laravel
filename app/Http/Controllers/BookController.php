<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\Books as BookResourceCollection;
use App\Http\Resources\Book as BookResource;

class BookController extends Controller
{
    public function top($count){
    	$book = \App\Book::orderBy('views','DESC')->limit($count)->get();
    	return new BookResourceCollection($book);
    }

    public function index(){
    	$books= \App\Book::paginate(6);
    	return new BookResourceCollection($books);
    }

    public function slug($slug){
    	$criteria = \App\Book::where('slug',$slug)->first();
    	return new BookResource($criteria);
    }

    public function search($keyword){  
        $criteria = \App\Book::where('title','LIKE',"%$keyword%")
        ->orderBy('views','DESC')
        ->get();
        return new BookResourceCollection($criteria);
    }
}
