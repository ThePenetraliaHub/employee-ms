<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("employee_id")->unsigned();
            $table->integer("leave_type_id")->unsigned();
            $table->date("start_date");
            $table->date("end_date");
            $table->string("support_doc_url")->nullable();
            $table->string("support_doc_name")->nullable();
            $table->integer("approval_status")->default(0); //0 for pending, 1 for approved and 2 for disapproved
            $table->string("leave_request_content")->nullable();
            $table->string("leave_reply_content")->nullable();

            //User id of the user that responded to the leave request
            $table->integer("leave_reply_by")->nullable();
            
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
        Schema::dropIfExists('leave_requests');
    }
}
