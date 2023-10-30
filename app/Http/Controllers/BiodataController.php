<?php

namespace App\Http\Controllers;

use App\Models\biodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // $request->validate([
    //     'nama_pangggilan' => 'required',
    //     'tempat_lahir' => 'required',
    //     'tanggal_lahir' => 'required',
    //     'waktu_magang' => 'required',
    //     'lama_waktu_magang' => 'required',
    //     'jurusan_sekolah' => 'required',
    //     'alamat_domisili' => 'required',
    //     'nama_sekolah' => 'required',
    //     'alamat_sekolah' => 'required',
    //     'hobi' => 'required',
    //     'penghargaan' => 'required',
    //     'sertifikasi' => 'required',
    //     'keahlian_khusus' => 'required',
    //     'no_hp' => 'required',
    //     'no_hp_wali' => 'required',
    //     'harapan_magang' => 'required',
    // ]);

    // Menggunakan "create" untuk membuat instance biodata dan menyimpannya ke database
    biodata::create([
        'user_id' => Auth::user()->id,
        'nama_pangggilan' => $request->input('nama_pangggilan'),
        'tempat_lahir' => $request->input('tempat_lahir'),
        'tanggal_lahir' => $request->input('tanggal_lahir'),
        'waktu_magang' => $request->input('waktu_magang'),
        'lama_waktu_magang' => $request->input('lama_waktu_magang'),
        'jurusan_sekolah' => $request->input('jurusan_sekolah'),
        'alamat_domisili' => $request->input('alamat_domisili'),
        'nama_sekolah' => $request->input('nama_sekolah'),
        'alamat_sekolah' => $request->input('alamat_sekolah'),
        'hobi' => $request->input('hobi'),
        'penghargaan' => $request->input('penghargaan'),
        'sertifikasi' => $request->input('sertifikasi'),
        'keahlian_khusus' => $request->input('keahlian_khusus'),
        'no_hp' => $request->input('no_hp'),
        'no_hp_wali' => $request->input('no_hp_wali'),
        'harapan_magang' => $request->input('harapan_magang'),
    ]);

    return redirect()->route('home')->with('success', 'Data berhasil disimpan');
    }

    public function tampila_input()
    {
        return view('layouts.biodata.input');
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
    public function store(Request $request, $slug)
    {

    $slug = Auth::user()->slug;
    $users = User::where('slug', $slug)->firstOrFail();
    $users->slug = null;

        biodata::create([
            'user_id' => Auth::user()->id,
            'nama_panggilan' => $request->input('nama_panggilan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            // 'waktu_magang' => $request->input('waktu_magang'),
            'lama_waktu_magang' => $request->input('lama_waktu_magang'),
            'jurusan_sekolah' => $request->input('jurusan_sekolah'),
            'alamat_domisili' => $request->input('alamat_domisili'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'alamat_sekolah' => $request->input('alamat_sekolah'),
            'hobi' => $request->input('hobi'),
            'penghargaan' => $request->input('penghargaan'),
            'sertifikasi' => $request->input('sertifikasi'),
            'keahlian_khusus' => $request->input('keahlian_khusus'),
            'no_hp' => $request->input('no_hp'),
            'no_hp_wali' => $request->input('no_hp_wali'),
            'harapan_magang' => $request->input('harapan_magang'),
        ]);


        return redirect("user/".$slug."/profile");
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(biodata $biodata, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, biodata $biodata, $id)
    {


    // $id = Auth::user()->profile->user_id;

    $profile = biodata::where('id', $id)->firstOrFail();
    // $profile->id = null;

        $biodata =[
            // 'user_id' => Auth::user()->id,
            'nama_panggilan' => $request->input('nama_panggilan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            // 'waktu_magang' => $request->input('waktu_magang'),
            'lama_waktu_magang' => $request->input('lama_waktu_magang'),
            'jurusan_sekolah' => $request->input('jurusan_sekolah'),
            'alamat_domisili' => $request->input('alamat_domisili'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'alamat_sekolah' => $request->input('alamat_sekolah'),
            'hobi' => $request->input('hobi'),
            'penghargaan' => $request->input('penghargaan'),
            'sertifikasi' => $request->input('sertifikasi'),
            'keahlian_khusus' => $request->input('keahlian_khusus'),
            'no_hp' => $request->input('no_hp'),
            'no_hp_wali' => $request->input('no_hp_wali'),
            'harapan_magang' => $request->input('harapan_magang'),
        ];

        $profile->update($biodata);


        return redirect('user/'.auth()->user()->slug.'/profile');
        //
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(biodata $biodata)
    {
        //
    }
    public function dummy(biodata $biodata)
    {
        $biodatas = biodata::get();

        return view('dummy',compact('biodatas'));
        //
    }
}
