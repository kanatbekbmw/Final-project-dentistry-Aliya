<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTeethsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teeths', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'teeths_user_idx');
            $table->foreign('user_id', 'teeths_user_fk')->on('users')->references('id');
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
            $table->dropForeign('teeths_user_fk');
            $table->dropIndex('teehts_user_idx');
            $table->dropColumn('user_id');
        });
    }
}
