<?php

namespace App\Http\Controllers;

use App\Models\biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = new Data;

        $data->nama_pangggilan = $request->input('nama_panggilan');
        $data->tempat_lahir = $request->input('tempat_lahir');
        $data->tanggal_lahir = $request->input('tanggal_lahir');
        $data->waktu_magang = $request->input('waktu_magang');
        $data->lama_waktu_magang = $request->input('lama_waktu_magang');
        $data->jurusan_sekolah = $request->input('jurusan_sekolah');
        $data->alamat_domisili = $request->input('alamat_domisili');
        $data->nama_sekolah = $request->input('nama_sekolah');
        $data->alamat_sekolah = $request->input('alamat_sekolah');
        $data->hobi = $request->input('hobi');
        $data->penghargaan = json_encode($request->input('penghargaan'));
        $data->serifikasi = json_encode($request->input('serifikasi'));
        $data->keahlian_khusus = json_encode($request->input('keahlian_khusus'));
        $data->no_hp = json_encode($request->input('no_hp'));
        $data->no_hp_wali = json_encode($request->input('no_hp_wali'));
        $data->harapan_magang = json_encode($request->input('harapan_magang'));

        $data->save();

        return redirect()->route('data.index')->with('success', 'Data berhasil disimpan');
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
        $user=Auth::user()->slug;

        $post = biodata::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
            'user_id' => Auth::user()->id,

        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_gambar = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('report-image', $nama_gambar);
            $post->image = $path;
            $post->save();
        }

        return redirect('user/'.$user.'/profile');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(biodata $biodata)
    {
        //
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
    public function update(Request $request, biodata $biodata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(biodata $biodata)
    {
        //
    }
}
