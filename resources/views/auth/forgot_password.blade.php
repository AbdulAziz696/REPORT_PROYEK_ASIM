<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/3 lg:w-1/4">
        <h1 class="text-2xl font-semibold mb-4">Lupa Kata Sandi</h1>
        <form>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" class="mt-1 p-2 border rounded w-full focus:ring focus:ring-red-400" placeholder="Masukkan alamat email Anda">
            </div>
            <button type="submit" class="w-full bg-red-500 text-white p-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-500">Reset Kata Sandi</button>
        </form>
        <p class="mt-4 text-gray-600 text-sm">Cek email Anda untuk instruksi selanjutnya.</p>
    </div>
</body>
</html>
