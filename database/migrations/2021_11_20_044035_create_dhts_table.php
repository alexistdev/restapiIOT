<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhts', function (Blueprint $table) {
            $table->foreignId('lab_id')
                ->constrained('labs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('token');
            $table->string('suhu_udara');
            $table->string('kelembaban_udara');
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
        Schema::dropIfExists('dhts');
    }
}
