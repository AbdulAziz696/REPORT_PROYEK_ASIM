@extends('welcome')
@section('title', '| Project List')

@section('main')


    <div class="container mx-auto my-3 -z-50">
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
                <td><img src="{{asset('storage/' . trim($i->image)) }}" alt="" class=" w-32"></td>
                <td><a href="{{url('post/'.$i->slug.'/detail')}}">{{$i->title}}</a></td>
                <td>{{$i->postwriter->name}}</td>

                <td>
                    @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        @if (Auth::user()->status == true)
                    <div class="inline-flex">

                        <button data-modal-target="popup-modal-post{{$i->id}}" data-modal-toggle="popup-modal-post{{$i->id}}" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                            Delete Post
                          </button>
@include('layouts.post.modal')

                    </div>
                    @endif
                    @else
                    <p class="btn border text-center" readonly>view</p>
                    @endif
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    </div>


    {{-- </div> --}}
@endsection
