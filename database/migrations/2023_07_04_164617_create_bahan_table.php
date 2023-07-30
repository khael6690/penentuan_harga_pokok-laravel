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
        Schema::create('tb_bahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->string('jenis_bahan');
            $table->integer('harga_satuan');
            $table->integer('satuan_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bahan');
    }
};
