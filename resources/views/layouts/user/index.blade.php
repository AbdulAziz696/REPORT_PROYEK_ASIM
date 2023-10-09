@extends('welcome')
@section('main')
    <div class="container mx-auto my-5">
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
                    <th>Name</th>
                    <th>image</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Project Qty</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $i)
                    <tr>

                        <td><a href="{{ url('user/' . $i->slug . '/detail') }}">{{ $i->name }}</a></td>
                        <td><img src="{{ asset('img/' . $i->image) }}" alt="let's gooo"></td>
                        <td>{{ $i->role }}</td>
                        <td>{{ $i->status }}</td>
                        <td>{{ $i->posting->count() }}</td>
                        <td>{{ date('d M Y', strtotime($i->created_at)) }}</td>
                        <td>{{ date('d M Y', strtotime($i->updated_at)) }}</td>
                        <td>
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

                                            @if (Auth::user()->id == true)
                                                {{-- <form action="{{url("user/$i->id")}}" method="post">
                                    @method('DELETE')
                                    <button type="submit" class="btn border">delete</button>
                                </form> --}}

                                                <a href="#" class="buttondelete btn border bg-red-600 text-white"
                                                    data-id="{{ $i->id }}"
                                                    data-nama="{{ $i->name }}">Delete</a>
                                            @endif
                                        </div>
                                    @endif
                                @endif
                            @else
                                <p class="btn border" readonly>view</p>
                            @endif

                        </td>


                    </tr>
                @endforeach

        </table>

        <a href="#" class="buttondelete btn border bg-red-600 text-white"
                                                    data-id="{{ $i->id }}"
                                                    data-nama="{{ $i->name }}">Delete</a>

    </div>






{{-- @include('layouts.user.modal') --}}

@endsection
