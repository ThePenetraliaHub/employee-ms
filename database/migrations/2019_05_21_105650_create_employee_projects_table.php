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
        Schema::create('employee_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("project_id");
            $table->integer("employee_id");
            $table->integer("supervisor_id");
            $table->timestamps();

            $table->foreign('project_id')
              ->references('id')->on('peojects')
              ->onDelete('cascade')
              ->onUpdate('cascade');

              $table->foreign('employee_id')
              ->references('id')->on('employees')
              ->onDelete('cascade')
              ->onUpdate('cascade');

              $table->foreign('supervisor_id')
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
        Schema::dropIfExists('employee_projects');
    }
}
