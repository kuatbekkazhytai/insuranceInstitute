<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('iin');
            $table->string('name');
            $table->integer('record_id')->unsigned()->nullable();
            $table->foreign('record_id')->references('id')->on('records');
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
        Schema::dropIfExists('additional_drivers');
    }
}
