<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soils', function (Blueprint $table) {
            $table->foreignId('lab_id')
                ->constrained('labs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('token');
            $table->string('ph_tanah');
            $table->string('kelembaban_tanah');
            $table->tinyInteger('mode');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('soils');
    }
}
