<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Alert;
use File;
use DB;
use Illuminate\Support\Carbon;
use App\Imports\SekolahImport;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'Super Admin' OR Auth::check() && Auth::user()->role == 'Pengembang'){
            $sekolah = Sekolah::latest()->paginate(20);
        }
        elseif(Auth::check() && Auth::user()->role == 'Sekolah'){
            $sekolah = Auth::user()->sekolah()->paginate(20);
        }
        return view('sekolah.index', compact('sekolah'));
    }

    public function cari(Request $request)
	{
        $p = $request->p;
        $sekolah = DB::table('sekolah')
        ->where('satpen','like',"%".$p."%")
        ->orwhere('npsn','like',"%".$p."%")
        ->paginate(100);
        return view('sekolah.index', compact('sekolah'));

    }

    public function import_sekolah(Request $request)
    {
        // validasi
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);

		Excel::import(new SekolahImport, $request->file('file'));
 
		// notifikasi dengan session
        // alert('Berhasil','Berhasil mengupload data sekolah dan kuota', 'success');
        Session::flash('success', 'Data berhasil diimport!');
 
		// alihkan halaman kembali
		return redirect()->back();
 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'jenjang' 		=> 'required',
			'npsn'          =>  ['required', 'unique:sekolah'],
			'satpen' 		=> 'required',
			'status' 		=> 'required',
			'akreditasi' 	=> 'required',
			'prestasi' 	    => 'required',
			'pindahOrtu' 	=> 'required',
			'afirmasi' 	    => 'required',
			'zonasi' 	    => 'required',
			'kuota'         => 'required',
		]);

        $rolesdata = [
            'jenjang'       => $request->jenjang,
            'npsn'          => $request->npsn,
            'satpen'        => $request->satpen,
            'status'        => $request->status,
            'akreditasi'    => $request->akreditasi,
            'prestasi'      => $request->prestasi,
            'pindahOrtu'    => $request->pindahOrtu,
            'afirmasi'      => $request->afirmasi,
            'zonasi'        => $request->zonasi,
            'kuota'         => $request->kuota,
            'slug'          => \Str::slug($request->satpen)
        ];

        Sekolah::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        // alert('Berhasil','Berhasil Menambah Sekolah', 'success');
        Session::flash('success', 'Data berhasil disimpan!');
		return redirect()->back();
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'jenjang' 		=> 'required',
			'npsn'          =>  ['required'],
			'satpen' 		=> 'required',
			'status' 		=> 'required',
			'akreditasi' 	=> 'required',
			'prestasi' 	    => 'required',
			'pindahOrtu' 	=> 'required',
			'afirmasi' 	    => 'required',
			'zonasi' 	    => 'required',
			'kuota'         => 'required',
        ]);

        $data = Sekolah::find($id);
        $data->jenjang      = $request->jenjang;
        $data->npsn         = $request->npsn;
        $data->satpen       = $request->satpen;
        $data->status       = $request->status;
        $data->akreditasi   = $request->akreditasi;
        $data->prestasi     = $request->prestasi;
        $data->pindahOrtu   = $request->pindahOrtu;
        $data->afirmasi     = $request->afirmasi;
        $data->zonasi       = $request->zonasi;
        $data->kuota        = $request->kuota;
        $data->slug = \Str::slug($request['satpen']);
        $data->save();

        // alert('Berhasil','Berhasil Mengubah Sekolah', 'success');
        Session::flash('success', 'Data berhasil diubah!');
        return redirect()->back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $sekolah = Sekolah::find($id);
          sekolah::destroy($id);
        //   alert('Berhasil','Berhasil Menghapus Sekolah', 'success');
        Session::flash('success', 'Data berhasil dihapus!');
        return redirect()->back();
    }

    public function deleteSelected(Request $request)
    {
        // Validasi input
        $request->validate([
            'selectedItems' => 'required|array',
        ]);

        // Hapus data yang dipilih dari basis data
        Sekolah::destroy($request->input('selectedItems'));

        // Redirect atau kembali ke halaman yang sesuai
        // alert('Berhasil','Berhasil Menghapus Sekolah yang dipilih', 'success');

        // Set pesan dalam sesi
        Session::flash('success', 'Data berhasil dihapus.');

        // Redirect dengan pesan sukses
        return redirect()->back();

       
    }

    public function getsekolah(Request $request)
    {
        $search = $request->search;

      if($search == ''){
         $nm = Sekolah::orderby('satpen','asc')->select('id','satpen')->get();
      }else{
         $nm = Sekolah::orderby('satpen','asc')->select('id','satpen')->where('satpen', 'like', '%' .$search . '%')->get();
      }

      $response = array();
      foreach($nm as $jn){
         $response[] = array(
              "id"=>$jn->satpen,
              "text"=>$jn->satpen
         );
      }
      return response()->json($response);
    }
}
