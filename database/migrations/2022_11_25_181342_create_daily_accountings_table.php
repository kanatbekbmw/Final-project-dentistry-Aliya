<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyAccountingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_accountings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date_format('date_of_birth');
            $table->string('address');
            $table->string('diagnosis');
            $table->text('completed_work');
            $table->string('sanitized');
            $table->string('including_sanitized_as_planned');
            $table->string('conventional_units_of_labor_intensity');
            $table->integer('price');
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
        Schema::dropIfExists('daily_accountings');
    }
}
