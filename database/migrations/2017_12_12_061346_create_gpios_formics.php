<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpiosFormics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpios_formics', function (Blueprint $table) {
            $table->integer('gpio_id')->unsigned();
            $table->integer('formic_id')->unsigned();

            $table->foreign('gpio_id')->references('id')->on('gpios')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('formic_id')->references('id')->on('formics')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['gpio_id', 'formic_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpios_formics');
    }
}
