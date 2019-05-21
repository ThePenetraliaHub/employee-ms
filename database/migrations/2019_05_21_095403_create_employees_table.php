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
            $table->integer("supervisor_id");
            $table->string("NIN");
            $table->string("employee_number");
            $table->string("firstname");
            $table->string("middlename");
            $table->string("lastname");
            $table->date("date_of_birth");
            $table->string("gender");
            $table->string("marital_status");
            $table->date("joined_date");
            $table->string("addressline1");
            $table->string("addressline2");
            $table->string("zip_code");
            $table->string("home_phone");
            $table->string("office_phone");
            $table->string("private_email");
            $table->string("office_email");
            $table->string("job_title");
            $table->string("employee_status");

            $table->foreign('supervisor_id')
              ->references('id')->on('employees')
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