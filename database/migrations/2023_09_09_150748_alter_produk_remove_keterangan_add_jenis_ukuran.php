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
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->dropColumn('keterangan');
            $table->string('jenis')->nullable()->after('nama_produk');
            $table->string('ukuran')->nullable()->after('jenis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->string('keterangan')->nullable()->after('nama_produk');
            $table->dropColumn('jenis');
            $table->dropColumn('ukuran');
        });
    }
};
