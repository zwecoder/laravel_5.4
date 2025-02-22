<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at']; //if you want to use different date format    
     protected $table='postss';  //if table name is different from model name
    // protected $primaryKey='id'; //if primary key is different from id
    // protected $timestamps=false; //if you dont want to use timestamps
   protected $fillable=['title','content']; //if you want to use mass assignment
    // protected $guarded=['id']; //if you dont want to use mass assignment
    // protected $connection='mysql'; //if you want to use different connection
    // protected $dateFormat='U'; //if you want to use different date format
    // protected $casts=['content'=>'array']; //if you want to use different date format
    // protected $appends=['is_admin']; //if you want to use different date format
    // protected $hidden=['content']; //if you want to use different date format
    // protected $visible=['title']; //if you want to use different date format
    // protected $with=['comments']; //if you want to use different date format
    // protected $withCount=['comments']; //if you want to use different date format
    // protected $perPage=5; //if you want to use different date format
    // protected $touches=['comments']; //if you want to use different date format
    // protected $dates=['created_at']; //if you want to use different date format
    // protected $dateFormat='U'; //if you want to use different date format
    // protected $connection='mysql'; //if you want to use different connection
  
}
