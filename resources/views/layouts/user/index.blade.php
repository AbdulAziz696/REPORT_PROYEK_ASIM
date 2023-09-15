@extends('welcome')
@section('main')
<div class="container mx-auto my-5">
    <table id="myTable" class="display" style="width:100%">
        <div class="button flex justify-end my-3 ">
            <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" >add employee</button>
        </div>
        <thead>
            <tr>
                <th>Name</th>
                <th>image</th>
                <th>Position</th>
                <th>Age</th>
                <th>Project Qty</th>
                <th>Start date</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Paul Byrd</td>
                <td><img src="" alt="let's gooo"></td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010-06-09</td>
                {{-- <td>$725,000</td> --}}
            </tr>

    </table>
</div>
@endsection
