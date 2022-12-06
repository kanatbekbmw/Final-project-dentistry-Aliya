<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_patients', function (Blueprint $table) {
            $table->id();
            $table->string('diagnosis');
            $table->text('complaints');
            $table->text('transferred_and_concomitant_diseases');
            $table->text('the_development_of_a_real_disease');
            $table->text('external_inspection');
            $table->string('bite');
            $table->text('condition_of_the_oral_mucosa');
            $table->text('x_ray_data');
            $table->text('treatment');         
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
        Schema::dropIfExists('examination_patients');
    }
}
