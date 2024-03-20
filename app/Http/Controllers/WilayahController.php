<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

use Alert;
use Session;
use File;

use App\Imports\KecamatanImport;
use App\Imports\DesaImport;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;

class WilayahController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::withCount('prov')->paginate(10);
        return view('wilayah.index', compact('provinsi'));
    }

    public function show_kab($slug)
    {
        //get post by slug
        // $kategorinav = Kategori::latest()->paginate(9);
        // $Artikelseris = Artikel::all();
        $tampil = Provinsi::where('slug', $slug)->withCount('prov')->firstOrFail();
        $kabupaten = Kabupaten::where('id_prov', $tampil->id)->withCount('kab')->paginate(20);
        // $artikel = Artikel::latest()->paginate(4);

        // $kabupaten = Kabupaten::withCount('kab')->paginate(10);
        return view('wilayah.indexkab', compact('kabupaten','tampil'));
    }

    public function show_kec($slug)
    {
        //get post by slug
        // $kategorinav = Kategori::latest()->paginate(9);
        // $Artikelseris = Artikel::all();
        $tampil = Kabupaten::where('slug', $slug)->withCount('kab')->firstOrFail();
        $kecamatan = Kecamatan::where('id_kab', $tampil->nm_kab)->withCount('kec')->get();
        // $artikel = Artikel::latest()->paginate(4);

        // $kecamatan = Kecamatan::withCount('kec')->where('')->paginate(10);
        return view('wilayah.indexkec', compact('kecamatan','tampil'));
    }

    public function show_desa($slug)
    {
        //get post by slug
        // $kategorinav = Kategori::latest()->paginate(9);
        // $Artikelseris = Artikel::all();
        $tampil = Kecamatan::where('slug', $slug)->withCount('kec')->firstOrFail();
        $desa = Desa::where('id_kec', $tampil->nm_kec)->get();
        // $artikel = Artikel::latest()->paginate(4);

        // $kecamatan = Kecamatan::withCount('kec')->where('')->paginate(10);
        return view('wilayah.indexdesa', compact('desa','tampil'));
    }

    // menambah provinsi
    public function store_prov(Request $request)
    {
        $this->validate($request, [
			'kode' 		=> ['required', 'unique:provinsi'],
			'nm_prov'   => 'required',
		]);

        $rolesdata = [
            'kode'      => $request->kode,
            'nm_prov'   => $request->nm_prov,
            'slug'      => \Str::slug($request->nm_prov)
        ];

        Provinsi::create($rolesdata);
        // Alert::success('Berhasil', 'Berhasil menambah Provinsi');
        Session::flash('success', 'Data berhasil disimpan!');
        // alert('Berhasil','Berhasil Menambah Provinsi', 'success');
		return redirect()->back();
    }

    

    // menambah kabupaten
    public function store_kab(Request $request)
    {
        $this->validate($request, [
			'id_prov' 		=> 'required',
			'kode' 		=> ['required', 'unique:kabupaten'],
			'nm_kab'   => 'required',
		]);

        $rolesdata = [
            'id_prov'      => $request->id_prov,
            'kode'      => $request->kode,
            'nm_kab'   => $request->nm_kab,
            'slug'      => \Str::slug($request->nm_kab)
        ];

        Kabupaten::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        // alert('Berhasil','Berhasil Menambah Kabuapaten', 'success');
        Session::flash('success', 'Data berhasil disimpan!');
		return redirect()->back();
    }

    // menambah kecamatan
    public function store_kec(Request $request)
    {
        $this->validate($request, [
			'id_kab' 		=> 'required',
			'kode' 		=> ['required', 'unique:kecamatan'],
			'nm_kec'   => 'required',
		]);

        $rolesdata = [
            'id_kab'      => $request->id_kab,
            'kode'      => $request->kode,
            'nm_kec'   => $request->nm_kec,
            'slug'      => \Str::slug($request->nm_kec)
        ];

        Kecamatan::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        // alert('Berhasil','Berhasil Menambah Kecamatan', 'success');
        Session::flash('success', 'Data berhasil disimpan!');
		return redirect()->back();
    }

    public function import_kecamatan(Request $request)
    {
        // validasi
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);

		Excel::import(new KecamatanImport, $request->file('file'));
 
		// notifikasi dengan session
        // alert('Berhasil','Berhasil mengupload Kecamatan', 'success');
        Session::flash('success', 'Data berhasil diimport!');
		// alihkan halaman kembali
		return redirect()->back();
 
    }

    // menambah Desa
    public function store_desa(Request $request)
    {
        $this->validate($request, [
            'id_kec' 		=> 'required',
			'kode' 		=> ['required', 'unique:desa'],
			'nm_desa'   => 'required',
		]);

        $rolesdata = [
            'id_kec'      => $request->id_kec,
            'kode'      => $request->kode,
            'nm_desa'   => $request->nm_desa,
            'slug'      => \Str::slug($request->nm_desa)
        ];

        Desa::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success'); toastr
        // alert('Berhasil','Berhasil Menambah Desa', 'success');
        Session::flash('success', 'Data berhasil disimpan!');
		return redirect()->back();
    }

    public function import_desa(Request $request)
    {
        // validasi
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);

		Excel::import(new DesaImport, $request->file('file'));
 
		// notifikasi dengan session
        // alert('Berhasil','Berhasil mengupload Desa', 'success');
        Session::flash('success', 'Data berhasil diimport!');
 
		// alihkan halaman kembali
		return redirect()->back();
 
    }

    // update
    public function update_prov($id, Request $request)
    {
        $this->validate($request,[
            'kode' 		=> 'required',
			'nm_prov'   => 'required',
        ]);

        $data = Provinsi::find($id);
        $data->kode = $request->kode;
        $data->nm_prov = $request->nm_prov;
        $data->slug = \Str::slug($request['nm_prov']);
        $data->save();

        // alert('Berhasil','Berhasil Mengubah Provinsi', 'success');
        Session::flash('success', 'Data berhasil diubah!');
        return redirect()->back();
    }

    public function update_kab($id, Request $request)
    {
        $this->validate($request,[
            'id_prov' 		=> 'required',
            'kode' 		=> 'required',
			'nm_kab'   => 'required',
        ]);

        $data = Kabupaten::find($id);
        $data->id_prov = $request->id_prov;
        $data->kode = $request->kode;
        $data->nm_kab = $request->nm_kab;
        $data->slug = \Str::slug($request['nm_kab']);
        $data->save();

        // alert('Berhasil','Berhasil Mengubah Kabupaten', 'success');
        Session::flash('success', 'Data berhasil diubah!');
        return redirect()->back();
    }

    public function update_kec($id, Request $request)
    {
        $this->validate($request,[
            'id_kab' 		=> 'required',
            'kode' 		=> 'required',
			'nm_kec'   => 'required',
        ]);

        $data = Kecamatan::find($id);
        $data->id_kab = $request->id_kab;
        $data->kode = $request->kode;
        $data->nm_kec = $request->nm_kec;
        $data->slug = \Str::slug($request['nm_kec']);
        $data->save();

        // alert('Berhasil','Berhasil Mengubah Kecamatan', 'success');
        Session::flash('success', 'Data berhasil diubah!');
        return redirect()->back();
    }

    public function update_desa($id, Request $request)
    {
        $this->validate($request,[
            'id_kec' 		=> 'required',
            'kode' 		=> 'required',
			'nm_desa'   => 'required',
        ]);

        $data = Desa::find($id);
        $data->id_kec = $request->id_kec;
        $data->kode = $request->kode;
        $data->nm_desa = $request->nm_desa;
        $data->slug = \Str::slug($request['nm_desa']);
        $data->save();

        // alert('Berhasil','Berhasil Mengubah Desa', 'success');
        Session::flash('success', 'Data berhasil diubah!');
        return redirect()->back();
    }


    public function delete_prov(Request $request) {
        $id = $request->id;
        $provinsi = Provinsi::find($id);
          provinsi::destroy($id);
        //   alert('Berhasil','Berhasil Menghapus Provinsi', 'success');
        Session::flash('success', 'Data berhasil dihapus!');
        return redirect()->back();
    }

    public function delete_kab(Request $request) {
        $id = $request->id;
        $kabupaten = Kabupaten::find($id);
          kabupaten::destroy($id);
        //   alert('Berhasil','Berhasil Menghapus Kabupaten', 'success');
        Session::flash('success', 'Data berhasil dihapus!');
        return redirect()->back();
    }

    public function delete_kec(Request $request) {
        $id = $request->id;
        $kecamatan = Kecamatan::find($id);
          kecamatan::destroy($id);
        //   alert('Berhasil','Berhasil Menghapus Kecamatan', 'success');
        Session::flash('success', 'Data berhasil dihapus!');
        return redirect()->back();
    }

    public function delete_desa(Request $request) {
        $id = $request->id;
        $desa = Desa::find($id);
          desa::destroy($id);
        //   alert('Berhasil','Berhasil Menghapus Desa', 'success');
        Session::flash('success', 'Data berhasil dihapus!');
        return redirect()->back();
    }


    public function getDesa(Request $request)
    {
        $search = $request->search;

      if($search == ''){
         $nm = Desa::orderby('nm_desa','asc')->select('id','nm_desa')->get();
      }else{
         $nm = Desa::orderby('nm_desa','asc')->select('id','nm_desa')->where('nm_desa', 'like', '%' .$search . '%')->get();
      }

      $response = array();
      foreach($nm as $jn){
         $response[] = array(
              "id"=>$jn->nm_desa,
              "text"=>$jn->nm_desa
         );
      }
      return response()->json($response);
    }

    public function wilayahdeleteSelected(Request $request)
    {
        // Validasi input
        $request->validate([
            'selectedItems' => 'required|array',
        ]);

        // Hapus data yang dipilih dari basis data
        Provinsi::destroy($request->input('selectedItems'));

        // Redirect atau kembali ke halaman yang sesuai
        // alert('Berhasil','Berhasil Menghapus Provinsi yang dipilih', 'success');
        Session::flash('success', 'Data berhasil dihapus!');
        return redirect()->back();
    }

    public function kabdeleteSelected(Request $request)
    {
        // Validasi input
        $request->validate([
            'selectedItems' => 'required|array',
        ]);

        // Hapus data yang dipilih dari basis data
        Kabupaten::destroy($request->input('selectedItems'));

        // Redirect atau kembali ke halaman yang sesuai
        // alert('Berhasil','Berhasil Menghapus Kabupaten yang dipilih', 'success');
        Session::flash('success', 'Data berhasil dihapus!');
        return redirect()->back();
    }
}
