<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer("user_id")->unsigned();
            $table->integer("message_id")->unsigned()->nullable();

            $table->longText("content")->nullable();
            $table->string("subject")->nullable();

            //Save if message is deleted, trashed, or active. 2,1 and 0 respectively
            $table->integer('status')->default(0);

            $table->timestamps();

            // $table->foreign('user_id')
            //   ->references('id')->on('users')
            //   ->onDelete('cascade')
            //   ->onUpdate('cascade');

            // $table->foreign('message_id')
            //   ->references('id')->on('messages')
            //   ->onDelete('cascade')
            //   ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
