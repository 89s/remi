<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function ($table) {
            $table->increments('id');
            $table->integer('household_id')->unsigned();
            $table->foreign('household_id')->references('id')->on('households')->onDelete('cascade');
            $table->string('name', 64)->unique();
            $table->string('description', 128)->nullable();
            $table->timestamp('until');
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
        Schema::drop('tasks');
    }

}
