<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsadminColumnToPost extends Migration
{
    
    public function up()
    {
        Schema::table('postss', function (Blueprint $table) {
            $table->tinyInteger('is_admin')->default(0);
        });
    }

    
    public function down()
    {
        Schema::table('postss', function (Blueprint $table) {
            $table->tinyInteger('is_admin')->default(0);
        });
    }
}
