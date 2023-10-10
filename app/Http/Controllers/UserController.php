<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

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
    public function show(User $user, Post $post, $slug)
    {
        $data_user = Auth::user();
        $user = $user::where('slug', $slug)->firstOrFail();
        $posts = $post::where('user_id', $user->id)->get();

        return view('layouts.user.detail', compact('user', 'posts', 'data_user'));
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
    public function update(Request $request)
    {
    // Validasi data yang dikirim oleh pengguna
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:8|confirmed',
        'addres' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar profil (opsional)
    ]);

    $user = auth()->user();
    // Memperbarui data profil pengguna
    $data=
    [
        'name' => $request->name,
        'addres' => $request->addres,
        'city' => $request->city,
        'email' => $request->email
];
    // Memperbarui kata sandi jika ada perubahan
    // if ($request->password) {
    //     $user->password = bcrypt($request->password);
    // }

    // Memeriksa apakah ada gambar profil yang diunggah
    if ($request->hasFile('image')) {
        Storage::delete($user->image);
        $data['image'] = $request->file('image')->store('report-image');
        $gambar = $request->file('image');
        $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('report-image', $nama_gambar);
        $data['image'] = $path;

    }

    $user->update($data);

    // Redirect kembali dengan pesan sukses
    return redirect('user/'.$user->slug.'/detail')->with('success', 'Profil Anda berhasil diperbarui.');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = User::findOrFail($id);
        $post->delete();
        return redirect('user');
    }

        


}
