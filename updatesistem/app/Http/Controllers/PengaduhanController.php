<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

use Session;
use File;

class PengaduhanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::latest()->paginate(20);
        return view('pengaduan.index',compact('pengaduan'));
    }

    public function store(Request $request) {

        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required',
            'bukti'         => 'required|file|mimes:png,jpg,jpeg|max:1048', // Batasan ukuran dan tipe file
            'pengaduan'     =>  'required',
        ]);
        
		$file = $request->file('bukti');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->move('storage/bukti', $fileName);

		$empData = [
            'name'          => $request->name,
            'email'         => $request->email,
            'bukti'         => $fileName,
            'pengaduan'     => $request->pengaduan,
            'statsu'        => '0',
            
        ];

		Pengaduan::create($empData);
        Session::flash('success', 'Pengaduan berhasil dikirim!');
        return redirect()->back();
        
		
	}

    public function delete(Request $request) {
          $id = $request->id;
          $data = Pengaduan::find($id);
          if (File::delete('storage/bukti/' . $data->bukti)) {
              Pengaduan::destroy($id);
              Session::flash('success', 'Data berhasil dihapus!');
            return redirect()->back();
        }
    }
}
