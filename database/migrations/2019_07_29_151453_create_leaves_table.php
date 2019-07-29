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
            $table->integer("user_id");
            $table->integer("leave_setup_type_id");
            $table->text("leave_content");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("support_doc_name")->nullable();
            $table->string("support_doc_rename")->nullable();
            $table->string("leave_status")->default('0');
            $table->text("leave_remark");
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
        Schema::dropIfExists('leaves');
    }
}
