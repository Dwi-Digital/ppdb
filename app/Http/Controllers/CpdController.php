<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Dzonasi;
use App\Models\CpdZonasi;
use App\Models\CpdPribadi;
use App\Models\CpdOrtu;
use App\Models\CpdPendidikan;
use App\Models\CpdBerkas;
use App\Models\CpdKonfir;
use App\Models\Zonasi;
use App\Models\Pendaftaran;

use App\Exports\ZonasiExport;
use App\Exports\PribadiExport;

use Alert;
use Session;
use File;
use DB;
use Dompdf\Dompdf;
use Dompdf\Options;

class CpdController extends Controller
{

    public function export_excel()
	{
        $table1Data = CpdZonasi::all();
        $table2Data = CpdPribadi::all();
        $table3Data = CpdOrtu::all();
        $table4Data = CpdPendidikan::all();

        $combinedData = $this->combineData($table1Data, $table2Data, $table3Data, $table4Data);

        return Excel::download(new ZonasiExport($combinedData), 'data_pendaftar.xlsx');

	}
    private function combineData($table1Data, $table2Data, $table3Data, $table4Data)
    {
        $combinedData = [];

        foreach ($table1Data as $zonasi) {
            if ($zonasi->status != 0) {
                $pribadi = $table2Data->where('id_user', $zonasi->id_user); // Sesuaikan dengan kunci asing yang sesuai

                foreach ($pribadi as $pri) {
                    $ortu = $table3Data->where('id_user', $zonasi->id_user)->first(); // Sesuaikan dengan kunci asing yang sesuai
                    $pendidikan = $table4Data->where('id_user', $zonasi->id_user)->first();

                        $combinedData[] = [
                            'Desa'          => $zonasi->desa,
                            'Sekolah'       => $zonasi->sek->id_zonasi,
                            'Bobot'         => $zonasi->sek->bobot,
                            'NISN'          => $pri->nisn,
                            'Nama Siswa'    => $pri->nama_siswa,
                            // 'Umur'          => $umur = \Carbon\Carbon::parse($pri->tanggal)->age,
                            'Umur'          => $umur = \Carbon\Carbon::parse($pri->tanggal)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan, dan %d hari'),

                            'Kelamin'       => $pri->kelamin,
                            'Agama'         => $pri->agama,
                            'No Hp'         => $pri->nohp,
                            'Alamat'        => $pri->alamat,
                            'Nama Ayah'     =>$ortu ? $ortu->nm_ayah : null,
                            'Pekerjaan Ayah'=>$ortu ? $ortu->pekerjaan_ayah : null,
                            'No Ayah'       =>$ortu ? $ortu->no_ayah : null,
                            'Nama Ibu'      =>$ortu ? $ortu->nm_ibu : null,
                            'Pekerjaan Ibu' =>$ortu ? $ortu->pekerjaan_ibu : null,
                            'No Ibu'        =>$ortu ? $ortu->no_ibu : null,
                            'Nama Wali'     =>$ortu ? $ortu->nm_wali : null,
                            'Pekerjaan Wali'=>$ortu ? $ortu->pekerjaan_wali : null,
                            'No Wali'       =>$ortu ? $ortu->no_wali : null,
                            'Asal Sekolah'  =>$pendidikan ? $pendidikan->nm_sekolah : null,
                            'Lulus di'      => $zonasi->lulus,
                        ];
                }
            }
        }

        

        return $combinedData;
    }

    public function cpdgeneratePDF()
    {
        $cpdzonasi = CpdZonasi::where('id_user', Auth::user()->id)->get();
        $downloadPDF = Pendaftaran::where('id_user', Auth::user()->id); // Mengambil semua data dari tabel Lulus

        // $options = new Options();
        // $options->setIsRemoteEnabled(true);

        $pdf = new Dompdf();
        $pdf ->loadHtml(view('cpd.buktidaftar', compact('downloadPDF','cpdzonasi')));
        $pdf->setPaper([0, 0, 595.276, 419.528], 'portrait');

        $pdf->render();

        return $pdf->stream(Auth::user()->name.'.pdf');
        // return $pdf->stream();
    }

