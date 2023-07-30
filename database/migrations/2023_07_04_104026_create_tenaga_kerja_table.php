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
        Schema::create('tb_tenaga_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tenaga_kerja');
            $table->string('jenis_tenaga_kerja');
            $table->integer('upah')->nullable()->comment('Upah atau Gaji');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tenaga_kerja');
    }
};
