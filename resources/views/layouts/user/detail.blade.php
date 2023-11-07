@extends('welcome')

@section('title','| Profile')
@section('main')

    <div class="container object-contain">


        <div>
            <div class="bg-img">
                <img src="{{ asset('img/img-login.png') }}" alt="" class="object-cover h-48 w-full">
            </div>
            <div class="card-img  text-white text-center -mt-10">


                @if (file_exists(public_path('storage/' . $user->image)))
                    <!-- Gambar dari folder storage -->
                    <img src="{{ asset('storage/' . $user->image) }}" alt="Gambar dari Storage"
                        class="img-user rounded-full  w-24  h-24   border border-solid border-white-25 mx-auto">
                @else
                    <!-- Gambar dari folder image -->
                    <img src="{{ asset('img/' . $user->image) }}" alt="Gambar dari Folder Image"
                        class="img-user rounded-full  w-24  h-24   border border-solid border-white-25 mx-auto">
                @endif
            </div>
            <h2 class="txt-username text-center">{{ $user->name }}</h2>
        </div>


        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Dashboard</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                        aria-controls="contacts" aria-selected="false">Infografis</button>
                </li>
            </ul>
        </div>


        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">


                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-gray-700 font-semibold">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $user->name }}"
                        readonly>
                </div>
                <div class="mb-4">
                    <label for="panggilan" class="block text-gray-700 font-semibold">Panggilan</label>
                    <input type="text" id="panggilan"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"
                        value="{{ $user->profile->nama_panggilan ?? '-' }}" readonly>

                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" id="email"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $user->email }}"
                        readonly>
                </div>


                @if (Auth::check() )
                @if (Auth::user()->id == $user->id || Auth::user()->role=='admin')
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 font-semibold">Alamat</label>
                    <input type="text" id="alamat"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"
                        value="{{ $user->profile->alamat_domisili ?? '-' }}" readonly>
                </div>


                <div class="mb-4">
                    <label for="tempat_lahir" class="block text-gray-700 font-semibold">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"
                        value="{{ $user->profile->tempat_lahir ?? '-' }}" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-gray-700 font-semibold">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"
                        value="{{ $user->profile->tanggal_lahir ?? '-' }}" required>
                </div>
                <div class="mb-4">
                    <label for="no_hp" class="block text-gray-700 font-semibold">No. HP</label>
                    <input type="text" id="no_hp"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"
                        value="{{ $user->profile->no_hp ?? '-' }}" required>
                </div>
                <div class="mb-4">
                    <label for="no_hp_wali" class="block text-gray-700 font-semibold">No. HP Wali</label>
                    <input type="text" id="no_hp_wali"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"
                        value="{{ $user->profile->no_hp_wali ?? '-' }}" required>
                </div>
                <div class="mb-4">
                    <label for="harapan_magang" class="block text-gray-700 font-semibold">Harapan Magang</label>
                    <textarea id="harapan_magang" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" rows="4"
                        readonly>"{{ $user->profile->harapan_magang ?? '-' }}"</textarea>
                </div>
                @else
                @endif
                @endif

                @if (empty($user->portofolio))
                    @else
                    <div class="mb-4">
                        <a href="{{ asset('storage/' . optional(auth()->user()->portofolio)->folder) }}" target="_blank"
                        class="btn bg-green-600 hover:bg-green-700 block w-full text-white">Download My Portfolio Here</a>

                    </div>

                    @endif


                @if (Auth::check())
                    @if (Auth::user()->id == $user->id)
                        @if (Auth::user()->status == 'active')
                        @if (optional($user->portofolio)->user_id == auth()->user()->id)
                        <button data-modal-target="update-porto-modal{{ $user->id }}"
                            data-modal-toggle="update-porto-modal{{ $user->id }}"
                            class="btn block w-full text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Change Portofolio
                        </button>
                        @else
                        <button data-modal-target="porto-modal{{ $user->id }}"
                            data-modal-toggle="porto-modal{{ $user->id }}"
                            class="btn block w-full text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Add Portofolio
                        </button>
                            @endif

                            @if (optional($user->profile)->user_id == auth()->user()->id)
                                <button data-modal-target="update-bio-modal{{ $user->id }}"
                                    data-modal-toggle="update-bio-modal{{ $user->id }}"
                                    class="btn block w-full text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Edit Profile
                                </button>
                                @include('layouts.user.bio_modal')
                            @else
                                <button data-modal-target="bio-modal{{ $user->id }}"
                                    data-modal-toggle="bio-modal{{ $user->id }}"
                                    class="btn block w-full text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Add Profile
                                </button>
                                @include('layouts.user.bio_modal')
                            @endif
                        @else
                        @endif

                    @endif
                @endif

            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <div class="container inline-flex flex-wrap justify-center ">

                    @foreach ($posts as $i)
                        <div class="card bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4 ">
                            <div class="relative w-48 h-48 mx-8 -mt-12">
                                <img class=" object-contain w-[200.40px] h-[200.40px] rounded-[19.66px] img-fluid"
                                    src="{{ url('storage/' . $i->image) }}" />

                            </div>
                            <div class="mt-4 mx-8 justify-center">
                                <h1 class="font-bold text-xl text-black text-center">{{ $i->title }}</h1>
                            </div>
                            <div class="mx-7 my-3">



                                <a href="{{ url('post/' . $i->slug . '/detail') }}"
                                    class="btn border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail
                                    Aplikasi</a>



                            </div>
                        </div>
                    @endforeach


                    @if (Auth::check())
                        @if (Auth::user()->id == $user->id)
                        @if (Auth::user()->status == 'active')
                            <a href="{{ url('post/add') }}" class="btn bg-green-600 w-full text-white">Add project</a>
                        @endif
                        @endif
                    @endif

                </div>


            </div>


            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                aria-labelledby="contacts-tab">
                <div class="container inline-flex flex-wrap justify-center ">

                    @foreach ($info as $i)
                        <div class="card bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4 ">
                            <div class="relative w-48 h-48 mx-8 -mt-12">
                                <img class=" object-contain w-[200.40px] h-[200.40px] rounded-[19.66px] img-fluid"
                                    src="{{ url('storage/' . $i->image) }}" />
                                {{-- <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 translate-y-[-50%] w-24 h-24 rounded-full overflow-hidden">
                        {{-- <img src="img/img-login.png" alt="Profile" class="w-full h-full"> --}}
                                {{-- </div> --}}
                            </div>
                            <div class="mt-4 mx-8 justify-center">
                                <h1 class="font-bold text-xl text-black text-center">{{ $i->title }}</h1>
                            </div>
                            <div class="mx-7 my-3">



                                <a href="{{ url('infografis/' . $i->slug . '/detail') }}"
                                    class="btn border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail
                                    Aplikasi</a>



                            </div>
                        </div>
                    @endforeach


                    @if (Auth::check())
                        @if (Auth::user()->id == $user->id)
                        @if (Auth::user()->status == 'active')
                            <a href="{{ url('infografis/add') }}" class="btn bg-green-600 w-full text-white">Add Infografis</a>
                            @else
                        @endif
                        @endif
                    @endif

                </div>


            </div>






        </div>
    </div>

    {{-- </div> --}}




@endsection
