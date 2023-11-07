@extends('welcome')
@section('title', '| Home')
@section('main')

 <!-- Content header -->


  <!-- Content -->
  <div class="mt-2">
    <!-- State cards -->
    <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-2">
      <!-- Value card -->
      <div class="border border-gray-400 flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
        <div>
          <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
          >
            Projects
          </h6>
          <span class="text-xl font-semibold">{{$posts->count()}}</span>
          {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
            +4.4%
          </span> --}}
        </div>
        <div class=" ">

          <i class="uil uil-clipboard-notes text-gray-300 text-6xl "></i>
              </div>
      </div>

      <!-- Users card -->
      <div class="border border-gray-400 flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker md">
        <div>
          <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
          >
            Users
          </h6>
          <span class="text-xl font-semibold">{{$users->count()}}</span>
          {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
            +2.6%
          </span> --}}
        </div>
        <div>
          <span>
            <svg
              class="w-12 h-12 text-gray-300 dark:text-primary-dark"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
              />
            </svg>
          </span>
        </div>
      </div>
  </div>
  </div>

  <div class="main  justify-center -mx-24 md:container md:mx-auto">
    <div class="container grid lg:grid-cols-3 sm:grid-cols-2 justify-left ">

@foreach ($posts->take(6) as $i)

    <div class=" bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4 ">
        <div class=" w-38 h-38 mx-8 -mt-12 flex justify-center">
            <img class="w-[200.40px] h-[200.40px] rounded-[19.66px]" src=" {{ asset('storage/' . $i->image) }}" />

 </div>
        <div class="mt-4 mx-8 justify-center">
            <h1 class="font-bold text-xl text-black text-center">{{$i->title}}</h1>
        </div>
        <div class="mx-7 my-3">
            <button onclick="location.href='post/{{$i->slug }}/detail'"
                class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail Aplikasi</button>
        </div>
    </div>

    @endforeach
  </div>

    @if ($posts->count() > 6)

        <div class=" relative block w-full my-2 col-span-full ">
            <a class=" absolute  btn block bg-blue-600 text-white w-full  top-50 start-50 translate-middle" id="showAllPost">Show All Posts</a>
        </div>

        <div id="hiddenPost" style="display: none;" class="grid grid-cols-3 justify-left " >
            @foreach ($posts->skip(6) as $i)
            <div class=" bg-white rounded-lg border border-gray-300 mt-16 mx-4 mb-4  ">
                <div class=" w-38 h-38 mx-8 -mt-12 flex justify-center">
                    <img class="w-[200.40px] h-[200.40px] rounded-[19.66px]" src=" {{ asset('storage/' . $i->image) }}" />

         </div>
                <div class="mt-4 mx-8 justify-center">
                    <h1 class="font-bold text-xl text-black text-center">{{$i->title}}</h1>
                </div>
                <div class="mx-7 my-3">
                    <button onclick="location.href='post/{{$i->slug }}/detail'"
                        class="border border-gray-400 py-2 px-4 rounded w-full hover:bg-gray-100 hover:text-gray-600 hover:border-gray-700 transition">Detail Aplikasi</button>
                </div>
            </div>
            @endforeach
        </div>
@endif



        </div>

    @endsection