    public function index()
    {
        $provinsi = Provinsi::get();
        $kabupaten = Kabupaten::get();
        $cpdpribadi = CpdPribadi::where('id_user', Auth::user()->id)->get();
        $cpdzonasi = CpdZonasi::where('id_user', Auth::user()->id)->get();
        $cpdortu = CpdOrtu::where('id_user', Auth::user()->id)->get();
        $cpdberkas = CpdBerkas::where('id_user', Auth::user()->id)->get();
        $cpdpendidikan = CpdPendidikan::where('id_user', Auth::user()->id)->get();
        $cpdkonfir = CpdKonfir::where('id_user', Auth::user()->id)->get();
        $cpdkonfirs = CpdKonfir::where('id_user', Auth::user()->id)->first();
        


        // jumlah
        $z = CpdZonasi::where('id_user', Auth::user()->id)->get()->count();
        $p = CpdPribadi::where('id_user', Auth::user()->id)->get()->count();
        $o = CpdOrtu::where('id_user', Auth::user()->id)->get()->count();
        $pk = CpdPendidikan::where('id_user', Auth::user()->id)->get()->count();
        $b = CpdBerkas::where('id_user', Auth::user()->id)->get()->count();
        $k = CpdKonfir::where('id_user', Auth::user()->id)->get()->count();
        return view('cpd.cpd',compact('provinsi','kabupaten','cpdzonasi','cpdpribadi','cpdortu','cpdpendidikan','cpdberkas','cpdkonfir','cpdkonfirs','z','p','o','pk','b','k'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_user' 		=> 'required',
			'kabupaten'     => 'required',
			'kecamatan'     => 'required',
			'desa' 		    => 'required',
			'sekolah'       => 'required',
			'sekolah1'       => 'required',
		]);
        

        $data = [
            'id_user'       => $request->id_user,
            'kabupaten'     => $request->kabupaten,
            'kecamatan'     => $request->kecamatan,
            'desa'          => $request->desa,
            'sekolah'       => $request->sekolah,
            'sekolah1'       => $request->sekolah1,
            'progres'       => '20',
            'status'        => '0',
            'lulus'         => '0',
            // 'slug'      => \Str::slug($request->desa)
        ];

         // Periksa batasan limit
         $count = CpdZonasi::where('id_user', $request->id_user)->count();
        if ($count >= 2) {
            alert('Maaf','Hanyak dapat memilih 2 Sekolah', 'error');
            return redirect()->back();
        }

        CpdZonasi::create($data);
        // Alert::toastr('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Memilih Zonasi', 'success');
		return redirect()->back();
    }

    public function store_pribadi(Request $request)
    {
        $this->validate($request, [
            'id_user' 		=>  ['required', 'unique:cpd_pribadi'],
			'nama_siswa'    => 'required',
			'tanggal'       => 'required',
			'nisn'          => 'required',
			'kelamin' 		=> 'required',
			'agama'         => 'required',
			'nohp'          => 'required',
			'alamat'        => 'required',
		]);


        $data = [
            'id_user'       => $request->id_user,
            'nama_siswa'    => $request->nama_siswa,
            'tanggal'       => $request->tanggal,
            'nisn'          => $request->nisn,
            'kelamin'       => $request->kelamin,
            'agama'         => $request->agama,
            'nohp'          => $request->nohp,
            'alamat'        => $request->alamat,
            'progres'       => '20',
            // 'slug'      => \Str::slug($request->desa)
        ];

        CpdPribadi::create($data);
        // Alert::toast('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Menambah Data Pribadi', 'success');
		return redirect()->back();
    }

    public function storeWali(Request $request)
    {
        $this->validate($request, [
            'id_user' 		    =>  ['required', 'unique:cpd_ortu'],
			'nm_ayah'           => 'required',
			'pekerjaan_ayah'    => 'required',
			'no_ayah' 		    => 'required',
			'nm_ibu'            => 'required',
			'pekerjaan_ibu'     => 'required',
			'no_ibu'            => 'required',
			'nm_wali'           => 'required',
			'pekerjaan_wali'    => 'required',
			'no_wali'           => 'required',
		]);

        $data = [
            'id_user'           => $request->id_user,
            'nm_ayah'           => $request->nm_ayah,
            'pekerjaan_ayah'    => $request->pekerjaan_ayah,
            'no_ayah'           => $request->no_ayah,
            'nm_ibu'            => $request->nm_ibu,
            'pekerjaan_ibu'     => $request->pekerjaan_ibu,
            'no_ibu'            => $request->no_ibu,
            'nm_wali'           => $request->nm_wali,
            'pekerjaan_wali'    => $request->pekerjaan_wali,
            'no_wali'           => $request->no_wali,
            'progres'           => '20',
            // 'slug'           => \Str::slug($request->desa)
        ];

        CpdOrtu::create($data);
        // Alert::toastr('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Menambah Data orang Tua atau Wali', 'success');
		return redirect()->back();
    }

