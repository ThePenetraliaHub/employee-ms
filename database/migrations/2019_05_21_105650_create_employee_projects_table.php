<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_project', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("project_id")->unsigned()->nullable();
            $table->integer("employee_id")->unsigned();
            $table->string("details");
            $table->string("document_url")->nullable();
            $table->string("document_name")->nullable();
            $table->string("status");
            $table->text("employee_remark")->nullable();
            $table->text("supervisor_remark")->nullable();
            $table->date("start_date");
            $table->date("end_date");
            $table->timestamps();

            $table->foreign('project_id')
              ->references('id')->on('projects')
              ->onDelete('cascade')
              ->onUpdate('cascade');

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
        Schema::dropIfExists('employee_project');
    }
}
