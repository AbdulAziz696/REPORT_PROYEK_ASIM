<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index(Infografis $infografis)
    {
        $info = $infografis::all();

        return view('layouts.infografis.index', compact('info'));
    }
    public function home(Infografis $infografis, User $user)
    {
        $info = $infografis::inRandomOrder()->get();;
        $users = User::where('role', 'intern')->get();


        return view('index', compact('info','users'));
    }
    public function pro(Infografis $infografis)
    {
        $info = $infografis::all();

        return view('index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $user= User::all();

    $post=Post::all();


        return view('layouts.infografis.create',compact('user','post'));
        //
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Infografis $infografis, Request $request)
    {
        $user=Auth::user();
        $post=Post::all();


        $created_by=$request->input('created_by');
        $made_by=$request->input('made_by');
        $info = $infografis::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
            'user_id' => $user->id,
            'made_by' =>json_encode($made_by),
            'created_by' =>json_encode($created_by),

        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_gambar = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('info-image', $nama_gambar);
            $info->image = $path;
            $info->save();
        }

        return redirect('user/'.$user->slug.'/profile');

        //
    }

    /**
     * Display the specified resource.
     */

    // $user_name = User::whereIn('id', $post->made_by)->get();






    public function show(Infografis $infografis, $slug)
    {



        $info = Infografis::where('slug', $slug)->first();


        return view('layouts.infografis.detail',compact('info' )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infografis $infografis, $slug)
    {
        //
        $info = Infografis::where('slug', $slug)->firstOrFail();
        $post = post::all();
        $user = User::all();


        return view('layouts.infografis.edit', compact('info','post','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infografis $infografis, $slug)
    {
        $user=Auth::user()->slug;
        $info = $infografis::where('slug', $slug)->firstOrFail();
        $info->slug = null;


        $created_by=$request->input('created_by');
        $made_by=$request->input('made_by');
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
            'user_id' => Auth::user()->id,
            'made_by' =>json_encode($made_by),
            'created_by' =>json_encode($created_by),

        ];

        if ($request->hasFile('image')) {
            Storage::delete($info->image);
            $data['image'] = $request->file('image')->store('info-image');
            $gambar = $request->file('image');
            $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('info-image', $nama_gambar);
            $data['image'] = $path;

        }else {

            $data['image'] = $info->image;
        }

        $info->update($data);

        return redirect('user/'.$user.'/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $info = Infografis::findOrFail($id);
            $info->delete();

        return redirect('user/'.auth()->user()->slug.'/profile');
    }
}
