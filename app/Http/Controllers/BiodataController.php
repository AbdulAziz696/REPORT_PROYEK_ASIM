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
    public function store(Request $request)
    {
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


        return redirect("user/".auth()->user()->slug."/profile");
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
    public function update(Request $request, biodata $biodatas, $id)
    {

    $profile = $biodatas::findOrFail($id);


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
