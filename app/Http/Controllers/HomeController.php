<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Post $post, User $user)
    {
        $posts = $post::inRandomOrder()->get();;
        $users = User::where('role', 'intern')->get();


        return view('index', compact('posts','users'));
    }

    public function list_pendaftar()
    {

        return view('layouts.pendaftar.list_pendaftar');
    }

    public function pendaftar_diterima()
    {

        return view('layouts.pendaftar.pendaftar_diterima');
    }

    public function pendaftar_ditolak()
    {

        return view('layouts.pendaftar.pendaftar_ditolak');
    }
}
