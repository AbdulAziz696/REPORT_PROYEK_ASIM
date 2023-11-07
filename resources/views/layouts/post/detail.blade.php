@extends('welcome')
@section('title', '| Project Detail')

@section('main')

    <div class=" mx-5 my-3 justify-start">

        <div class="hearder ">
            <div class="title my-auto">
                <p class="leading-normal font-semibold text-3xl ">
                    {{ $posts->title }}
                </p>
                <p class="">
                    {{ date('d M Y H:i', strtotime($posts->created_at)) }}
                </p>
            </div>

            <div class="profile flex flex-row justify-start ms-2">

                 @if (file_exists(public_path('storage/'. $posts->postwriter->image)))
                         <!-- Gambar dari folder storage -->
                         <img src="{{ asset('storage/'. $posts->postwriter->image) }}" alt="Gambar dari Storage" class="rounded-circle img-fluid border border-solid border-white-250 w-10 h-10 me-2">
                     @else
                         <!-- Gambar dari folder image -->
                         <img src="{{ asset('img/'. $posts->postwriter->image) }}" alt="Gambar dari Folder Image" class="rounded-circle img-fluid border border-solid border-white-250 w-10 h-10 me-2">
                     @endif


                <div class="flex flex-col align-item justify-center">
                    <p class="text-xs font-semibold">{{ $posts->postwriter->name }}</p>
                    <p class="text-xs">{{ $posts->postwriter->role }}</p>

                </div>
            </div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-[10px] xl:w-[88px]  xl:h-[8px] h-[4px] rounded-md"
                    viewBox="0 0 88 8" fill="none">
                    <path d="M4 4H84" stroke="#E30052" stroke-width="10" class="w-fit" stroke-linecap="round">
                    </path>
                </svg>
            </div>
            <div class="post my-3 mx-auto ">
                <div class="content my-3 ">
                    <div class="img">
                        <a href="{{ asset('storage/' . $posts->image) }}" target="_blank">
                        <img  src=" {{ asset('storage/' . $posts->image) }}" alt=""
                        class=" max-w-screen-lg max-h-96 w-full h-96 img-fluid object-cover border">
                    </a>
                    </div>
                    <div class="content-text mt-4">
                        <p class=" object-center font-semibold">Deskripsi</p>
                        <p>
                            {!! $posts->content !!}

                        </p>
                    </div>

                    <div class="content-text mt-4">


                            <p class=" font-semibold">Created By:</p>
                       <p>
                        @php

                        $made_by = json_decode($posts->made_by, true);

                        if (!is_null($made_by) && is_array($made_by)) {
                            $users = App\Models\User::whereIn('id', $made_by)->get();

                            foreach ($users as $i) {
                                echo '<a href="' . url('user/' . $i->slug . '/profile') . '" target="_blank" >' . $i->name . ',</a>';
                            }
                        }
                        @endphp
                        </p>

                    </div>
                    <div class="content-link flex flex-row my-4 ">
                        <p class=" font-semibold">Berikut link akses projeknya:</p>
                        <a href="
                       {{ $posts->url }}
                        "
                            class=" ms-1 hover:text-blue-700 ">
                            {{ $posts->url }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::check())
            @if (Auth::user()->id == $posts->user_id || Auth::user()->role == 'admin')
                @if (Auth::user()->status == 'active')
                    <div class="mt-3 btn_edit_post">
                        <button onclick="location.href='{{ url('post/' . $posts->slug . '/edit') }}'"
                            class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Edit</button>
                    </div>
                    <div class="btn_delete_post mt-2">
                        <button type="submit" data-modal-target="delete-modal{{$posts->id}}" data-modal-toggle="delete-modal{{$posts->id}}"
                            class="border border-gray-400 py-2 px-4 rounded w-full bg-red-600 text-white hover:bg-gray-400 hover:text-gray-600 hover:border-gray-700 transition">Delete</button>
                        @include('layouts.post.modal-detail')
                    </div>
                @endif
            @endif
        @else
        @endif


    @endsection
