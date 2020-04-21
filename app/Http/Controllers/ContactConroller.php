<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactConroller extends Controller
{
  public function contact(){
    return view("pages.contact");
  }
}
