@extends('welcome')
@section('title','| Intern List')
@section('main')


    <div class="container mx-auto my-3">
        <div class="button flex justify-end my-3 ">
            @if (Auth::check())
                @if (Auth::user()->role == 'admin')
                    @if (Auth::user()->status == true)
                        <a href="{{ url('/daftar') }}"
                            class="bg-blue-500 btn hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                            Add Employee
                        </a>
                    @endif
                @endif
            @else
            @endif

        </div>
        <table id="myTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th class=" text-center">Name</th>
                    <th class=" text-center">image</th>
                    <th class=" text-center">Position</th>
                    <th class=" text-center">Status</th>
                    <th class=" text-center">Project Qty</th>
                    <th class=" text-center">Start date</th>
                    <th class=" text-center">End date</th>
                    <th class=" text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $i)
                    <tr>

                        <td class=" text-center"><a href="{{ url('user/' . $i->slug . '/profile') }}">{{ $i->name }}</a></td>
                        <td class=" text-center">@if (file_exists(public_path('storage/'.$i->image)))
                            <!-- Gambar dari folder storage -->
                            <img src="{{ asset('storage/'.$i->image) }}" alt="Gambar dari Storage" class="img-user   w-20 h-20   border border-solid border-white-25 mx-auto">
                        @else
                            <!-- Gambar dari folder image -->
                            <img src="{{ asset('img/'.$i->image) }}" alt="Gambar dari Folder Image" class="img-user   w-20  h-20  border border-solid border-white-25 mx-auto">
                        @endif</td>
                        <td class=" text-center">{{ $i->role }}</td>
                        <td class=" text-center">{{ $i->status }}</td>
                        <td class=" text-center">{{ $i->posting->count() }}</td>
                        <td class=" text-center">{{ date('d M Y', strtotime($i->created_at)) }}</td>
                        <td class=" text-center">{{ date('d M Y', strtotime($i->updated_at)) }}</td>
                        <td class=" text-center">
                            @if (Auth::check())
                                @if (Auth::user()->role == 'admin')
                                    @if (Auth::user()->status == true)
                                        <div class="inline-flex">
                                            <button data-modal-target="edit-modal{{ $i->id }}"
                                                data-modal-toggle="edit-modal{{ $i->id }}"
                                                class="block text-white mx-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                edit
                                            </button>
                                           @include('layouts.user.modal')


                                                {{-- <form action="{{url("user/$i->id")}}" method="post">
                                    @method('DELETE')
                                    <button type="submit" class="btn border">delete</button>
                                </form> --}}

                                <button data-modal-target="popup-modal{{$i->id}}" data-modal-toggle="popup-modal{{$i->id}}" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                                    Delete Intern
                                  </button>

                                            @endif
                                        </div>
                                    @endif
                                    @else
                                        <p class="btn border text-center" readonly>view</p>
                                @endif


                        </td>


                    </tr>
                @endforeach

        </table>



    </div>






{{-- @include('layouts.user.modal') --}}

@endsection
