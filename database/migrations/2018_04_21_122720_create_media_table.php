<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('user_id');
            
            $table->string('file');
            
            $table->timestamps();
            
        });
        
        Schema::create('event_media', function (Blueprint $table) {
            
            $table->integer('event_id');
            
            $table->integer('media_id');
            
            $table->primary(['event_id', 'media_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
        Schema::dropIfExists('event_media');
    }
}
