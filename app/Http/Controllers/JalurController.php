<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Carbon;

use App\Models\Jalur;

class JalurController extends Controller
{
    public function index()
    {
        $jalur = Jalur::all();
        return view('zonasi.indexjalur', compact('jalur'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'jalur' 		=> 'required',
			'kegiatan' 		=> 'required',
			'keterangan'    => 'required',
			'lokasi' 		=> 'required',
			'tgl_mulai'     => 'required',
			'tgl_selesai'   => 'required',
			'color' 		=> 'required',
			'no_urut'       => 'required',
			'status'        => 'required',
		]);

        $rolesdata = [
            'jalur'         => $request->jalur,
            'kegiatan'      => $request->kegiatan,
            'keterangan'    => $request->keterangan,
            'lokasi'        => $request->lokasi,
            'tgl_mulai'     => $request->tgl_mulai,
            'tgl_selesai'   => $request->tgl_selesai,
            'color'         => $request->color,
            'no_urut'       => $request->no_urut,
            'status'        => $request->status,
            'slug'          => \Str::slug($request->jalur)
        ];

        Jalur::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Menambah Jalur Pendaftaran', 'success');
		return redirect()->back();
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'jalur' 		=> 'required',
			'kegiatan' 		=> 'required',
			'keterangan'    => 'required',
			'lokasi' 		=> 'required',
			'tgl_mulai' 	=> 'required',
			'tgl_selesai' 	=> 'required',
			'color' 		=> 'required',
			'no_urut'       => 'required',
			'status'        => 'required',
        ]);

        $data = Jalur::find($id);
        $data->jalur        = $request->jalur;
        $data->kegiatan     = $request->kegiatan;
        $data->keterangan   = $request->keterangan;
        $data->lokasi       = $request->lokasi;
        $data->tgl_mulai    = $request->tgl_mulai;
        $data->tgl_selesai  = $request->tgl_selesai;
        $data->color        = $request->color;
        $data->no_urut      = $request->no_urut;
        $data->status       = $request->status;
        $data->slug         = \Str::slug($request['jalur']);
        $data->save();

        alert('Berhasil','Berhasil Mengubah Jalur Pendaftaran', 'success');
        return redirect()->back();
    }

    public function changeStatus($jalurId)  
    {
        $jalur = Jalur::find($jalurId);

        if($jalur){
            if($jalur->status){
                $jalur->status = 0;
            }
            else{
                $jalur->status = 1;
            }
            $jalur->save();
        }
        return back();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $jalur = Jalur::find($id);
          Jalur::destroy($id);
          alert('Berhasil','Berhasil Menghapus Jalur Pendaftaran', 'success');
        return redirect()->back();
    }
}
