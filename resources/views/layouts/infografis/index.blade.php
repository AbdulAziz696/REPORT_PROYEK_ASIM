@extends('welcome')
@section('title', '| Infografis List')

@section('main')


    <div class="container mx-auto my-3 -z-50">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th class=" text-center">Image</th>
                    <th class=" text-center">Projek's Title</th>
                    <th class=" text-center">Postwriter</th>
                    <th class=" text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info as $i)
                    <tr>
                        <td class=" text-center"><a href="{{ asset('storage/' . trim($i->image)) }}" target="_blank"><img src="{{ asset('storage/' . trim($i->image)) }}" alt=""
                                class=" w-32"></a></td>
                        <td class=" text-center"><a
                                href="{{ url('infografis/' . $i->slug . '/detail') }}">{{ $i->title }}</a></td>
                        <td class=" text-center">{{ $i->infosher->name }}</td>

                        <td class=" text-center">

                            @if (Auth::check())
                                @if (Auth::user()->role == 'admin' || Auth::user()->id == $i->infosher->id  )
                                    @if (Auth::user()->status == 'active')
                                        <div class="inline-flex ">
                                            <a href="{{ url('infografis/' . $i->slug . '/detail') }}"  class="btn mx-1 border text-center hover:bg-slate-500 hover:text-white" readonly>view</a>
                                            <button data-modal-target="delete-modal{{$i->id}}"
                                                data-modal-toggle="delete-modal{{ $i->id }}"
                                                class=" mx-1 block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                type="button">
                                                Delete Infografis
                                            </button>
                                            @include('layouts.infografis.modal')

                                        </div>
                                    @endif
                                @else
                                    <a href="{{ url('infografis/' . $i->slug . '/detail') }}"  class="btn border text-center hover:bg-slate-500 hover:text-white" readonly>view</a>
                                @endif
                            @else
                                <a href="{{ url('infografis/' . $i->slug . '/detail') }}" class="btn border text-center hover:bg-slate-500 hover:text-white" readonly>view</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    {{-- </div> --}}
@endsection
