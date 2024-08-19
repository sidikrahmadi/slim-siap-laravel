<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemohons', function (Blueprint $table) {
            $table->bigIncrements('id_pemohon'); // Auto-increment primary key
            $table->uuid('uuid_pemohon')->unique(); // UUID dengan indeks unik
            $table->string('kode_kantor', 7);
            $table->string('kode_tiket', 12);
            $table->string('npwp_perusahaan', 18);
            $table->string('perusahaan', 125);
            $table->string('nik', 18);
            $table->string('nama_pic', 100);
            $table->string('no_telp', 15);
            $table->string('jenis_permohonan', 255);
            $table->string('image')->nullable();
            $table->string('nip_rekam', 18)->nullable();
            $table->timestamp('waktu_rekam')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('ip_rekam', 25)->nullable();
            $table->string('nip_update', 18)->nullable();
            $table->timestamp('waktu_update')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('ip_update', 25)->nullable();

            // Menambahkan kolom timestamps untuk created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohons');
    }
};
