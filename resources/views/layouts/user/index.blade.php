@extends('welcome')
@section('main')
<div class="container mx-auto my-5">
    <div class="button flex justify-end my-3 ">
        @if (Auth::check())
        @if (Auth::user()->role == 'admin')
        @if (Auth::user()->status == true)

        <a href="{{url('/daftar')}}" class="bg-blue-500 btn hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
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
                <th>Age</th>
                <th>Project Qty</th>
                <th>Start date</th>
                <th>End date</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $i)
            <tr>

                <td><a href="{{url('user/'.$i->slug.'/detail')}}">{{$i->name}}</a></td>
                <td><img src="{{asset('img/'.$i->image)}}" alt="let's gooo"></td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>{{$i->created_at}}</td>
                <td>2010-06-09</td>
                {{-- <td>$725,000</td> --}}


            </tr>
            @endforeach

    </table>
</div>
@endsection
