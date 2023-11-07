<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }

    public function profile()
    {
        $data_user = Auth::user();

        return view('layouts.user.user_profile',compact('data_user'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $posts = $post::all();

        return view('layouts.post.index', compact('posts'));
    }


  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $user= User::all();

        return view('layouts.post.create',compact('user'));
        //
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
    public function store(Post $post, StorepostRequest $request)
    {
        $user=Auth::user();


        $made_by=$request->input('made_by');
        $post = $post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
            'user_id' => Auth::user()->id,
            'made_by' =>json_encode($made_by),

        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_gambar = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('report-image', $nama_gambar);
            $post->image = $path;
            $post->save();
        }

        return redirect('user/'.$user->slug.'/profile');

        //
    }

    /**
     * Display the specified resource.
     */

    // $user_name = User::whereIn('id', $post->made_by)->get();






    public function show(Post $post, $slug)
    {



        $posts = $post::where('slug', $slug)->first();

        return view('layouts.post.detail',compact('posts', )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, $slug)
    {
        //
        $edit_post = Post::where('slug', $slug)->first();
        $user = User::all();



        return view('layouts.post.edit', compact('edit_post','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, Post $post, $slug)
    {
        $user=Auth::user()->slug;
        $posts = $post::where('slug', $slug)->firstOrFail();
        $posts->slug = null;


        $made_by=$request->input('made_by');
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
            'user_id' => Auth::user()->id,
            'made_by' =>json_encode($made_by),

        ];

        if ($request->hasFile('image')) {
            Storage::delete($posts->image);
            $data['image'] = $request->file('image')->store('report-image');
            $gambar = $request->file('image');
            $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('report-image', $nama_gambar);
            $data['image'] = $path;

        }else {

            $data['image'] = $posts->image;
        }

        $posts->update($data);

        return redirect('user/'.$user.'/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
            $post->delete();

        return redirect('user/'.auth()->user()->slug.'/profile');
    }
}



