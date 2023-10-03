@extends('welcome')
@section('main')
{{--
<form>
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>
<div class="main inline-flex justify-center mx-auto md:container md:mx-auto">
    <div class="container inline-flex flex-wrap justify-left ">

@foreach ($posts as $i)

    <div class=" bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4">
        <div class=" w-38 h-38 mx-8 -mt-12">
            <img class="w-[200.40px] h-[200.40px] rounded-[19.66px]" src=" {{ asset('storage/' . $i->image) }}" />
            {{-- <div
                class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 translate-y-[-50%] w-24 h-24 rounded-full overflow-hidden">
                {{-- <img src="img/img-login.png" alt="Profile" class="w-full h-full"> --}}
            {{-- </div> --}}
        {{-- </div>
        <div class="mt-4 mx-8 justify-center">
            <h1 class="font-bold text-xl text-black text-center">{{$i->title}}</h1>
        </div>
        <div class="mx-7 my-3">
            <button onclick="location.href='post/{{$i->slug }}/detail'"
                class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail Aplikasi</button>
        </div>
    </div>

    @endforeach




    {{-- <div id="tab1" class="main-content__list">
    @foreach ($prosesLaundry as $pl)
    <div class="main-content__card">
        <h2 class="card-number">{{ $loop->iteration }}</h2>

        <div class="card-container">
            <div class="card-container__left">
                <img src="img/laundry.png" alt="">
                <div class="card-container__left-text">
                    <div class="text-header">
                        <h2>{{ $pl->name }}</h2>
                        <h5>{{ \Carbon\Carbon::parse($pl->tanggal)->format('d-M-Y') }}</h5>
                    </div>
                    <h5>Type : {{ $pl->typelaundry }}</h5>
                </div>
            </div>
            <div class="card-container__right">
                <div class="card-container__right-status-proses">
                    {{ $pl->statuslaundry }}
                </div>
                <h3>{{ $pl->jenislaundry }}</h3>
            </div>
        </div>

    </div>
    @endforeach
    </div> --}}
    {{-- <div id="tab1" class="main-content__list">
    {{-- @foreach ($prosesLaundry as $pl) --}}

    {{-- </div> --}}

    {{-- </div>
    </div> --}}

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nama Projek</th>
                <th>Postwriter</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $i)
            <tr>
                <td><img src="{{asset('storage/' . $i->image) }}" alt="" class=" w-30"></td>
                <td><a href="{{url('post/'.$i->slug.'/detail')}}">{{$i->title}}</a></td>
                <td>{{$i->postwriter->name}}</td>
                <td>
                    <div class="inline-flex">

                        <button data-modal-target="authentication-modal{{$i->id}}" data-modal-toggle="authentication-modal{{$i->id}}" class="block text-white mx-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            edit
                          </button>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="btn_create_post">
        <button onclick="location.href='{{ url('post/add') }}'"
            class="border border-gray-400 py-2 px-4 rounded w-full
            bg-green-500 text-white hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Add</button>
    </div>
    {{-- </div> --}}
@endsection
