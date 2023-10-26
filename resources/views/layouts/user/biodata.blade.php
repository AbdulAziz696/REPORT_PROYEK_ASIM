<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

      <!-- {{-- nomor --}} -->
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
 
    <div class="max-w-2xl mt-4 mx-auto rounded-lg shadow-md animate-fadeIn bg-white px-16 py-6">

        <div class=" mt-0 mb-3">
            <h1 class="text-black font-bold">Buat Akun Baru</h1>
        <h4 class="text-gray-400">Mohon isi dengan lengkap</h4>
        </div>

        <form action="{{ route('registerstudent') }}" method="POST">
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Lengkap</label>
                    <input type="text" id="first_name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" required>
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Panggilan</label>
                    <input type="text" id="last_name" name="addres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aziz" required>
                </div>
                <div>
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tempat Lahir</label>
                    <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jakarta" required>
                </div>
                <div>
                    <label for="birthplace" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Lahir</label>
                    <input type="date" id="birthplace" name="birthplace" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <div>
                    <label for="internship_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Magang</label>
                    <input type="date" id="internship_date" name="internship_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                
                <div>
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Usia Waktu Magang</label>
                    <input type="number" id="age" name="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="16" required>
                </div>
                <div>
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lama Waktu Magang</label>
                    <input type="number" id="age" name="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" required>
                </div>
                <div>
                    <label for="school_major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jurusan Sekolah</label>
                    <input type="text" id="school_major" name="school_major" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rpl (Web Dev)" required>
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Lengkap</label>
                    <input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16166" required>
                </div>
                <div>
                    <label for="school_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Sekolah/Kampus</label>
                    <input type="text" id="school_name" name="school_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="IDN Boarding School" required>
                </div>
                <div>
                    <label for="school_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Sekolah/Kampus</label>
                    <input type="text" id="school_address" name="school_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Raya Dayeuh, Sukanegara, Kec. Jonggol, Kabupaten Bogor, Jawa Barat 16830" required>
                </div>
                
                <div>
                    <label for="hobby" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hobi</label>
                    <input type="text" id="hobby" name="hobby" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bermain Futsal" required>
                </div>

                <div>
                    <label for="awards" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penghargaan</label>
                    <input type="text" id="awards" name="awards" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" required>
                </div>
                <div>
                    <label for="certifications" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sertifikasi</label>
                    <input type="text" id="certifications" name="certifications" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rpl (Web Dev)" required>
                </div>
                <div>
                    <label for="special_skills" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keahlian Khusus</label>
                    <input type="text" id="special_skills" name="special_skills" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16166" required>
                </div>
                <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. HP</label>
                    <input type="number" id="phone_number" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="IDN Boarding School" required>
                </div>
                <div>
                    <label for="guardian_phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. HP Wali</label>
                    <input type="number" id="guardian_phone_number" name="guardian_phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Raya Dayeuh, Sukanegara, Kec. Jonggol, Kabupaten Bogor, Jawa Barat 16830" required>
                </div>
                
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bermain Futsal" required>
                </div>
            </div>
            <div>
                <label for="internship_expectations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harapan Magang</label>
                <textarea id="internship_expectations" name="internship_expectations" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            </div>
            

            <div class="text-right mt-4">

                <button type="button" class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-700">Submit Form</button>
                
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- {{-- <script>
        $('.phone').mask('+62 000-0000-00000');
    </script> --}} -->

</body>
</html>
