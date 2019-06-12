<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("supervisor_id")->unsigned()->nullable();
            $table->integer("department_id")->unsigned();
            $table->integer("pay_grade_id")->unsigned();
            $table->integer("employee_status_id")->unsigned();
            $table->integer("job_title_id")->unsigned();

            $table->string("NIN");
            $table->string("employee_number");
            $table->string("name");
            // $table->string("firstname");
            // $table->string("middlename")->nullable();
            // $table->string("lastname");
            $table->date("date_of_birth");
            $table->string("gender");
            $table->string("marital_status");
            $table->date("joined_date");
            $table->string("addressline1");
            $table->string("addressline2")->nullable();
            $table->string("zip_code")->nullable();
            $table->string("home_phone");
            $table->string("office_phone")->nullable();
            $table->string("private_email");
            $table->string("office_email")->nullable();


            $table->foreign('supervisor_id')
              ->references('id')->on('employees')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            $table->foreign('department_id')
              ->references('id')->on('departments')
              ->onDelete('cascade')
              ->onUpdate('cascade');

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
        Schema::dropIfExists('employees');
    }
}
