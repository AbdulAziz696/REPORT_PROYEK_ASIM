<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\biodata;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Infografis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('role', 'intern')->get();




        return view('layouts.user.index', compact('users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users, biodata $biodatas, Post $post, Infografis $infografis, $slug)
    {
        $user = $users::where('slug', $slug)->firstOrFail();

        $biodata = $biodatas::where('user_id', $user->id)->get();

        $posts = $post::where('user_id', $user->id)->get();

        $info = $infografis::where('user_id', $user->id)->get();

        return view('layouts.user.detail', compact('user', 'posts', 'biodata', 'info' ));
    }


    public function setting(User $user, $slug)
    {
        $users = Auth::user();
        $data_user = $user::where('slug', $slug)->firstOrFail();


        return view('layouts.user.user_profile', compact('data_user','users'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
{
    $user = Auth::user()->slug;
    $users = User::where('slug', $slug)->firstOrFail();
    $users->slug = null;


    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'email_verified_at' =>now()


    ];

    if ($request->hasFile('image')) {
        // Jika ada gambar yang diunggah, proses dan simpan gambar baru
        Storage::delete($users->image);
        $gambar = $request->file('image');
        $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('report-image', $nama_gambar);
        $data['image'] = $path;
    } else {
        // Jika tidak ada gambar yang diunggah, maka gunakan gambar yang sudah ada
        $data['image'] = $users->image;
    }

    $users->update($data);

    return redirect('/');

    }

    public function updateStatus(Request $request, $slug)
{
    // Menggunakan findOrFail untuk mencari user berdasarkan slug
    $user = User::where('slug', $slug)->firstOrFail();

    // Memperbarui data profil pengguna
    $data = [
        'status' => $request->input('status'),
    ];

    $user->update($data);

    // Redirect ke halaman yang sesuai
    return redirect('intern');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('intern');
    }




}
