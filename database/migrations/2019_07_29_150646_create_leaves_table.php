<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("employee_id")->unsigned();
            $table->integer("leave_setup_id")->unsigned();
            $table->text("leave_content");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("support_doc_name")->nullable();
            $table->string("support_doc_rename")->nullable();
            $table->string("leave_status")->default('0');
            $table->text("leave_remark");
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

//            $table->foreign('leave_setup_id')
//                ->references('id')->on('leave_setups')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
