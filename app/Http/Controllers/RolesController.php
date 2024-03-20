<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Carbon;

use App\Models\M_roles;
use App\Models\User;

class RolesController extends Controller
{
    public function index()
    {
        $roles = M_roles::withCount('roles')->paginate(12);
        $rolesImg = User::all();
        return view('master.roles', compact('roles','rolesImg'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'id_user' 		=> 'required',
			'name' 		    => 'required',
		]);

        $rolesdata = [
            'id_user'   => $request->id_user,
            'name'      => $request->name,
        ];

        M_roles::create($rolesdata);
        // Alert::toast('Berhasil menambah Roles', 'success');
        alert('Berhasil','Berhasil Menambah Roles', 'success');
		return redirect()->back();
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_user' 		=> 'required',
			'name' 		    => 'required',
        ]);

        $data = M_roles::find($id);
        $data->id_user      = $request->id_user;
        $data->name         = $request->name;
        // $data->slug = \Str::slug($request['satpen']);
        $data->save();

        alert('Berhasil','Berhasil Mengubah Roles', 'success');
        return redirect()->back();
    }

    public function delete($id)
    {
        M_roles::whereId($id)->delete();

        // Alert::toast('Berhasil menghapus Tutorial Set', 'success');
        alert('Berhasil','Berhasil Menghapus Roles', 'success');
		return redirect()->back();

    }
}
