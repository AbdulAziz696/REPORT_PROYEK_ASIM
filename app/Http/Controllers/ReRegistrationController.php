<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReRegistrationController extends Controller
{

    function __construct()
    {
        $this->middleware("auth");
        $this->middleware("admin");
    }

    public function daftar()
    {

        return view('auth.register');
    }

    public function registerstudent(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' =>now()

        ]);

        return redirect('/'); // Ganti dengan halaman yang sesuai
    }
    //
}
