@extends('welcome')
@section('title', '| Infografis Detail')

@section('main')

    <div class=" mx-5 my-3 justify-start">

        <div class="hearder">
            <div class="title my-auto">
                <p class="leading-normal font-semibold text-3xl ">
                    {{ $info->title }}
                </p>
                <p class=" my-1">
                    {{ date('d M Y H:i', strtotime($info->created_at)) }}
                </p>
            </div>

            <div class="profile flex flex-row justify-start ms-0">

                @if (file_exists(public_path('storage/' . $info->infosher->image)))
                    <!-- Gambar dari folder storage -->
                    <img src="{{ asset('storage/' . $info->infosher->image) }}" alt="Gambar dari Storage"
                        class="rounded-circle img-fluid border border-solid border-white-250 w-10 h-10 me-2">
                @else
                    <!-- Gambar dari folder image -->
                    <img src="{{ asset('img/' . $info->infosher->image) }}" alt="Gambar dari Folder Image"
                        class="rounded-circle img-fluid border border-solid border-white-250 w-10 h-10 me-2">
                @endif
                <div class="flex flex-col align-item justify-center">
                    <p class="text-xs font-semibold">{{ $info->infosher->name }}</p>
                    <p class="text-xs">{{ $info->infosher->role }}</p>

                </div>
            </div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-[10px] xl:w-[88px]  xl:h-[8px] h-[4px] rounded-md"
                    viewBox="0 0 88 8" fill="none">
                    <path d="M4 4H84" stroke="#E30052" stroke-width="10" class="w-fit" stroke-linecap="round">
                    </path>
                </svg>
            </div>
        </div>
        <div class="post my-3 mx-auto ">
            <div class="content ">
                <div class="img">
                    <a href="{{ asset('storage/' . $info->image) }}" src=" {{ asset('storage/' . $info->image) }}"
                        alt="" target="_blank"><img src="{{ asset('storage/' . $info->image) }}" alt="{{ $info->image }}"
                            class=" max-w-screen-lg max-h-96 w-full h-96 img-fluid object-cover border"></a>
                </div>
                <div class="content-text mt-4">
                    <p class=" object-center font-semibold">Deskripsi</p>
                    <p>
                        {!! $info->content !!}

                    </p>
                </div>

                <div class="content-text mt-4">


                    <p class=" font-semibold">Referenced to:</p>
                    <div >
                    @php
                    $made_references = json_decode($info->made_by, true);

                    if (!is_null($made_references) && is_array($made_references)) {
                        $users = App\Models\Post::whereIn('id', $made_references)->get();

                        foreach ($users as $i) {
                            echo '<a href="' . url('post/' . $i->slug . '/detail') . '">' . $i->title . ',</a>';
                        }
                    }
                @endphp
                </div>
                <div class="content-text mt-4">


                    <p class=" font-semibold">Created By:</p>
                    <div >
                    @php
                    $made_references = json_decode($info->created_by, true);

                    if (!is_null($made_references) && is_array($made_references)) {
                        $users = App\Models\User::whereIn('id', $made_references)->get();

                        foreach ($users as $i) {
                            echo '<a href="' . url('user/' . $i->slug . '/profile') . '" target="_blank" >' . $i->name . ',</a>';
                        }
                    }
                @endphp
                </div>


                </div>

                <div class="content-link flex flex-row my-4  ">
                    <p class=" font-semibold">Berikut link akses Infografisnya:</p>
                    <a href="
                   {{ $info->url }}
                    "
                        class=" ms-1 hover:text-blue-700 ">
                        {{ $info->url }}
                    </a>
                </div>

            </div>
        </div>

        @if (Auth::check())
            @if (Auth::user()->id == $info->user_id || Auth::user()->role == 'admin')
                @if (Auth::user()->status == 'active')
                    <div class="btn_edit_post">
                        <button onclick="location.href='{{ url('infografis/' . $info->slug . '/edit') }}'"
                            class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Edit</button>
                    </div>
                    <div class="btn_delete_post mt-2">
                        <button type="submit" data-modal-target="delete-modal{{$info->id}}" data-modal-toggle="delete-modal{{$info->id}}"
                        class="border border-gray-400 py-2 px-4 rounded w-full bg-red-600 text-white hover:bg-gray-400 hover:text-gray-600 hover:border-gray-700 transition">Delete</button>


                        @include('layouts.infografis.modal-detail')
                    </div>
                @endif
            @endif
        @else
        @endif


    @endsection
