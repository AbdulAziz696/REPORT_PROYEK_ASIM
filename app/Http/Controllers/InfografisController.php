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
    public function profile()
    {
        $data_user = Auth::user();

        return view('layouts.user.user_profile',compact('data_user'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Infografis $post)
    {
        $posts = $post::all();

        return view('layouts.post.index', compact('posts'));
    }
    public function home(Infografis $post, User $user)
    {
        $posts = $post::inRandomOrder()->get();;
        $users = User::where('role', 'intern')->get();


        return view('index', compact('posts','users'));
    }
    public function pro(Infografis $post)
    {
        $posts = $post::all();

        return view('index', compact('posts'));
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

    // public function daftar()
    // {
    //     return view('auth.register');
    // }

    public function masuk()
    {
        return view('auth.login');
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
    public function store(Infografis $post, StorepostRequest $request)
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






    public function show(Infografis $post, $slug)
    {



        $posts = $post::where('slug', $slug)->first();

        return view('layouts.post.detail',compact('posts', )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infografis $post, $slug)
    {
        //
        $edit_post = Infografis::where('slug', $slug)->first();


        return view('layouts.post.edit', compact('edit_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, Infografis $post, $slug)
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
        $post = Infografis::findOrFail($id);
            $post->delete();

        return redirect('post');
    }
}
