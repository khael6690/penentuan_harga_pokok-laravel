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
        Schema::create('tb_biaya_tk_langsung', function (Blueprint $table) {
            $table->id();
            $table->integer('produksi_id');
            $table->integer('tenaga_kerja_id');
            $table->string('bagian');
            $table->integer('jam')->comment('waktu bekerja(jam)');
            $table->integer('total_tarif');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_biaya_tk_langsung');
    }
};
