<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Greggilbert\Recaptcha\Facades\Recaptcha;

use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nisn'          => ['required', 'string', 'max:255','unique:users'],
            'name'          => ['required', 'string', 'max:255'],
            'tanggal'       => ['required', 'string', 'max:255'],
            'instansi'      => ['required', 'string', 'max:255'],
            'kabupaten'     => ['required', 'string', 'max:255'],
            'kecamatan'     => ['required', 'string', 'max:255'],
            'desa'          => ['required', 'string', 'max:255'],
            'token'         => ['required', 'string', 'max:255','unique:users'],
            'verifikator'   => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8'],
            'role'          => ['required', 'string', 'max:255'],
            'unicCode'      => ['required', 'string', 'max:255'],
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $empData = User::create([
            'nisn'          => $data['nisn'],
            'name'          => $data['name'],
            'tanggal'       => $data['tanggal'],
            'instansi'      => $data['instansi'],
            'kabupaten'     => $data['kabupaten'],
            'kecamatan'     => $data['kecamatan'],
            'desa'          => $data['desa'],
            'token'         => $data['token'],
            'verifikator'   => $data['verifikator'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'password2'     => $data['password'],
            'role'          => $data['role'],
            'unicCode'      => $data['unicCode'],
            'avatar'        => 'awal.png',
            
        ]);

        Mail::to($empData->email)->send(new MailSend($empData));
        return $empData;

    }
}
