<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;

    // Tentukan nama primary key dan jenisnya
    protected $primaryKey = 'id_pemohon';
    public $incrementing = true; // Menyatakan bahwa primary key adalah auto-increment
    protected $keyType = 'int'; // Tipe data dari primary key, defaultnya adalah 'int'

    /**
     * fillable
     *
     * @var array
     */
    // Mendefinisikan kolom yang dapat diisi secara massal
    protected $fillable = [
        'uuid_pemohon',
        'kode_kantor',
        'kode_tiket',
        'npwp_perusahaan',
        'perusahaan',
        'nik',
        'nama_pic',
        'no_telp',
        'jenis_permohonan',
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

    // /**
    //  * image.
    //  *
    //  * @return Attribute
    //  */
    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($image) => url('/storage/pemohon/' . $image),
    //     );
    // }
}
