@extends('welcome')
@section('title','| Post Detail')

@section('main')

    <div class=" mx-5 my-3 justify-start">

        <div class="hearder">
        <div class="title my-auto">
            <p class="leading-normal font-semibold text-3xl ">
                {{ $posts->title }}
            </p>
                <p class="">
                    {{ date('d M Y H:i', strtotime($posts->created_at)) }}
                </p>
            </div>

                <div class="profile flex flex-row justify-start ms-0">
                    <img src="{{asset('img/'. $posts->postwriter->image)}}
                    " alt=""class="  rounded-circle img-fluid border border-solid border-white-250 w-10 h-10 me-2">
                    <div class="flex flex-col align-item justify-center">
                        <p class="text-xs font-semibold">{{$posts->postwriter->name}}</p>
                        <p class="text-xs">{{$posts->postwriter->role}}</p>

                    </div>
                </div>
                <div class="shape">
                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="mt-[10px] xl:w-[88px]  xl:h-[8px] h-[4px] rounded-md" viewBox="0 0 88 8"
                    fill="none">
                    <path d="M4 4H84" stroke="#E30052" stroke-width="10" class="w-fit"
                        stroke-linecap="round">
                    </path>
                </svg>
                </div>
        </div>
        <div class="post my-3 mx-auto ">
            <div class="content ">
                <div class="img">
                    <img src=" {{ asset('storage/' . $posts->image) }}" alt="" class=" max-w-screen-lg max-h-96 w-full h-96 img-fluid  ">
                </div>
                <div class="content-text mt-4">
                    <p class=" font-semibold">Deskripsi</p>
                    <p>
                        {!! $posts->content !!}

                    </p>
                </div>
                <div class="content-link flex flex-row mt-4 ">
                    <p class=" font-semibold">Berikut link akses projeknya:</p>
                   <a href="
                   {{$posts->url}}
                    " class=" ms-1 hover:text-blue-700 ">
                    {{$posts->url}}
                </a>
                </div>
            </div>
        </div>

        @if (Auth::check())
        @if (Auth::user()->id== $posts->user_id)
        @if (Auth::user()->status == true)

        <div class="btn_edit_post">
            <button onclick="location.href='{{ url('post/'.$posts->slug.'/edit') }}'"
                class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Edit</button>
        </div>
        <div class="btn_delete_post">
            <form action="{{ url("post/$posts->id")}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit"  class="border border-gray-400 py-2 px-4 rounded w-full bg-red-600 text-white hover:bg-gray-400 hover:text-gray-600 hover:border-gray-700 transition">delete</button>
            </form>
        </div>
        @endif
        @endif

        @else

        @endif


    @endsection