<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTelefonoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creo el campo phone_number
        Schema::table('users', function ($table) {
        $table->smallInteger('phone_number');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimino el campo phone_number
        Schema::table('users', function ($table) {
        $table->dropColumn('phone_number');
    });
    }
}
