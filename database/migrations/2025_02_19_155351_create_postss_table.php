<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostssTable extends Migration
{
    
    public function up()
    {
        Schema::create('postss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('postss');
    }
}
