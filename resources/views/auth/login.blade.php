<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="flex justify-between p-4 bg-white">
        <img src="/IMG/logo-telkomsat.png" alt="Left Logo" class="w-20 h-10">
        <img src="/IMG/logo-telkomsat.png" alt="Right Logo" class="w-20 h-10">
    </nav>

    <!-- Title "Asim" -->
    <div class="text-center mt-12">
        <h1 class="text-2xl md:text-4xl font-semibold text-red-500">Sistem Informasi Magang IT Telkomsat</h1>
    </div>


    <!-- Main Content -->
    <div class="flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2 lg:w-1/3 xl:w-1/4 animate-fadeIn mt-8 mx-4">
            <!-- Tambahkan mx-4 di sini -->
            <h1 class="text-2xl md:text-3xl font-semibold text-red-500 mb-2">Selamat Datang</h1>
            <p class="text-gray-600 mb-4">Silahkan masuk untuk melanjutkan</p>
            <form>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold">Username</label>
                    <input type="text" id="username"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-red-300"
                        placeholder="Enter your username">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password"
                        class="mt-1 p-2 border rounded w-full focus:ring focus:ring-red-300"
                        placeholder="Enter your password">
                </div>
                <button type="submit"
                    class="w-full bg-red-500 text-white p-2 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300">Login</button>
            </form>
        </div>
    </div>

</body>

</html>