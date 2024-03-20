<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dzonasi;
use App\Models\Kabupaten;
use App\Models\Jalur;
use App\Models\Sekolah;
use App\Models\CpdZonasi;

use DB;

class LandingController extends Controller
{
    public function cari(Request $request)
	{
        $query = $request->q;
        $selectedKecamatan = $request->kecamatan;
    
        $zonasi = DB::table('dzonasi')
            ->join('sekolah', 'dzonasi.id_zonasi', '=', 'sekolah.satpen')
            ->join('desa', 'dzonasi.id_desa', '=', 'desa.nm_desa')
            ->join('kecamatan', 'dzonasi.id_kec', '=', 'kecamatan.nm_kec')
            ->select('dzonasi.*', 'sekolah.satpen', 'sekolah.kuota', 'desa.nm_desa', 'kecamatan.nm_kec')
            ->where('desa.nm_desa', '=', $query)
            ->where('kecamatan.nm_kec', '=', $selectedKecamatan)
            ->distinct() // Hindari duplikat data
            ->get();
    
        // Proses data untuk menghindari duplikat
       
        // Ubah struktur array menjadi indeks numerik untuk respons JSON
        // $result = array_values($processedZonasi);
    
        // return response()->json(['zonasi' => $result]);
    

// Sekarang $zonasi berisi satu baris data yang memenuhi kriteria


         // Mengambil data total pendaftar setiap sekolah
        foreach ($zonasi as $z) {
            $total_pendaftar = DB::table('pengumuman')
                ->where('sekolah_lulus', $z->id_zonasi)
                ->count();
            $z->total_pendaftar = $total_pendaftar;
        }

        

        $kabupaten = Kabupaten::all();
        $jalur = Jalur::where('status','1')->get();
        // return view('welcome', compact('zonasi','kabupaten','jalur'));
        return response()->json([
            'zonasi' => $zonasi, compact('kabupaten','jalur')
        ]);

    }

    public function pengaduanWilayah()
    {
        return view('pengaduan.wilayah');
    }
}
