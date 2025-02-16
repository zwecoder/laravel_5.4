<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
   public function about(){
    $persons=["aung aung","su su","aye aye"];
    return view('about',compact('persons'));
   }
}
