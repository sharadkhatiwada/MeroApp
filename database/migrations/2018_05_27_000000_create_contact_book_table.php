<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contact_book', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('fullname');
            $table->string('address');
            $table->string('mobile');
            $table->string('email');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_book');
    }
}
