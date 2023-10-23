@extends('welcome')
@section('title', '| Profile')
@section('main')


    <div class="bg-white">
        <h1 class="text-2xl font-semibold mb-4">Profil Setting</h1>

        <form method="POST" action="{{url('user/'.$users->slug.'/profile/settings/update')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" id="file_input" type="file" accept="image/*">
            </div>


            <div class="mb-4">
                <label for="nama_lengkap" class="block text-gray-700 font-semibold">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="name" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $data_user->name }}">
            </div>


            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-semibold">Alamat</label>
                <input type="text" id="alamat" name="addres" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200"  value="{{ $data_user->addres }}">
            </div>

            <div class="mb-4">
                <label for="kota" class="block text-gray-700 font-semibold">Kota</label>
                <input type="text" id="kota" name="city" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $data_user->city }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="{{ $data_user->email }}">
            </div>

            <button type="submit" class="w-full bg-red-500 text-white p-2 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-blue-200">Simpan Profile</button>
        </form>

    </div>
@endsection

