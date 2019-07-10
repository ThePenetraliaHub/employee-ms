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
            $table->integer("message_id")->unsigned();

            $table->string("content")->nullable();
            $table->string("subject")->nullable();

            //Stores if the message is a draft or sent message; 1 if it is draft and 0 if it is sent
            $table->integer("is_draft")->unsigned();

            //Type stores if the message is a broadcast or not
            $table->string("type");

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
