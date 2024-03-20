<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kabupaten;
use App\Models\Dzonasi;
use App\Models\Jalur;
use App\Models\Setting;

use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use Illuminate\Http\Request;
Route::get('/', function (Request $request) {
    $kabupaten = Kabupaten::all();
    $setPendaftaran = Setting::all();
    $jalur = Jalur::where('status','1')->get();
    $total = Dzonasi::withCount('umum')->get();
    $q = $request->input('q');
    $zonasi = [];

    if ($q) {
        $users = Dzonasi::where('id_desa', 'like', "%$q%")
                  ->get();
    }

        // $zonasi = Dzonasi::where('id_desa','like',"%".$q."%")
        // ->get();
    return view('welcome',compact('kabupaten','zonasi','jalur','setPendaftaran'));
});

Auth::routes();
$setPendaftaran = Setting::all();
foreach ($setPendaftaran as $p) {
    if ($p->mode == 1) {
        Auth::routes(['register' => true]);
    } elseif ($p->mode == 0) {
        // Disable register route
        Route::match(['get', 'post'], 'register', function () {
            return redirect('/');
        });
    }
}



    Route::get('/searchlive', [App\Http\Controllers\LandingController::class, 'cari'])->name('searchlive');
    Route::get('/pengaduanWilayah', [App\Http\Controllers\LandingController::class, 'pengaduanWilayah'])->name('landing.pengaduanWilayah');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori');

    // roles
    Route::get('/app-access-roles', [App\Http\Controllers\RolesController::class, 'index'])->name('app-access-roles');
    Route::post('/create-roles', [App\Http\Controllers\RolesController::class, 'store'])->name('create-roles');
    Route::put('/update-roles/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('update-roles');
    Route::get('/delete-roles/{id}', [App\Http\Controllers\RolesController::class, 'delete'])->name('delete-roles');


    // user
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin']], function () {
        Route::get('/app-access-user', [App\Http\Controllers\UserController::class, 'index'])->name('app-access-user');
        Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete-user');
        
        Route::get('/app-access-user-dinas', [App\Http\Controllers\UserController::class, 'dinas'])->name('app-access-user-dinas');
        Route::get('/app-access-user-sekolah', [App\Http\Controllers\UserController::class, 'sekolah'])->name('app-access-user-sekolah');
        Route::get('/app-access-user-cpd', [App\Http\Controllers\UserController::class, 'cpd'])->name('app-access-user-cpd');
        Route::post('/store-user', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');
    });
    Route::put('/user_upload/{id}', [App\Http\Controllers\UserController::class, 'upload'])->name('upload');


    // data awal
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin']], function () {
        Route::get('/app-access-data', [App\Http\Controllers\DataController::class, 'index'])->name('app-access-data');
        Route::post('/import_data', [App\Http\Controllers\DataController::class, 'import_data'])->name('import_data');
        Route::put('/update-data-awal/{id}', [App\Http\Controllers\DataController::class, 'update_data'])->name('update-data-awal');
        Route::get('/delete-awal/{id}', [App\Http\Controllers\DataController::class, 'delete'])->name('delete-awal');
    });
    Route::get('/getnama/{nisn}', [App\Http\Controllers\DataController::class, 'getnama']);
    Route::get('/getnama1/{nisn}', [App\Http\Controllers\DataController::class, 'getnama']);


    // ===================================================================================
    // wilayah
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin']], function () {
        Route::get('/app-access-wilayah', [App\Http\Controllers\WilayahController::class, 'index'])->name('app-access-wilayah');

        Route::post('/create-wilayah-prov', [App\Http\Controllers\WilayahController::class, 'store_prov'])->name('crate-wilayah-prov');
        Route::post('/create-wilayah-kab', [App\Http\Controllers\WilayahController::class, 'store_kab'])->name('crate-wilayah-kab');
        Route::post('/create-wilayah-kec', [App\Http\Controllers\WilayahController::class, 'store_kec'])->name('crate-wilayah-kec');
        Route::post('/create-wilayah-desa', [App\Http\Controllers\WilayahController::class, 'store_desa'])->name('crate-wilayah-desa');

        Route::post('/wilayahdeleteSelected', [App\Http\Controllers\WilayahController::class, 'wilayahdeleteSelected'])->name('wilayah.wilayahdeleteSelected');
        Route::post('/kabdeleteSelected', [App\Http\Controllers\WilayahController::class, 'kabdeleteSelected'])->name('wilayah.kabdeleteSelected');
        Route::get('/delete-wilayah-prov/{id}', [App\Http\Controllers\WilayahController::class, 'delete_prov'])->name('delete-wilayah-prov');
        Route::get('/delete-wilayah-kab/{id}', [App\Http\Controllers\WilayahController::class, 'delete_kab'])->name('delete-wilayah-kab');
        Route::get('/delete-wilayah-kec/{id}', [App\Http\Controllers\WilayahController::class, 'delete_kec'])->name('delete-wilayah-kec');
        Route::get('/delete-wilayah-desa/{id}', [App\Http\Controllers\WilayahController::class, 'delete_desa'])->name('delete-wilayah-desa');

        Route::put('/update-wilayah-prov/{id}', [App\Http\Controllers\WilayahController::class, 'update_prov'])->name('update-wilayah-prov');
        Route::put('/update-wilayah-kab/{id}', [App\Http\Controllers\WilayahController::class, 'update_kab'])->name('update-wilayah-kab');
        Route::put('/update-wilayah-kec/{id}', [App\Http\Controllers\WilayahController::class, 'update_kec'])->name('update-wilayah-kec');
        Route::put('/update-wilayah-desa/{id}', [App\Http\Controllers\WilayahController::class, 'update_desa'])->name('update-wilayah-desa');

        Route::get('/show-wilayah-kab/{slug}', [App\Http\Controllers\WilayahController::class, 'show_kab'])->name('show-wilayah-kab');
        Route::get('/show-wilayah-kec/{slug}', [App\Http\Controllers\WilayahController::class, 'show_kec'])->name('show-wilayah-kec');
        Route::get('/show-wilayah-desa/{slug}', [App\Http\Controllers\WilayahController::class, 'show_desa'])->name('show-wilayah-desa');

        Route::post('/get-desa', [App\Http\Controllers\WilayahController::class, 'getDesa'])->name('get-desa');

        Route::post('/import_kec', [App\Http\Controllers\WilayahController::class, 'import_kecamatan'])->name('import_kec');
        Route::post('/import_desa', [App\Http\Controllers\WilayahController::class, 'import_desa'])->name('import_desa');
    });


    // sekolah
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin,Sekolah']], function () {
        Route::get('/app-access-sekolah', [App\Http\Controllers\SekolahController::class, 'index'])->name('app-access-sekolah');
        Route::post('/create-sekolah', [App\Http\Controllers\SekolahController::class, 'store'])->name('crate-sekolah');
        Route::post('/delete-deleteSelected', [App\Http\Controllers\SekolahController::class, 'deleteSelected'])->name('sekolah.deleteSelected');
        Route::put('/update-sekolah/{id}', [App\Http\Controllers\SekolahController::class, 'update'])->name('update-sekolah');
        Route::get('/delete-sekolah/{id}', [App\Http\Controllers\SekolahController::class, 'delete'])->name('delete-sekolah');
        Route::post('/get-sekolah', [App\Http\Controllers\SekolahController::class, 'getsekolah'])->name('get-sekolah');
        Route::post('/import_sekolah', [App\Http\Controllers\SekolahController::class, 'import_sekolah'])->name('import_sekolah');
        Route::get('/searchsekolah', [App\Http\Controllers\SekolahController::class, 'cari'])->name('pengumuman.cari');
    });


    // zonasi
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin']], function () {
        Route::get('/app-access-zonasi', [App\Http\Controllers\ZonasiController::class, 'index'])->name('app-access-zonasi');
        Route::post('/import_zonasi', [App\Http\Controllers\ZonasiController::class, 'import_zonasi'])->name('import_zonasi');
        Route::post('/import_dzonasi', [App\Http\Controllers\ZonasiController::class, 'import_dzonasi'])->name('import_dzonasi');

        Route::post('/create-sekolah-zonasi', [App\Http\Controllers\ZonasiController::class, 'store'])->name('crate-sekolah-zonasi');
        Route::post('/create-desa-zonasi', [App\Http\Controllers\ZonasiController::class, 'store_dzonasi'])->name('crate-desa-zonasi');

        Route::put('/update-desa-zonasi/{id}', [App\Http\Controllers\ZonasiController::class, 'update'])->name('update-desa-zonasi');

        Route::get('/delete-sekolah-zonasi/{id}', [App\Http\Controllers\ZonasiController::class, 'delete'])->name('delete-sekolah-zonasi');
        Route::get('/delete-desa-zonasi/{id}', [App\Http\Controllers\ZonasiController::class, 'delete_dzonasi'])->name('delete-desa-zonasi');

        Route::get('/show-zonasi/{slug}', [App\Http\Controllers\ZonasiController::class, 'show_zonasi'])->name('show-zonasi');
        // Route::get('/getbobot/{id}', [App\Http\Controllers\ZonasiController::class, 'getbobot']);
    });
    Route::get('/getbobot/{id}', [App\Http\Controllers\ZonasiController::class, 'getbobot']);
    


    // jalur
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin']], function () {
        Route::get('/app-access-jalur', [App\Http\Controllers\JalurController::class, 'index'])->name('app-access-jalur');
        Route::get('/change/{id}', [App\Http\Controllers\JalurController::class, 'changeStatus'])->name('change');

        Route::post('/create-jalur', [App\Http\Controllers\JalurController::class, 'store'])->name('create-jalur');
        Route::get('/delete-jalur/{id}', [App\Http\Controllers\JalurController::class, 'delete'])->name('delete-jalur');
        Route::put('/update-jalur/{id}', [App\Http\Controllers\JalurController::class, 'update'])->name('update-jalur');
    });


    // Pendaftaran
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin,Sekolah']], function () {
        Route::get('/access-pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'index'])->name('access-pendaftaran');
        Route::get('/changeBerkas/{id}', [App\Http\Controllers\PendaftaranController::class, 'changeStatus'])->name('changeStatus');
        Route::post('/update-lulus', [App\Http\Controllers\PendaftaranController::class, 'updateLulus'])->name('pendaftaran.updateLulus');
        Route::get('/app-access-pendaftar', [App\Http\Controllers\PendaftaranController::class, 'pendaftar'])->name('app-access-pendaftar');
        Route::get('/daftar/cari', [App\Http\Controllers\PendaftaranController::class, 'cari'])->name('cari');
    });

    // carizonasi
    Route::get('/getkabupaten/{id}', [App\Http\Controllers\CarizonasiController::class, 'getKabupaten'])->name('getkabupaten');
    Route::get('/getkecamatan/{nm_kab}', [App\Http\Controllers\CarizonasiController::class, 'getKecamatan'])->name('getkecamatan');
    Route::get('/getdesa/{nm_kec}', [App\Http\Controllers\CarizonasiController::class, 'getDesa'])->name('getdesa');
    Route::get('/getsekolah/{nm_desa}', [App\Http\Controllers\CarizonasiController::class, 'getSekolah'])->name('getsekolah');
    Route::get('/getbobotsekolah/{id_zonasi}', [App\Http\Controllers\CarizonasiController::class, 'getBobot'])->name('getBobot');

    // token verifikasai
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin,Sekolah']], function () {
        Route::get('/access-verifikasi-token', [App\Http\Controllers\TokenController::class, 'index'])->name('access-verifikasi-token');
        Route::post('/create-verifikasi', [App\Http\Controllers\TokenController::class, 'storeToken'])->name('crate-verifikasi');
        Route::get('/delete-verifikator/{id}', [App\Http\Controllers\TokenController::class, 'delete'])->name('delete-verifikator');
        Route::get('/cetak/{id}', [App\Http\Controllers\TokenController::class, 'cetak'])->name('cetak');
    });
    
    Route::get('/gettoken/{nisn}', [App\Http\Controllers\TokenController::class, 'gettoken']);


    // patch
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang']], function () {
        Route::get('/app-access-patch', [App\Http\Controllers\PatchController::class, 'index']);
        Route::post('/extract-zip', [App\Http\Controllers\PatchController::class, 'extractUploadedZip'])->name('extract-zip');
        Route::get('/our_backup_database', [App\Http\Controllers\PatchController::class, 'backupDatabase'])->name('our_backup_database');
    });


    // CPD
    Route::group(['middleware' => ['auth', 'checkrole:cpd']], function () {
        Route::get('/app-access-cpd', [App\Http\Controllers\CpdController::class, 'index'])->name('app-access-cpd');
        Route::post('/cpd-pilihan2', [App\Http\Controllers\CpdController::class, 'pilihan'])->name('pilihan');
        Route::post('/cpd-store', [App\Http\Controllers\CpdController::class, 'store'])->name('cpd-store');
        Route::post('/cpd-store-pribadi', [App\Http\Controllers\CpdController::class, 'store_pribadi'])->name('cpd-store-pribadi');
        Route::post('/tambah-wali', [App\Http\Controllers\CpdController::class, 'storeWali'])->name('tambah-wali');
        Route::post('/cpd-store-pendidikan', [App\Http\Controllers\CpdController::class, 'storePendidikan'])->name('cpd-store-pendidikan');
        Route::post('/cpd-store-berkas', [App\Http\Controllers\CpdController::class, 'storeBerkas'])->name('cpd-store-berkas');
        Route::post('/cpd-store-konfir', [App\Http\Controllers\CpdController::class, 'storeKonfirmasi'])->name('cpd-store-konfir');

        Route::get('/delete-cpdzonasi/{id}', [App\Http\Controllers\CpdController::class, 'deleteZonasi'])->name('delete.cpdzonasi');
        Route::get('/delete-cpdpribadi/{id}', [App\Http\Controllers\CpdController::class, 'deletePribadi'])->name('delete.cpdpribadi');
        Route::get('/delete-cpdortu/{id}', [App\Http\Controllers\CpdController::class, 'deleteOrtu'])->name('delete.cpdortu');
        Route::get('/delete-cpdpendidikan/{id}', [App\Http\Controllers\CpdController::class, 'deletePendidikan'])->name('delete.cpdpendidikan');
        Route::get('/delete-cpdberkas/{id}', [App\Http\Controllers\CpdController::class, 'deleteberkas'])->name('delete.cpdberkas');
    });
    
    Route::get('/export_excel', [App\Http\Controllers\CpdController::class, 'export_excel'])->name('export_excel');
    
    // pengaduhan
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin']], function () {
        Route::get('/app-access-pengaduhan', [App\Http\Controllers\PengaduhanController::class, 'index'])->name('pengaduhan.index');
        Route::get('/app-access-pengaduhan-wilayah', [App\Http\Controllers\PengaduhanController::class, 'index'])->name('pengaduhan.wilayah');
        Route::get('/delete-pengaduan/{id}', [App\Http\Controllers\PengaduhanController::class, 'delete'])->name('pengaduan.delete');


        Route::get('/app-access-pengumuman', [App\Http\Controllers\PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::post('/import_pengumuman', [App\Http\Controllers\PengumumanController::class, 'import'])->name('pengumuman.import');
        Route::get('/searchpengumuman', [App\Http\Controllers\PengumumanController::class, 'cari'])->name('pengumuman.cari');
        Route::get('/delete-pengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'delete'])->name('pengumuman.delete');
        Route::get('/changePengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'changeStatus'])->name('pengumuman.change');
    });
    Route::post('/app-store-pengaduhan', [App\Http\Controllers\PengaduhanController::class, 'store'])->name('pengaduhan.store');

    Route::group(['middleware' => ['auth', 'checkrole:Pengembang,Super Admin,cpd']], function () {
        Route::get('/app-access-cpd-pengumuman', [App\Http\Controllers\PengumumanController::class, 'pengumuman'])->name('pengumuman.pengumuman');
        Route::get('/app-access-cpd-pdf', [App\Http\Controllers\PengumumanController::class, 'generatePDF'])->name('pengumuman.pengumuman');
    });
    
    Route::group(['middleware' => ['auth', 'checkrole:Pengembang']], function () {
        Route::get('/app-access-setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');
        Route::get('/changeSetting/{id}', [App\Http\Controllers\SettingController::class, 'changeStatus'])->name('setting.change');
    });