<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_periksa', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_periksa')->unsigned();
            $table->integer('id_obat')->unsigned();

            $table->foreign('id_periksa')->references('id')->on('periksa');
            $table->foreign('id_obat')->references('id')->on('obat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_periksa');
    }
};
