@extends('welcome')
@section('main')
<div class=" card mx-5 my-5">
    <table id="myTable" class="display" style="width:100%">
        <div class=" flex justify-end my-3">
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
                <td>
                    <li class="dropdown">
                        <a href="
                        {{-- {{ url('products') }} --}}
                        "> </a>

                        <i class="fa fa-angle-down dropdown-trigger"></i>

                        <ul class="dropdown-menu">
                            {{-- @foreach ($categories as $i) --}}

                            <li><a
                                    href="
                                {{-- {{ url('/bumbu-basah') }} --}}
                                ">Bumbu
                                    Basah</a></li>

                            <li><a
                                    href="
                                {{-- {{ url('/bumbu-kering') }} --}}
                                ">Bumbu
                                    Kering</a></li>

                            <li><a
                                    href="
                                {{-- {{ url('/bumbu-pelengkap') }} --}}
                                ">Bumbu
                                    Pelengkap</a></li>

                            {{-- @endforeach --}}

                        </ul>
                    </li>
            </tr>


    </table>
</div>
@endsection
