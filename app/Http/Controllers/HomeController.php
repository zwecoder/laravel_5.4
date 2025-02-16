<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home(){
        return view('home');
    }
    public function Name($name){
        //with method data passing ch 17
        return view('home')->with('name',$name);
    }
    //data passing with array ch 18
    public function ManyPara($name,$country){
        return view('home')->with(array('name'=>$name,'country'=>$country));
    }
    //data passing with compact 19
    public function ManyParaWithCompact($name,$country){
        return view('home',compact('name','country'));
    }

}
