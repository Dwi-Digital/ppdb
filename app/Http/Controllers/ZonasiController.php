<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Session;
use File;
use DB;

use App\Imports\ZonasiImport;
use App\Imports\DzonasiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use App\Models\Zonasi;
use App\Models\Dzonasi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;

class ZonasiController extends Controller
{
    public function index()
    {
        $kabupaten = Kabupaten::all();
        $zonasi = Zonasi::withCount('zon')->get();
        return view('zonasi.index', compact('zonasi','kabupaten'));
    }

    public function import_zonasi(Request $request)
    {
        // validasi
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);

		Excel::import(new ZonasiImport, $request->file('file'));
 
		// notifikasi dengan session
        alert('Berhasil','Berhasil mengupload data sekolah zonasi', 'success');
 
		// alihkan halaman kembali
		return redirect()->back();
 
    }

    public function import_dzonasi(Request $request)
    {
        // validasi
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);

		Excel::import(new DzonasiImport, $request->file('file'));
 
		// notifikasi dengan session
        alert('Berhasil','Berhasil mengupload data desa zonasi', 'success');
 
		// alihkan halaman kembali
		return redirect()->back();
 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'kab' 		    => 'required',
			'satpen' 		=> 'required',
		]);

        $rolesdata = [
            'kab'           => $request->kab,
            'satpen'        => $request->satpen,
            'slug'          => \Str::slug($request->satpen)
        ];

        Zonasi::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Menambah Sekolah Zonasi', 'success');
		return redirect()->back();
    }

    public function store_dzonasi(Request $request)
    {
        $this->validate($request, [
            'id_zonasi' 		=> 'required',
			'id_desa' 		        => 'required',
			'id_kec' 		        => 'required',
			'bobot' 		        => 'required',
		]);

        $rolesdata = [
            'id_zonasi'      => $request->id_zonasi,
            'id_desa'      => $request->id_desa,
            'id_kec'      => $request->id_kec,
            'bobot'      => $request->bobot,
            // 'slug'      => \Str::slug($request->desa)
        ];

        Dzonasi::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Menambah Desa Zonasi', 'success');
		return redirect()->back();
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_zonasi' 		=> 'required',
            'id_desa' 		=> 'required',
        ]);

        $data = Dzonasi::find($id);
        $data->id_zonasi = $request->id_zonasi;
        $data->id_desa = $request->id_desa;
        // $data->slug = \Str::slug($request['desa']);
        $data->save();

        alert('Berhasil','Berhasil Mengubah Desa Zonasi', 'success');
        return redirect()->back();
    }

    public function show_zonasi($slug)
    {
        //get post by slug
        // $kategorinav = Kategori::latest()->paginate(9);
        // $Artikelseris = Artikel::all();
        $tampil = Zonasi::where('slug', $slug)->withCount('zon')->firstOrFail();
        $dzonasi = Dzonasi::where('id_zonasi', $tampil->satpen)->get();
        // $artikel = Artikel::latest()->paginate(4);

        $kabupaten = Kabupaten::all();
        return view('zonasi.indexzonasi', compact('dzonasi','tampil','kabupaten'));
    }

    public function delete(Request $request) {
        $id = $request->id;
        $zonasi = Zonasi::find($id);
          Zonasi::destroy($id);
          alert('Berhasil','Berhasil Menghapus Sekolah Zonasi', 'success');
        return redirect()->back();
    }

    public function delete_dzonasi(Request $request) {
        $id = $request->id;
        $dzonasi = Dzonasi::find($id);
          Dzonasi::destroy($id);
          alert('Berhasil','Berhasil Menghapus Desa Zonasi', 'success');
        return redirect()->back();
    }

    public function getbobot($nisn){
        $columns = DB::table('dzonasi')->where('id_zonasi',$nisn)->first();
        return response()->json([
           'bobot' => $columns->bobot
        //    'id' => $columns->id,
        ]);
    }

   
}
