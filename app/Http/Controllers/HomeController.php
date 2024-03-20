<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Log;
use App\Models\Data;
use App\Models\User;
use App\Models\Token;
use App\Models\CpdKonfir;
use App\Models\CpdPribadi;
use Illuminate\Support\Carbon;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'Super Admin' OR Auth::check() && Auth::user()->role == 'Pengembang' OR Auth::check() && Auth::user()->role == 'Sekolah'){ 
            $logs = Log::orderBY('id', 'DESC')->get();
            $useracount = User::where('role', 'cpd')->count();
            $laki = CPdPribadi::where('kelamin', 'Laki-laki')->count();
            $perempuan = CPdPribadi::where('kelamin', 'Perempuan')->count();
            }
    
            elseif(Auth::check() && Auth::user()->role == 'cpd'){
                $logs = Auth::user()->logs()->orderBY('id', 'DESC')->get();
            }

            $u = User::where('role','cpd')->count();
            $k = CpdKonfir::where('konfir','1')->count();
            $d = Data::latest()->paginate();
            $t = Token::latest()->paginate();

        if(Auth::check() && Auth::user()->role == 'Super Admin' OR Auth::check() && Auth::user()->role == 'Pengembang' OR Auth::check() && Auth::user()->role == 'Sekolah'){ 

        return view('backend.dashboard',compact('logs','k','d','u','t','useracount','laki','perempuan'));

        }elseif(Auth::check() && Auth::user()->role == 'cpd'){

            return view('backend.dashboardcpd',compact('logs','k','d','u','t'));

        }
            
    }
}
