<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
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

        $portofolio= Portfolio::create([
            'user_id' => Auth::user()->id,
            // 'folder' => $request->input('folder'),

        ],
    );
    if ($request->hasFile('folder')) {
        $file = $request->file('folder');
        $nama_file = time() . rand(1, 9) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('portfolio-file', $nama_file);
        $portofolio->folder = $path;
        $portofolio->save();
    }

        return redirect('user/'.auth()->user()->slug.'/profile');

    }

    /**
     * Display the specified resource.
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {

    //     $porto = portfolio::where('id', $id)->firstOrFail();

    //     $portfolio= [
    //         'user_id' => Auth::user()->id,
    //         'folder' => $request->input('folder'),

    //     ];
    // if ($request->hasFile('folder')) {
    //     Storage::delete($porto->folder);
    //         $portfolio['folder'] = $request->file('folder')->store('portfolio-file');
    //         $gambar = $request->file('folder');
    //         $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
    //         $path = $gambar->storeAs('portfolio-file', $nama_gambar);
    //         $portfolio['folder'] = $path;

    //     }else {

    //         $portfolio['folder'] = $porto->folder;
    //     }

    //     $porto->update($portfolio);

    //     return redirect('user/'.auth()->user()->slug.'/profile');

    // }

    public function update(Request $request, portfolio $portfolio, $id)
    {


        $porto = portfolio::findOrFail($id);
        $portfolio= [
            'folder' => $request->input('folder'),

        ];
    if ($request->hasFile('folder')) {
        Storage::delete($porto->folder);
            $portfolio['folder'] = $request->file('folder')->store('portfolio-file');
            $gambar = $request->file('folder');
            $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('portfolio-file', $nama_gambar);
            $portfolio['folder'] = $path;

        }else {

            $portfolio['folder'] = $porto->folder;
        }

        $porto->update($portfolio);

        return redirect('user/'.auth()->user()->slug.'/profile');

    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(portfolio $portfolio)
    {
        //
    }
}
