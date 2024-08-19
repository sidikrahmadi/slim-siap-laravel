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
        Schema::create('layanans', function (Blueprint $table) {
            $table->bigIncrements('id_layanan'); // Auto-increment primary key
            $table->uuid('uuid_layanan')->unique(); // UUID dengan indeks unik
            $table->string('kode_kantor', 7);
            $table->string('kode_layanan', 7);
            $table->string('nama_layanan', 100);
            $table->string('nama_modul', 100);
            $table->string('kode_unit_pic', 10);
            $table->string('nama_unit_pic', 100);
            $table->bigInteger('sla_layanan');
            $table->string('sla_satuan', 20);
            $table->string('flag_247', 1);
            $table->string('jenis_layanan', 15);
            $table->string('image')->nullable(); // Kolom untuk menyimpan path gambar
            $table->string('nip_rekam', 18);
            $table->timestamp('waktu_rekam')->useCurrent(); // Timestamp dengan default CURRENT_TIMESTAMP
            $table->string('ip_rekam', 25);
            $table->string('nip_update', 18);
            $table->timestamp('waktu_update')->useCurrent(); // Timestamp dengan default CURRENT_TIMESTAMP
            $table->string('ip_update', 25);

            // Menambahkan kolom timestamps untuk created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
