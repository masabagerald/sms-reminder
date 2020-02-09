<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mothers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->integer('age');

            $table->string('marital_status');

            $table->string('village');

            $table->string('parish')->nullable();

            $table->string('subcounty')->nullable();

            $table->string('phone');

            $table->string('anc_no')->unique();

            $table->string('hiv_status')->nullable();

            $table->string('newly_tested')->nullable();

            $table->string('newly_art')->nullable();

            $table->date('edd');

            $table->longText('notes')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mothers');
    }
}
