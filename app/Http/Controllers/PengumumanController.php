<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Imports\PengumumanImport;
use App\Models\Pengumuman;
use App\Models\Zonasi;
use App\Models\Sekolah;

use Alert;
use Session;
use File;
use DB;
use Dompdf\Dompdf;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('pengumuman.index',compact('pengumuman'));
    }

    public function pengumuman()
    {
        $zonasi = Zonasi::latest()->paginate(20);
        foreach ($zonasi as $z) {
            $total_pendaftar = DB::table('pengumuman')
                ->where('sekolah_lulus', $z->satpen)
                ->count();
            $z->total_pendaftar = $total_pendaftar;
        }

        
        $lulus = Pengumuman::where('nama_siswa', Auth::user()->name)->get();
        foreach($lulus as $p){
            $tampil = Pengumuman::where('nama_siswa', Auth::user()->name)->firstOrFail();
        }
        return view('pengumuman.pengumuman',compact('lulus','zonasi'));
    }

    public function cari(Request $request)
	{
        $p = $request->p;
        $pengumuman = DB::table('pengumuman')
        ->where('nama_siswa','like',"%".$p."%")
        ->orwhere('bobot','like',"%".$p."%")
        ->paginate(100);
        return view('pengumuman.index', compact('pengumuman'));

    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);

		Excel::import(new PengumumanImport, $request->file('file'));
 
		// notifikasi dengan session
        alert('Berhasil','Berhasil mengupload data pengumuman', 'success');
 
		// alihkan halaman kembali
		return redirect()->back();
 
    }

    public function delete(Request $request) {
        $id = $request->id;
        $pengumuman = Pengumuman::find($id);
          Pengumuman::destroy($id);
          alert('Berhasil','Berhasil Menghapus Pengumuman', 'success');
        return redirect()->back();
    }

    public function changeStatus($PengumumanId)  
    {
        $pengumuman = Pengumuman::find($PengumumanId);

        if($pengumuman){
            if($pengumuman->status){
                $pengumuman->status = 0;
            }
            else{
                $pengumuman->status = 1;
            }
            $pengumuman->save();
        }
        return back();
    }

    public function generatePDF()
    {
        $lulus = Pengumuman::where('nama_siswa', Auth::user()->name)->get(); // Mengambil semua data dari tabel Lulus

        $pdf = new Dompdf();
        $pdf->loadHtml(view('pengumuman.luluspdf', compact('lulus')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream(Auth::user()->name.'.pdf');
        // return $pdf->stream();
    }
}
