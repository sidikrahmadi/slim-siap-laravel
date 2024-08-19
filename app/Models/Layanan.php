<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    // Mendefinisikan kolom yang dapat diisi secara massal
    protected $fillable = [
        'uuid_layanan',
        'kode_kantor',
        'kode_layanan',
        'nama_layanan',
        'nama_modul',
        'kode_unit_pic',
        'nama_unit_pic',
        'sla_layanan',
        'sla_satuan',
        'flag_247',
        'jenis_layanan',
        'image',
        'nip_rekam',
        'waktu_rekam',
        'ip_rekam',
        'nip_update',
        'waktu_update',
        'ip_update',
    ];

    // Jika ada kolom yang tidak boleh diisi secara massal, gunakan ini:
    // protected $guarded = [];

    /**
     * image.
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/layanan/' . $image),
        );
    }
}
