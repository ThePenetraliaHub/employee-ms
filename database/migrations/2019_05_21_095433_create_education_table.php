<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("employee_id")->unsigned();;
            $table->string("qualification");
            $table->string("institution");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("document_url")->nullable();
            $table->string("document_name")->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
              ->references('id')->on('employees')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
