<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExaminationIdToTeethsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teeths', function (Blueprint $table) {
            $table->unsignedBigInteger('examination_id')->nullable();
            $table->index('examination_id', 'teeths_examination_idx');
            $table->foreign('examination_id', 'teeths_examination_fk')->on('examination_patients')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teeths', function (Blueprint $table) {
            $table->dropForeign('teeths_examination_fk');
            $table->dropIndex('teehts_examination_idx');
            $table->dropColumn('examination_id');
        });
    }
}
