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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->bigIncrements('id_permohonan'); // Auto-increment primary key
            $table->uuid('uuid_permohonan')->unique();
            $table->string('kode_kantor', 7);
            $table->string('kode_tiket', 12);

            $table->string('importir', 125);
            $table->string('npwp_importir', 18);
            $table->string('pib', 6);
            $table->date('tgl_pib'); // Menyimpan tanggal tanpa waktu
            $table->string('lokasi_barang', 125);
            $table->string('jenis_kontainer', 15);

            $table->string('nip_rekam', 18);
            $table->timestamp('waktu_rekam')->useCurrent(); // Menggunakan default timestamp
            $table->string('ip_rekam', 25);
            $table->string('nip_update', 18);
            $table->timestamp('waktu_update')->useCurrent(); // Menggunakan default timestamp
            $table->string('ip_update', 25);

            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
