<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaetAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

    Schema::create('admins', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->string('name'); 
            $table->string('email'); 
            $table->string('password'); 
            $table->rememberToken(); 
            $table->timestamps(); 
        }); 
}
