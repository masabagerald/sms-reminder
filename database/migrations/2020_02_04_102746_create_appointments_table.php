<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('type');
            $table->integer('mother_id');
            $table->integer('sms_flag')->default(0);
            $table->integer('appointment_flag')->nullable();
            $table->text('notes')->nullable();
            $table->date('actual_date')->nullable();


            $table->foreign('mother_id')->references('id')->on('mothers');

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
        Schema::dropIfExists('appointments');
    }
}
