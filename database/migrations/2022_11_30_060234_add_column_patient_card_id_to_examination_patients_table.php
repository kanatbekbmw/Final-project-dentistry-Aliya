<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPatientCardIdToExaminationPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examination_patients', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_card_id')->nullable();
            $table->index('patient_card_id', 'examination_patiend_idx');
            $table->foreign('patient_card_id', 'examination_patient_fk')->on('patient_cards')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examination_patients', function (Blueprint $table) {
            $table->dropForeign('examination_patient_fk');
            $table->dropIndex('examination_patient_idx');
            $table->dropColumn('patient_card_id');
        });
    }
}
