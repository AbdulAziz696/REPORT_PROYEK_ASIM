<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $posts = $post::all();

        return view('layouts.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.post.edit');
        //
    }

    public function daftar()
    {
        return view('auth.register');
    }

    public function home()
    {
        return view('index');
    }

    public function employe()
    {
        return view('layouts.user.index');
    }

    public function project_report()
    {
        return view('layouts.post.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post, StorepostRequest $store)
    {
        $post = $post::create([
            'title' => $store->input('title'),
            'content' => $store->input('content'),
            'url' => $store->input('url'),
        ]);

        if ($store->hasFile('image')) {
            $image = $store->file('image');
            $nama_gambar = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('report-image', $nama_gambar);
            $post->image = $path;
            $post->save();
        }

        return redirect()->route('user-detail');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show (Post $post, $slug)
    {
        //
        $posts = $post::where('slug', $slug)->first();

        return view('layouts.post.detail',
        compact('posts')
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, $slug)
    {
        //
        $selected_post = Post::where('slug', $slug)->first();


        return view('layouts.post.edit',compact('selected_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
