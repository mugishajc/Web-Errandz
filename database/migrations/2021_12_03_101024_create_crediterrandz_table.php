<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrediterrandzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crediterrandz', function (Blueprint $table) {
                   
$table->id();
$table->unsignedBigInteger('user_id')->nullable();
$table->string('amount');
$table->string('status');
$table->string('description');
$table->string('telephone');
$table->timestamps();

$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crediterrandz');
    }
}
