<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

      {{-- nomor --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body class="bg-gray-100">

    <nav class="flex justify-between p-4 bg-white">
        <img src="/IMG/logo-telkomsat.png" alt="Left Logo" class="w-20 h-10">
        <img src="/IMG/logo-telkomsat.png" alt="Right Logo" class="w-20 h-10">
    </nav>

    <!-- Title "Asim" -->
    <div class="text-center mt-12">
        <h1 class="text-2xl md:text-4xl font-semibold text-red-500">Sistem Informasi Magang IT Telkomsat</h1>
    </div>
 
    <div class="max-w-2xl mt-4 mx-auto rounded-lg shadow-md animate-fadeIn bg-white p-16">

        <div class=" mt-0 mb-3">
            <h1 class="text-black font-bold">Buat Akun Baru</h1>
        <h4 class="text-gray-400">Mohon isi dengan lengkap</h4>
        </div>

        <form action="{{ route('registerstudent') }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Lengkap</label>
                    <input type="text" id="first_name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" required>
                    @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Lengkap</label>
                    <input type="text" id="last_name" name="addres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Gedung Perkantoran ABC, Lantai 5, Suite 567" required>
                    @error('addres')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div>
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kota</label>
                    <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jakarta" required>
                    @error('city')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input type="email" id="website" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="johndoe@gmail.com" required>
                    @error('email')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                {{-- <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No Telp</label>
                    <input type="text" id="phone" name="phone" class="form-control phone bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+62 000-0000-00000" pattern="[1-9]{2}-[1-9]{2}-[0-9]{3}" required>
                    @error('phone')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                    
                </div> --}}
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required>
                    @error('password')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                
                <div>
                    <label for="confirmPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Konfirmasi Password</label>
                    <input type="password" id="confirmPassword" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required>
                    <input type="checkbox" id="showPassword" class="mt-2">
                    <label for="showPassword" class="text-gray-700 ml-2 cursor-pointer select-none">Show Password</label>
                </div>
            </div>
            <button type="submit" class="w-full bg-red-500 text-white p-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring focus:ring-blue-500">Daftar Akun</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script>
        $('.phone').mask('+62 000-0000-00000');
    </script> --}}

<script>
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const showPasswordCheckbox = document.getElementById("showPassword");

    showPasswordCheckbox.addEventListener("change", function () {
        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
            confirmPasswordInput.type = "text";
        } else {
            passwordInput.type = "password";
            confirmPasswordInput.type = "password";
        }
    });
</script>
</body>
</html>
