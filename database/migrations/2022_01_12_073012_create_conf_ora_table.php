<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfOraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conf_ora', function (Blueprint $table) {
            $table->foreignId('id-g')->constrained('giorno_conferimento','id');
            $table->string('conferiemento');
            $table->time('oraInizio');
            $table->time('oraFine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conf_ora');
    }
}
