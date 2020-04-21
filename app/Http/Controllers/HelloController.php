<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function Ami(){
      return view("pages.service");
    }

    public function about(){
      return view("pages.about");
    }

    public function showPost(){
    
      $post = DB::table('posts')->join('categories','posts.category_id','categories.id')
         ->select('posts.*','categories.name','categories.slug')->paginate(6);
      return view('pages.blog',compact('post'));

  }
}
