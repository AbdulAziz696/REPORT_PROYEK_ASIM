@extends('welcome')
@section('main')

<div class="container object-contain">

    {{-- <div class="bg-[url('/img/img-login.png')] ">
    </div> --}}
    <div>
        <div class="bg-img">
            <img src="img/img-login.png" alt="" class="object-cover h-48 w-full">
        </div>
        <div class="card-img  text-white text-center -mt-10">
            <img src="img/img-login.png" alt="" class="img-user rounded-full  h-24 img-fluid  border border-solid border-white-25 mx-auto">
      </div>
      <h2 class="txt-username text-center">Username</h2>
    </div>


<div class="border-b border-gray-200 dark:border-gray-700 my-3">
<ul class="flex flex-wrap -mb-px text-sm font-medium justify-center text-gray-500 dark:text-gray-400">
    <li class="mr-2">
        <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
            <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
            </svg>Profile
        </a>
    </li>
    <li class="mr-2">
        <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
            <svg class="w-4 h-4 mr-2 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
            </svg>Dashboard
        </a>
    </li>



</ul>
</div>
{{-- <div class="inline-flex"> --}}
<div class="main inline-flex justify-center mx-auto md:container md:mx-auto">
<div class="container inline-flex flex-wrap justify-center ">

@foreach ($posts as $i)
<div class="card bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4 ">
    <div class="relative w-48 h-48 mx-8 -mt-12">
        <img class="w-[200.40px] h-[200.40px] rounded-[19.66px]" src="{{url('storage/' . $i->image) }}" />
        {{-- <div
            class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 translate-y-[-50%] w-24 h-24 rounded-full overflow-hidden">
            {{-- <img src="img/img-login.png" alt="Profile" class="w-full h-full"> --}}
        {{-- </div> --}}
    </div>
    <div class="mt-4 mx-8 justify-center">
        <h1 class="font-bold text-xl text-black text-center">{{$i->title}}</h1>
    </div>
    <div class="mx-7 my-3">
        <button onclick="location.href='post/detail/{{$i->slug}}'"
            class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail Aplikasi</button>


    </div>
</div>

@endforeach

</div>

</div>
</div>
{{-- </div> --}}


@endsection

