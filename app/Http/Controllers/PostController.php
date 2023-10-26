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
    public function home(Post $post, User $user)
    {
        $posts = $post::inRandomOrder()->get();;
        $users = User::where('role', 'intern')->get();


        return view('index', compact('posts','users'));
    }
    public function pro(Post $post)
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




    public function search(Request $request)
    {
        $output = '';
        if ($request->ajax()) {
            $data = Post::where('id', 'like', '%' . $request->search . '%')
                ->orWhere('title', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%')->get();

            if (count($data) > 0) {
                foreach ($data as $i) {
                    $output .='
                        <div class="bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4">
                            <div class="w-38 h-38 mx-8 -mt-12">

                            </div>
                            <div class="mt-4 mx-8 justify-center">
                                <h1 class="font-bold text-xl text-black text-center">' . $i->title . '</h1>
                            </div>
                            <div class="mx-7 my-3">
                                <button onclick="location.href=\'post/detail/' . $i->slug . '\'" class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail Aplikasi</button>
                            </div>
                        </div>';
                }
                return $output;
            } else {
                return $output .= 'No result';
            }
        }
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

        // $user_name = [];
        // if ($posts->made_by) {
            // $userIds = explode(',', $posts->made_by);
            $user_name = User::selectById('id', $posts->made_by)->get();
        // }

        // ddd($user_name);
        return view('layouts.post.detail',compact('posts', 'user_name')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, $slug)
    {
        //
        $edit_post = Post::where('slug', $slug)->first();


        return view('layouts.post.edit', compact('edit_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, Post $post, $slug)
    {
        $user=Auth::user()->slug;
        $posts = $post::where('slug', $slug)->firstOrFail();
        $posts->slug = null;

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
            'user_id' => Auth::user()->id,
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

        return redirect('post');
    }}



