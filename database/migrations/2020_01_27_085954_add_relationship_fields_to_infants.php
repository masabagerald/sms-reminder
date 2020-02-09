<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInfants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infants', function (Blueprint $table) {

            $table->unsignedInteger('mother_id');

            $table->foreign('mother_id', 'mother_fk_919322')->references('id')->on('mothers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infants', function (Blueprint $table) {
            //
        });
    }
}
