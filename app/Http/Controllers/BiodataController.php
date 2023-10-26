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
    public function index()
    {
        //
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