    public function storePendidikan(Request $request)
    {
        $this->validate($request, [
            'id_user' 		    =>  ['required', 'unique:cpd_pendidikan'],
			'nm_sekolah'        => 'required',
			'provinsi'          => 'required',
			'kabupaten' 		=> 'required',
			
		]);

        $data = [
            'id_user'           => $request->id_user,
            'nm_sekolah'        => $request->nm_sekolah,
            'provinsi'          => $request->provinsi,
            'kabupaten'         => $request->kabupaten,
            'progres'           => '20',
            // 'slug'           => \Str::slug($request->desa)
        ];

        CpdPendidikan::create($data);
        // Alert::toastr('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Menambah Data Pendidikan', 'success');
		return redirect()->back();
    }

    public function storeBerkas(Request $request) {

        $request->validate([
            'id_user'   =>  ['required', 'unique:cpd_berkas'],
            'berkas'    => 'required|mimes:pdf|max:2048', // Batasan ukuran dan tipe file
        ]);
        
		$file = $request->file('berkas');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->move('storage/berkas', $fileName);

		$empData = [
            'id_user'  => $request->id_user,
            'berkas'   => $fileName,
            
        ];

		CpdBerkas::create($empData);
        alert('Berhasil','Berhasil Mengupload Berkas', 'success');
		// return response()->json([
        //     'status' => 200,
		// ]);
        return redirect()->back();
        
		
	}

    public function storeKonfirmasi(Request $request)
    {
        $this->validate($request, [
            'id_user' 		=>  ['required', 'unique:cpd_konfir'],
			'konfir'        => 'required',
			
		]);

        $data = [
            'id_user'       => $request->id_user,
            'konfir'        => $request->konfir,
            
        ];


        CpdKonfir::create($data);
        // Alert::toastr('Berhasil menambah Roles', 'success');
        alert('Terima Kasih','Anda sudah menyelesaikan pendaftaran', 'success');
		return redirect()->back();
    }

    // pilihan sekolah bagi yang tidak lulus
    public function pilihan(Request $request) {
        // Validasi input
        $request->validate([
            'pilihan' => 'required|array',
        ]);

        // Simpan pengumuman untuk setiap pilihan yang dipilih
        foreach ($request->pilihan as $pilihan) {
            // Dapatkan detail zonasi berdasarkan nama sekolah yang dipilih
            $zonasi = Zonasi::where('id', $pilihan)->first();
            
             // Pastikan zonasi ditemukan
            if ($zonasi) {
                // Buat objek CpdZonasi untuk menyimpan data
                $pengumuman = new CpdZonasi();
                $pengumuman->id_user = $request->id_user; 
                $pengumuman->kabupaten = $request->kabupaten; 
                $pengumuman->kecamatan = $request->kecamatan; 
                $pengumuman->desa = $request->desa; 
                $pengumuman->status = '0'; 
                $pengumuman->lulus = '0'; 
                $pengumuman->sekolah = $zonasi->id; // ID zonasi yang dipilih
                $pengumuman->sekolah1 = $zonasi->satpen; 
                $pengumuman->save();
            }
        }

        // Redirect atau kembali ke halaman yang sesuai
        alert('Terima Kasih','Anda telah memilih sekolah pilihan ke 2', 'success');
        return redirect()->back();
    }


    // delete data cpd zonasi
    public function deleteZonasi(Request $request) {
        $id = $request->id;
        $data = CpdZonasi::find($id);
          CpdZonasi::destroy($id);
          alert('Berhasil','Berhasil Menghapus Data Zonasi', 'success');
        return redirect()->back();
    }

    // delete data cpd Pribadi
    public function deletePribadi(Request $request) {
        $id = $request->id;
        $data = CpdPribadi::find($id);
          CpdPribadi::destroy($id);
          alert('Berhasil','Berhasil Menghapus Data Pribadi', 'success');
        return redirect()->back();
    }

    public function deleteOrtu(Request $request) {
        $id = $request->id;
        $data = CpdOrtu::find($id);
          CpdOrtu::destroy($id);
          alert('Berhasil','Berhasil Menghapus Data Orang Tua dan Wali', 'success');
        return redirect()->back();
    }

    public function deletePendidikan(Request $request) {
        $id = $request->id;
        $data = CpdPendidikan::find($id);
          CpdPendidikan::destroy($id);
          alert('Berhasil','Berhasil Menghapus Data Pendidikan', 'success');
        return redirect()->back();
    }

    // delete berkas cpd
    public function deleteberkas(Request $request) {
		$id = $request->id;
		$data = CpdBerkas::find($id);
		if (File::delete('storage/berkas/' . $data->berkas)) {
			CpdBerkas::destroy($id);
            alert('Berhasil','Berhasil Menghapus Data Berkas', 'success');
            return redirect()->back();
        }
    }
    
}
