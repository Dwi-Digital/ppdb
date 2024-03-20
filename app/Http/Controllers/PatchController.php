<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use Alert;
use Session;

class PatchController extends Controller
{
    public function index()
    {
        return view('master.patch');
    }

    function extractUploadedZip(Request $request){
         
        $zip = new \ZipArchive();
        $status = $zip->open($request->file("zip")->getRealPath());
        if ($status !== true) {
         throw new \Exception($status);
        }
        else{
            $storageDestinationPath= '../';
       
            if (!\File::exists( $storageDestinationPath)) {
                \File::makeDirectory($storageDestinationPath, 0755, true);
            }
            $zip->extractTo($storageDestinationPath);
            $zip->close();
            // Alert::toast('Data berhasil di extract', 'success');
            alert('Data berhasil di extract', 'success');
            return back();
        }
    }
}
