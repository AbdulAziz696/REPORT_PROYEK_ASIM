<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request, $slug)
    {
        $slug = Auth::user()->slug;
        $users = User::where('slug', $slug)->firstOrFail();
        $users->slug = null;
        $portfolio= portfolio::create([
            'user_id' => Auth::user()->id,
            'folder' => $request->input('folder'),

        ],
    );
    if ($request->hasFile('folder')) {
        $file = $request->file('folder');
        $nama_file = time() . rand(1, 9) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('portfolio-file', $nama_file);
        $portfolio->folder = $path;
        $portfolio->save();
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
    public function update(Request $request, portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(portfolio $portfolio)
    {
        //
    }
}
