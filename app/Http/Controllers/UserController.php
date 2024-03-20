<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Alert;
use File;
use Session;

use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Users;
use App\Models\Sekolah;
use App\Models\M_roles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
    {
        $users = User::all();
        return view('master.user', compact('users'));
    }

    public function dinas()
    {
        $role = M_roles::all();
        $users = User::where('role', 'Admin')->orwhere('role','Super Admin')->paginate(20);

        return view('master.userdinas', compact('users','role'));
    }

    public function sekolah()
    {
        $getsekolah = Sekolah::get();
        $sekolah = User::where('role', 'Sekolah')->paginate(20);
        return view('master.usersekolah', compact('sekolah','getsekolah'));
    }

    public function cpd()
    {
        $cpd = User::where('role', 'cpd')->paginate(30);
        return view('master.usercpd', compact('cpd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
		
        $this->validate($request, [
			'name' 		    => 'required',
			'email'         => ['required', 'unique:users'],
            'password'      => ['required', 'string', 'min:8'],
			'instansi'      => 'required',
			'role'          => 'required',
		]);

		$empData = [
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request['password']),
            'password2'      => $request->password,
            'instansi'      => $request->instansi,
            'role'          => $request->role,
            'avatar'        => 'awal.png',
        ];
        
        
        Users::create($empData);
        // Mail::to($request->email)->send(new MailSend($empData));
        // return response()->json([
        //   'status' => 200,
        // ]);
        alert('Berhasil','Berhasil Menambah Email Terkirim', 'success');
        return redirect()->back();

	}

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' 		    => 'required',
			'email'         => ['required'],
            'password'      => ['required', 'string', 'min:8'],
			'instansi'      => 'required',
        ]);

        $data = Users::find($id);
        $data->name         = $request->name;
        $data->email      = $request->email;
        $data->password      = Hash::make($request->password);
        $data->instansi      = $request->instansi;
        $data->save();

        Session::flash('success', 'Data berhasil diubah!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function profil()
    {
        return view('master.profil');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function upload(Request $request, $id)
    {
        $user = User::find($id);
        if($request->hasFile('avatar'))
        {
            $myFile  = 'storage/images/user/'. $user->avatar;
            if(File::exists($myFile ))
            {
                File::delete($myFile );
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/images/user/', $filename);
            $user->avatar = $filename;

            // Gunakan Intervention Image untuk menganalisis warna latar belakang
            // $backgroundIsRed = $this->detectRedBackground($file);

        }
            $user->save();
            alert('Berhasil','Berhasil mengupload foto', 'success');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        User::whereId($id)->delete();

        // Alert::toast('Berhasil menghapus Tutorial Set', 'success');
        alert('Berhasil','Berhasil Menghapus User', 'success');
		return redirect()->back();

    }
}
