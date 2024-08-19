<?php

namespace App\Http\Controllers\Api;

use App\Models\Pemohon;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemohonResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class PemohonController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $pemohon = Pemohon::latest()->paginate(5);

        //return collection of posts as a resource
        return new PemohonResource(true, 'List Data Pemohon!', $pemohon);
    }

    /**
     * Get pemohon by UUID
     *
     * @param  string $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPemohonByUuid($uuidPemohon)
    {
        // Cari pemohon berdasarkan UUID
        $pemohon = Pemohon::where('uuid_pemohon', $uuidPemohon)->first();

        // Jika data tidak ditemukan
        if (!$pemohon) {
            return response()->json([
                'success' => false,
                'message' => 'Pemohon tidak ditemukan',
            ], 404);
        }

        // Jika data ditemukan
        return new PemohonResource(true, 'Data Pemohon Ditemukan!', $pemohon);
    }



    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        // Definisikan aturan validasi
        $validator = Validator::make($request->all(), [
            'uuidPemohon'     => 'nullable|uuid', // optional for updating
            // 'kode_kantor'      => 'required|string|max:7',
            // 'kode_tiket'       => 'required|string|max:12',
            'npwpPerusahaan'  => 'required|string|max:18',
            'perusahaan'      => 'required|string|max:125',
            'nik'             => 'required|string|max:18',
            'namaPic'         => 'required|string|max:100',
            'noTelp'          => 'required|string|max:15',
            'jenisPermohonan' => 'required|string|max:255',
            // 'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Check if UUID exists for update
        $pemohon = Pemohon::where('uuid_pemohon', $request->uuidPemohon)->first();

        // // Upload gambar jika ada
        //  if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $image->storeAs('public/pemohon', $image->hashName());
        //     $imagePath = $image->hashName();
        // } else {
        //     $imagePath = null; // Jika tidak ada gambar, set ke null
        // }

        // Membuat data pemohon
        if ($pemohon) {
            $pemohon->update([
                'uuid_pemohon'      => $request->uuidPemohon,
                'kode_kantor'       => '040300',
                'kode_tiket'        => 'ABCD12345678',
                'npwp_perusahaan'   => $request->npwpPerusahaan,
                'perusahaan'        => $request->perusahaan,
                'nik'               => $request->nik,
                'nama_pic'          => $request->namaPic,
                'no_telp'           => $request->noTelp,
                'jenis_permohonan'  => $request->jenisPermohonan,
                // 'image'             => $imagePath,
                'nip_rekam'         => '123123123123123123',
                'ip_rekam'          => $request->ip(), // Ambil IP dari request
                'nip_update'        => '123123123123123123',
                'ip_update'         => $request->ip(), // Ambil IP dari request
            ]);
            $message = 'Data Pemohon Berhasil Diperbarui!';
        } else {
            // Create new pemohon
            $pemohon = Pemohon::create([
                'uuid_pemohon'     => Str::uuid(),
                'kode_kantor'      => '040300',
                'kode_tiket'       => 'ABCD12345678',
                'npwp_perusahaan'  => $request->npwpPerusahaan,
                'perusahaan'       => $request->perusahaan,
                'nik'              => $request->nik,
                'nama_pic'         => $request->namaPic,
                'no_telp'          => $request->noTelp,
                'jenis_permohonan' => $request->jenisPermohonan,
                // 'image'            => $imagePath,
                'nip_rekam'        => '123123123123123123',
                'ip_rekam'         => $request->ip(), // Get IP from request
                'nip_update'       => '123123123123123123',
                'ip_update'        => $request->ip(), // Get IP from request
            ]);
            $message = 'Data Pemohon Berhasil Ditambahkan!';
        }

        //return response
        return new PemohonResource(true, $message, $pemohon);
    }
}
