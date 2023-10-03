@extends('welcome')
@section('main')

    <div class="bg-white">
        <h1 class="text-2xl font-semibold mb-4">Profil Pengguna</h1>
        <div class="flex flex-col items-center justify-center mb-6">
            <div class="rounded-full overflow-hidden w-24 h-24 mb-2">
            <img src="/IMG/waifu.jpg" alt="Foto Profil" class="w-full h-full object-cover">
            </div>
            <input type="file" id="foto" class="hidden" accept=".png, .jpg, .jpeg">
            <label for="foto" class="cursor-pointer text-red-500 hover:text-red-700">Ganti Foto Profil</label>
        </div>
        <form>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-semibold">Username</label>
                <input type="text" id="username" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="contoh_username">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" id="password" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" placeholder="********">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-semibold">Alamat</label>
                <input type="text" id="alamat" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="Jl. Contoh No. 123">
            </div>
            <div class="mb-4">
                <label for="nama_lengkap" class="block text-gray-700 font-semibold">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="John Doe">
            </div>
            <div class="mb-4">
                <label for="kota" class="block text-gray-700 font-semibold">Kota</label>
                <input type="text" id="kota" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="Kota Contoh">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="contoh@email.com">
            </div>
            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 font-semibold">No. Telp</label>
                <input type="tel" id="no_telp" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-blue-200" value="123-456-789">
            </div>
            <button type="submit" class="w-full bg-red-500 text-white p-2 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-blue-200">Simpan Profil</button>
        </form>
    </div>
    @endsection

