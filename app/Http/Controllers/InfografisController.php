<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.infografis.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.infografis.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=Auth::user()->slug;

        $post = Infografis::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
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
    public function show(Infografis $infografis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infografis $infografis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infografis $infografis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infografis $infografis)
    {
        //
    }
}