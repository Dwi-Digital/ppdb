<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

use Alert;
use Session;
use File;
use DB;

use App\Imports\DataImport;

use App\Models\Data;
use App\Models\Kabupaten;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Data::latest()->paginate(10);
        $kabupaten = Kabupaten::all();
        return view('data.apis', compact('data','kabupaten'));
    }

    /**
     * Show the form for import a new resource.
     */
    public function import_data(Request $request)
    {
        // validasi
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);

		Excel::import(new DataImport, $request->file('file'));
 
		// notifikasi dengan session
        alert('Berhasil','Berhasil mengupload Data Awal', 'success');
 
		// alihkan halaman kembali
		return redirect()->back();
 
    }

    public function update_data($id, Request $request)
    {
        $this->validate($request,[
            'nik' 		=> 'required',
			'nisn'   => 'required',
			'nama'   => 'required',
			'tmp_lahir'   => 'required',
			'tgl_lahir'   => 'required',
			'kelamin'   => 'required',
			'kab_kota'   => 'required',
			'kec'   => 'required',
			'desa'   => 'required',
			'dusun'   => 'required',
        ]);

        $data = data::find($id);
        $data->nik = $request->nik;
        $data->nisn = $request->nisn;
        $data->nama = $request->nama;
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->kelamin = $request->kelamin;
        $data->kab_kota = $request->kab_kota;
        $data->kec = $request->kec;
        $data->desa = $request->desa;
        $data->dusun = $request->dusun;
        // $data->slug = \Str::slug($request['satpen']);
        $data->save();

        alert('Berhasil','Berhasil Mengubah data awal', 'success');
        return redirect()->back();
    }
    
    public function getnama($nisn){
        $columns = DB::table('basedata')->where('nisn',$nisn)->first();
        return response()->json([
           'sekolah' => $columns->sekolah,
           'nama' => $columns->nama,
           'tanggal' => $columns->tgl_lahir,
           'kab_kota' => $columns->kab_kota,
           'kec' => $columns->kec,
           'ds' => $columns->desa,
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $data = Data::find($id);
          Data::destroy($id);
          alert('Berhasil','Berhasil Menghapus Data Awal', 'success');
        return redirect()->back();
    }

}
