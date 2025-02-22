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

use App\Hacky;
use App\Post;
use Illuminate\Support\Facades\Route;

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

///////chapter 29 insert data ////////////////////////////
Route::get('/insert',function(){
    //DB::insert('insert into post(title,content) values(?,?)',['Laravel title', 'Laravel content']);
    DB::insert('insert into postss(title,content) value(?,?)',['Laravel title 3','Laravel content 3']);
});
///////////////////////////////////////////////////

/////////////chapter 30 read data ////////////////
Route::get('/read',function(){
    //     $result=DB::select('select * from post where id=?',[1]);
    $result=DB::select('select * from postss');
    foreach($result as $post){
       echo $post->content.'<br>'.$post->title.'<br>';
    }
});
//////////////////////////////////////////////////////////////

///////chapter 31 update data ////////////////////////////
Route::get('/update',function(){
    $result =DB::update('update postss set title=? where id=?',['testing 1',1]);
    if($result){
        return 'Data updated successfully';
    }else{
        return 'Data not updated';
    }
});
/////////////////////////////////////////////////

///////chapter 32 delete data ////////////////////////////
Route::get('/delete',function(){
    $result=DB::delete('delete from post where id=?',[1]);
    if($result){
        return 'Data deleted successfully';
    }else{  
        return 'Data not deleted';
    }   
});

///////chapter 33 insert data with model ////////////////////////////
Route::get('/getall',function(){
  $posts=Post::all();
  foreach($posts as $post){
    echo $post->title.'<br>';
  }
});
/////// chapter 34 Using Model //////////
Route::get('/inserthacky',function(){
        DB::insert('insert into hackies(title,content) values(?,?)',['model testing 3','model testing content 3']);
});
Route::get('/gethacky',function(){
    $hackies=Hacky::all();
    foreach($hackies as $hacky){
        echo $hacky->title.'<br>';
    }
});
////////////////////////////////////////

/////// chapter 35 find and where //////////
Route::get('/find',function(){
    $hacky=Hacky::find(1);
    return $hacky->title;
});

Route::get('/where',function(){
    //$hacky=Post::where('id',1)->where('is_admin',1)->get();
    $hacky=Post::where('is_admin',1)->take(1)->get();
    return $hacky;
});
////////////////////////////////////////

//////// chapter 36 find or fail //////////
Route::get('/findorfail',function(){
    $posts=Post::findorfail(5);
    return $posts;
});
//// easy insert////////////////////////
Route::get('/easyinsert',function(){
    $post=new Post;
    $post->title='this is new title';
    $post->content="this is new content";
    $post->save();
});
Route::get('easyupdate',function(){
    $post=Post::find(2);
    $post->title='this is updated title';
    $post->content='this is updated content';
    $post->save();
});
////////////////////////////////////

////// chapter 37 mass insert update //////////
Route::get('massinsert',function(){
    Post::create(['title'=>'mass insert title 1','content'=>'mass insert content 1']);
});
Route::get('massupdate',function(){
    Post::where('is_admin',1)->update(['title'=>'mass update title','content'=>'mass update content']);
});
//// chapter 38 delete and destory //////////
Route::get('deletes',function(){
    // $post=Post::find(3);
    // $post->delete();
    Post::destroy(4);
});
Route::get('massdelete',function(){
    Post::destroy([5,6]);
});
////////////////////////////////////////

/////// chapter 39 soft delete //////////
Route::get('softdelete',function(){
    $post=Post::find(7);
    $post->delete();
});
///////////////////////////////////////
/////// chapter 40 read soft delete //////////
Route::get('findSoftDelete',function(){
    //$post=Post::withTrashed()->where('id',1)->get(); //undeleleted data
    $post=Post::withTrashed()->where('id',7)->get();//find all data including soft deleted
    return $post;
});
Route::get('findSoftDeleteOnly',function(){
    $post=Post::onlyTrashed()->where('id',7)->get();//find only soft deleted data
    return $post;
});

