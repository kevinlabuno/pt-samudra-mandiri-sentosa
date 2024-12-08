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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ikan');
            $table->string('nama_ikan');
            $table->string('ukuran_ikan');
            $table->string('net_weight');
            $table->string('drain_weight');
            $table->string('flakes');
            $table->string('recovery');
            $table->string('keadaan_ikan');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
