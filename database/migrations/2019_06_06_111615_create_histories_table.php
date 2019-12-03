<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reciever_id')->unsigned()->index();
            $table->foreign('reciever_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('sender_id')->unsigned()->index();
            $table->foreign('sender_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('collector_id')->unsigned()->index();
            $table->foreign('collector_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('unit_from_id')->unsigned()->index();
            $table->foreign('unit_from_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('unit_to_id')->unsigned()->index();
            $table->foreign('unit_to_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('file_id')->unsigned()->index();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('status', ['borrowed', 'returned']);
            $table->dateTime('issue_date');
            $table->dateTime('returned_date');
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
        Schema::dropIfExists('histories');
    }
}
