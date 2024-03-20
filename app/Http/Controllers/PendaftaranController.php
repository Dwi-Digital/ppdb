<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Alert;
use DB;

use App\Models\Pendaftaran;
use App\Models\Dzonasi;
use App\Models\CpdBerkas;
use App\Models\CpdKonfir;
use App\Models\CpdZonasi;
use App\Models\Sekolah;

class PendaftaranController extends Controller
{
    public function index()
    {
       
        return view('pendaftaran.index');
    }

    public function pendaftar()
    {
        if(Auth::check() && Auth::user()->role == 'Super Admin' OR Auth::check() && Auth::user()->role == 'Pengembang'){
        $pendaftar = Pendaftaran::where('status', '1')->paginate(10);
        $cpdberkas = CpdBerkas::all();
    }

    elseif(Auth::check() && Auth::user()->role == 'Sekolah'){
        $pendaftar = Pendaftaran::where('sekolah1', Auth::user()->instansi)->where('lulus','0')->paginate(10);
        $cpdberkas = CpdBerkas::all();
    }
        $user = auth()->user();
        $kuotaa = Sekolah::where('satpen', $user->instansi)->get();
        $jumlahSekolah = Pendaftaran::where('sekolah1',$user->instansi)
                                ->select(\DB::raw("COUNT(*) as jml_sekolah"))
                                ->groupBy('sekolah1')
        ->where(function ($query) {
            $query->where('lulus', '=', DB::raw('sekolah1'));
        })
        ->distinct()
        ->count('lulus');
        return view('pendaftaran.pendaftar',compact('pendaftar','cpdberkas','jumlahSekolah','kuotaa'));
    }

    public function changeStatus($daftarId)  
    {
        $daftar = CpdZonasi::find($daftarId);

        if($daftar){
            if($daftar->status){
                $daftar->status = 0;
            }
            else{
                $daftar->status = 1;
            }
            $daftar->save();
        }
        return back();
    }

    public function updateLulus(Request $request)
    {
        // Validasi inputan
    $request->validate([
        'id_user' => 'required|exists:cpd_zonasi,id_user',
        'lulus' => 'required',
    ]);

    // Ambil inputan dari request
    $id_user = $request->input('id_user');
    $lulus = $request->input('lulus');

    // Temukan dua data dengan id_user yang sama
    $users = CpdZonasi::where('id_user', $id_user)->take(2)->get();

    // Pastikan ada minimal dua data dengan id_user yang sama
    if ($users->count() < 2) {
        return response()->json(['message' => 'Tidak cukup data dengan id_user yang sama'], 404);
    }

    // Ubah status pada kedua data
    foreach ($users as $user) {
        $user->lulus = $lulus;
        $user->save();
    }
    // return response()->json(['message' => 'Data berhasil diubah'], 200);
    alert('Berhasil','Berhasil Membuat Lulus', 'success');
		return redirect()->back();
    }

}
