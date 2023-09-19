@extends('welcome')
@section('main')
    <div class=" card mx-5 my-5">
        <table id="myTable" class="display" style="width:100%">
            <div class=" flex justify-end my-3">
                <button
                    class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">add
                    employee</button>
            </div>
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

                <tr>
                    <td>Paul Byrd</td>
                    <td><img src="" alt="let's gooo"></td>
                    <td>
                        <select name="statuslaundry" id="laundry-status" class="status-laundry">
                            <option id="status1" value="siap diambil">SIAP DIAMBIL</option>
                            <option id="status2" value="proses">PROSES</option>
                            <option id="status3" value="sudahdiambil">SUDAH DIAMBIL</option>
                        </select>
                    </td>
                    <td>15</td>
                    <td>15</td>
                    <td>15-08-05</td>
                    <td>15-08-22</td>
                </tr>


        </table>
    </div>
@endsection
