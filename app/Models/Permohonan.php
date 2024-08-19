<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    // Mendefinisikan kolom yang dapat diisi secara massal
    protected $fillable = [
        'uuid_permohonan',
        'kode_kantor',
        'kode_tiket',
        'importir',
        'npwp_importir',
        'pib',
        'tgl_pib',
        'lokasi_barang',
        'jenis_kontainer',
        'nip_rekam',
        'waktu_rekam',
        'ip_rekam',
        'nip_update',
        'waktu_update',
        'ip_update',
    ];

    // Jika ada kolom yang tidak boleh diisi secara massal, gunakan ini:
    // protected $guarded = [];

    // /**
    //  * image.
    //  *
    //  * @return Attribute
    //  */
    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($image) => url('/storage/pemohons/' . $image),
    //     );
    // }
}
