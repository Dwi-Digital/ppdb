<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{

    public function index()
    {
        $setPendaftaran = Setting::all();
        return view('setting.index', compact('setPendaftaran'));
    }

    public function changeStatus($modeId)  
    {
        $modeKunci = Setting::find($modeId);

        if($modeKunci){
            if($modeKunci->mode){
                $modeKunci->mode = 0;
            }
            else{
                $modeKunci->mode = 1;
            }
            $modeKunci->save();
        }
        return back();
    }
}
