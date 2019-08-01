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
            $table->integer("leave_policies_id")->unsigned();
            $table->text("leave_content");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("support_doc_url")->nullable();
            $table->string("support_doc_name")->nullable();
            $table->integer("leave_status")->default(0);
            //$table->integer("leave_count")->default(0);
            $table->text("leave_remark")->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

//            $table->foreign('leave_policies_id')
//                ->references('id')->on('leave_policies')
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
