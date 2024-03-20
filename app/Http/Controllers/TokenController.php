<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use Alert;
use Session;
use File;
use DB;
use WordTemplate;

// use App\Imports\SekolahImport;
use App\Models\Token;

class TokenController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'Super Admin' OR Auth::check() && Auth::user()->role == 'Pengembang'){
        $token = Token::orderBY('id', 'DESC')->paginate(20);
        }

        elseif(Auth::check() && Auth::user()->role == 'Sekolah'){
            $token = Auth::user()->token()->paginate(20);
        }

        return view('verifikasi.token',compact('token'));
    }

    public function storeToken(Request $request)
    {
        $this->validate($request, [
			'id_user' 		=> 'required',
			'verifikator'   => 'required',
			'nisn'          =>  ['required', 'unique:token'],
			'nama' 		    => 'required',
			'tanggal' 		=> 'required',
			'sekolah' 		=> 'required',
			'token' 		=> 'required',
			'kabupaten' 	=> 'required',
			'kecamatan' 	=> 'required',
			'desa' 		    => 'required',
		]);

        $rolesdata = [
            'id_user'       => $request->id_user,
            'verifikator'   => $request->verifikator,
            'nisn'          => $request->nisn,
            'nama'          => $request->nama,
            'tanggal'       => $request->tanggal,
            'sekolah'       => $request->sekolah,
            'token'         => $request->token,
            'kabupaten'     => $request->kabupaten,
            'kecamatan'     => $request->kecamatan,
            'desa'          => $request->desa,
        ];

        Token::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        // alert('Berhasil','Berhasil Menambah Verifikasi Berkas', 'success');
        Session::flash('success', 'Data berhasil ditambah!.');
		return redirect()->back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $fverifikator = Token::find($id);
          Token::destroy($id);
        //   Alert::toast('Berhasil menambah Roles', 'success');
        //   alert('Berhasil','Berhasil Menghapus Verifikator', 'success');
        Session::flash('success', 'Data berhasil dihapus!.');
        return redirect()->back();
    }

    public function gettoken($nisn){
        $columns = DB::table('token')->where('nisn',$nisn)->first();
        return response()->json([
           'sekolah' => $columns->sekolah,
           'nama' => $columns->nama,
           'tanggal' => $columns->tanggal,
           'kabupaten' => $columns->kabupaten,
           'kecamatan' => $columns->kecamatan,
           'desa' => $columns->desa,
           'token' => $columns->token,
           'verifikator' => $columns->verifikator
        ]);
    }

    public function cetak($id)
    
    {
    	$cetak = Token::where('id', $id)->firstOrFail();

		$file = public_path('storage/surat/verifikasi.rtf');
        // $file = 'https://suratapp.edigital.cloud/storage/uploadNaskah/'. $cetak->fileSurat;
		// $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
		$array = array(
			'[nama]' 	        => $cetak->nama,
			'[nisn]' 	        => $cetak->nisn,
			'[ceklis]' 	        => $cetak->verifikator,
			'[kabupaten]' 	    => $cetak->kabupaten,
			'[token]' 	        => $cetak->token,
		);

		$nama_file = $cetak->nama.'.doc';
		
		WordTemplate::export($file, $array, $nama_file);
		// Alert::success($cetak->nama, 'Berhasil Diexport');
		return redirect()->back();
    }

}
