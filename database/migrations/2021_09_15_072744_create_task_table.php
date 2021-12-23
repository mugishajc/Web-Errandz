<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('sourceLatitude');
            $table->string('sourceLongitude');
            $table->string('destinationLatitude');
            $table->string('destinationLongitude');
            $table->string('title');
            $table->string('description');
            $table->string('user_id');
            $table->string('single_pointLatitude');
            $table->string('single_pointLongitude');
            $table->string('photo_url1');
            $table->string('photo_url2');
            $table->string('price');
            $table->string('currency');
            $table->string('status_id');
            $table->string('date');
            $table->string('time');
            $table->table('taken_by');
            $table->timestamps();

            // $table->foreign('category_id')->references('id')->on('task_categories')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('status_id')->references('id')->on('task_status')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
