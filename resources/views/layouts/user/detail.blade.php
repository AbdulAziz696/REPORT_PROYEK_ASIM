@extends('welcome')

@section('title','Profile')
@section('main')

<div class="container object-contain">

    {{-- <div class="bg-[url('/img/img-login.png')] ">
    </div> --}}
    <div>
        <div class="bg-img">
            <img src="{{asset('img/img-login.png')}}" alt="" class="object-cover h-48 w-full">
        </div>
        <div class="card-img  text-white text-center -mt-10">
            

            @if (file_exists(public_path('storage/'.$user->image)))
    <!-- Gambar dari folder storage -->
    <img src="{{ asset('storage/'.$user->image) }}" alt="Gambar dari Storage" class="img-user rounded-full  w-24  h-24   border border-solid border-white-25 mx-auto">
@else
    <!-- Gambar dari folder image -->
    <img src="{{ asset('img/'.$user->image) }}" alt="Gambar dari Folder Image" class="img-user rounded-full  w-24  h-24   border border-solid border-white-25 mx-auto">
@endif
            
            {{-- <img src="{{ asset('storage/'.$user->image)}}" alt="" class="img-user rounded-full  w-24  h-24   border border-solid border-white-25 mx-auto">

           --}}
           

            
      </div>
      <h2 class="txt-username text-center">{{$user->name}}</h2>
    </div>


    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="portofolio-tab" data-tabs-target="#portofolio" type="button" role="tab" aria-controls="portofolio" aria-selected="false">Portofolio</button>
            </li>
        </ul>
    </div>


<div id="myTabContent">
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="mb-4">
            <label for="nama_lengkap" class="block text-gray-700 font-semibold">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $user->name }}" readonly>
        </div>
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 font-semibold">Alamat</label>
            <input type="text" id="alamat" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"  value="{{ $user->addres }}" readonly>
        </div>

        <div class="mb-4">
            <label for="kota" class="block text-gray-700 font-semibold">Kota</label>
            <input type="text" id="kota" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $user->city }}" readonly>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Email</label>
            <input type="email" id="email" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $user->email }}" readonly>
        </div>


        @if (Auth::check())
        @if (Auth::user()->id == $user->id)
        <a href="{{ url('user/'.auth()->user()->slug.'/profile/settings') }}" class="btn bg-blue-600 w-full text-white">Edit Profile</a>
        @endif
        @endif

    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <div class="container inline-flex flex-wrap justify-center ">

            @foreach ($posts as $i)
            <div class="card bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4 ">
                <div class="relative w-48 h-48 mx-8 -mt-12">
                    <img class="w-[200.40px] h-[200.40px] rounded-[19.66px] img-fluid" src="{{url('storage/' . $i->image) }}" />
                    {{-- <div
                        class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 translate-y-[-50%] w-24 h-24 rounded-full overflow-hidden">
                        {{-- <img src="img/img-login.png" alt="Profile" class="w-full h-full"> --}}
                    {{-- </div> --}}
                </div>
                <div class="mt-4 mx-8 justify-center">
                    <h1 class="font-bold text-xl text-black text-center">{{$i->title}}</h1>
                </div>
                <div class="mx-7 my-3">



                    <a href="{{url('post/'.$i->slug.'/detail')}}" class="btn border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail Aplikasi</a>



                </div>
            </div>

            @endforeach


            @if (Auth::check())
        @if (Auth::user()->id== $user->id)

        <a href="{{url('post/add')}}" class="btn bg-green-600 w-full text-white">Add project</a>
            @endif
            @endif
    </div>

    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="portofolio" role="tabpanel" aria-labelledby="portofolio-tab">
        
    

            
    </div>

</div>




{{-- <div class="inline-flex"> --}}

<div class="main inline-flex justify-center mx-auto md:container md:mx-auto">


</div>

</div>
</div>
{{-- </div> --}}




@endsection

