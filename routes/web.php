<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
    return "<h2>This is the Contact Page</h2>";
});
Route::get('/post/{id}',function($id){
    return '<h1>The post id is <h1>'.$id;
});
// Route::get('/post/{id}/{title}',function($id,$title){
//     return '<h1>post id is<h1> '.$id.' title is '.$title;
// });
//url shorten 
Route::get('/post/example/test/zwe/personal/hi',array('as'=>'dev.zwe',function(){
$url=route('dev.zwe');
return 'The url is '.$url;
}));
//chapter 14
Route::get('/post/{name}/{email}','PostController@post');
//chapter 15 resource route
Route::resource('/test','TestController');//can call any method
//chapter 16 view create
Route::get('/about','AboutController@about');
Route::get('/home','HomeController@home');
//chaper 17 passsing data 
//Route::get('/home/{name}','HomeController@Name');
//chaper 18 passsing data with array 
//Route::get('/home/{name}/{country}','HomeController@ManyPara');
//chaper 19 passsing data with array compact
//Route::get('/home/{name}/{country}','HomeController@ManyParaWithCompact');
Route::get('/insert',function(){
    //DB::insert('insert into post(title,content) values(?,?)',['Laravel title', 'Laravel content']);
    DB::insert('insert into post(title,content) value(?,?)',['Laravel title 1','Laravel content 1']);
});