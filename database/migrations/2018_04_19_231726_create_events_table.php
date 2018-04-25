<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('user_id');
            
            $table->string('title');
            
            $table->text('category');
            
            $table->text('description');
            
            $table->string('venue');
            
            $table->string('linked_event')->nullable();
            
            $table->boolean('featured');
            
            $table->integer('thumbnail_id');
            
            $table->dateTime('commencing');
            
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
        Schema::dropIfExists('events');
    }
}
