<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Dzonasi;

class CarizonasiController extends Controller
{
    public function index(){
        $kabupaten = Kabupaten::all(); 
        return view('zonasi.home',compact('kabupaten'));
    }

    public function getKabupaten($id)
    {
        $kabupaten = Kabupaten::where('id_prov', $id)->get();
        return response()->json($kabupaten);
    }

    public function getKecamatan($nm_kab)
    {
        $kecamatan = Kecamatan::where('id_kab', $nm_kab)->get();
        return response()->json($kecamatan);
    }

    public function getDesa($nm_kec)
    {
        $desa = Desa::where('id_kec', $nm_kec)->get();
        return response()->json($desa);
    }

    public function getSekolah($nm_kec, $nm_desa)
    {
        try {
            // Ambil data sekolah berdasarkan kecamatan dan desa yang dipilih
            $sekolah = Dzonasi::where('id_kec', $nm_kec)
                              ->where('id_desa', $nm_desa)
                              ->get();
            
            // Mengembalikan data sekolah dalam format JSON
            return response()->json($sekolah);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kirim respons dengan status 500 (Internal Server Error)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getBobot($id)
    {
        // Mengambil data berdasarkan ID
        $data = Dzonasi::find($id); // Ganti YourModel dengan model yang sesuai

        // Mengecek apakah data ditemukan
        if ($data) {
            // Mengembalikan respons dalam format JSON dengan nama
            return response()->json(['id_zonasi' => $data->id_zonasi]);
        } else {
            // Jika data tidak ditemukan, mengembalikan respons kosong dengan kode status 404
            return response()->json([], 404);
        }
    }

    
}
