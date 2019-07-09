<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("employee_id")->unsigned();
            $table->string("certification");
            $table->string("institution");
            $table->date("granted_on");
            $table->date("valid_on");
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
        Schema::dropIfExists('certifications');
    }
}
