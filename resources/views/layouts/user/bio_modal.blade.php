<!-- Main modal -->
<div id="bio-modal{{ $user->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="bio-modal{{ $user->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Add your Profile</h3>
                <form action="{{ url('user/'.$user.'/profile/add') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-6 lg:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Panggilan</label>
                            <input type="text" id="first_name" name="nama_panggilan ?? ''" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" >
                            @error('nama_pangggilan')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tempat Lahir</label>
                            <input type="text" id="city" name="tempat_lahir ?? ''" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jakarta" >
                            @error('tempat_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="birthplace" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Lahir</label>
                            <input type="date" id="birthplace" name="tanggal_lahir ?? ''" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00/00/0000" >
                            @error('tanggal_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                            <div>
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Lengkap</label>
                                <input type="text" id="address" name="alamat_domisili" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16166" >
                                @error('alamat_domisili')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lama Waktu Magang</label>
                            <input type="number" id="age" name="lama_waktu_magang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" >
                            @error('lama_waktu_magang')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="school_major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jurusan Sekolah</label>
                            <input type="text" id="school_major" name="jurusan_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rpl (Web Dev)" >
                            @error('jurusan_sekolah')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="school_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Asal Sekolah/Kampus</label>
                            <input type="text" id="school_name" name="nama_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="IDN Boarding School" >
                            @error('nama_sekolah')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="school_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Sekolah/Kampus</label>
                            <input type="text" id="school_address" name="alamat_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Raya Dayeuh, Sukanegara, Kec. Jonggol, Kabupaten Bogor, Jawa Barat 16830" >
                            @error('alamat_sekolah')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hobby" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hobi</label>
                            <input type="text" id="hobby" name="hobi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bermain Futsal" >
                            @error('hobi')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="awards" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penghargaan</label>
                            <input type="text" id="awards" name="penghargaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" >
                            @error('penghargaan')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="certifications" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sertifikasi</label>
                            <input type="text" id="certifications" name="sertifikasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rpl (Web Dev)" >
                            @error('serifikasi')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="special_skills" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keahlian Khusus</label>
                            <input type="text" id="special_skills" name="keahlian_khusus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16166" >
                            @error('keahlian_khusus')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. HP</label>
                            <input type="number" id="phone_number" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="IDN Boarding School" >
                            @error('no_hp')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="guardian_phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. HP Wali</label>
                            <input type="number" id="guardian_phone_number" name="no_hp_wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Raya Dayeuh, Sukanegara, Kec. Jonggol, Kabupaten Bogor, Jawa Barat 16830" >
                            @error('no_hp_wali')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="internship_expectations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harapan Magang</label>
                        <textarea id="internship_expectations" name="harapan_magang" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
                        @error('harapan_magang')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="text-right mt-4">

                        <button type="submit" class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-700">Submit Form</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Main modal -->
<div id="update-bio-modal{{ $user->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="update-bio-modal{{ $user->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Edit your Profile</h3>
                <form action="{{ url('user/'.optional(auth()->user()->profile)->id.'/profile/edit')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-6 lg:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Panggilan</label>
                            <input type="text" id="first_name" name="nama_panggilan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz" value="{{ $user->profile->nama_panggilan ?? '-' }}" >
                            @error('nama_pangggilan')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tempat Lahir</label>
                            <input type="text" id="city" name="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jakarta" value="{{ $user->profile->tempat_lahir ?? '-'}}" >
                            @error('tempat_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="birthplace" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Lahir</label>
                            <input type="date" id="birthplace" name="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="{{ $user->profile->tanggal_lahir ?? '-'}}" >
                            @error('tanggal_lahir')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div>
                            <label for="internship_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Magang</label>
                            <input type="date" id="internship_date" name="waktu_magang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" >
                            @error('waktu_magang')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div>
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Lengkap</label>
                                <input type="text" id="address" name="alamat_domisili" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16166" value="{{ $user->profile->alamat_domisili ?? '-'}}" >
                                @error('alamat_domisili')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lama Waktu Magang</label>
                            <input type="number" id="age" name="lama_waktu_magang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="{{ $user->profile->lama_waktu_magang ?? '-'}}" >
                            @error('lama_waktu_magang')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="school_major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jurusan Sekolah</label>
                            <input type="text" id="school_major" name="jurusan_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rpl (Web Dev)" value="{{ $user->profile->jurusan_sekolah ?? '-'}}"  >
                            @error('jurusan_sekolah')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="school_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Asal Sekolah/Kampus</label>
                            <input type="text" id="school_name" name="nama_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="IDN Boarding School" value="{{ $user->profile->nama_sekolah ?? '-'}}" >
                            @error('nama_sekolah')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="school_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Sekolah/Kampus</label>
                            <input type="text" id="school_address" name="alamat_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Raya Dayeuh, Sukanegara, Kec. Jonggol, Kabupaten Bogor, Jawa Barat 16830" value="{{ $user->profile->alamat_sekolah ?? '-'}}" >
                            @error('alamat_sekolah')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hobby" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hobi</label>
                            <input type="text" id="hobby" name="hobi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bermain Futsal"
                            value="{{ $user->profile->hobi ?? '-'}}" >
                            @error('hobi')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="awards" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penghargaan</label>
                            <input type="text" id="awards" name="penghargaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Aziz"  value="{{ $user->profile->penghargaan ?? '-'}}" >
                            @error('penghargaan')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="certifications" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sertifikasi</label>
                            <input type="text" id="certifications" name="sertifikasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rpl (Web Dev)" value="{{ $user->profile->sertifikasi ?? '-'}}" >
                            @error('sertifikasi')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="special_skills" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keahlian Khusus</label>
                            <input type="text" id="special_skills" name="keahlian_khusus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16166" value="{{ $user->profile->keahlian_khusus ?? '-'}}"  >
                            @error('keahlian_khusus')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. HP</label>
                            <input type="number" id="phone_number" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="IDN Boarding School" value="{{ $user->profile->no_hp ?? '-'}}" >
                            @error('no_hp')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="guardian_phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. HP Wali</label>
                            <input type="number" id="guardian_phone_number" name="no_hp_wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jl. Raya Dayeuh, Sukanegara, Kec. Jonggol, Kabupaten Bogor, Jawa Barat 16830" value="{{ $user->profile->no_hp_wali ?? '-'}}" >
                            @error('no_hp_wali')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="internship_expectations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harapan Magang</label>
                        <textarea id="internship_expectations" name="harapan_magang" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >{{ $user->profile->harapan_magang ?? '-'}}</textarea>
                        @error('harapan_magang')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="text-right mt-4">

                        <button type="submit" class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-700">Submit Form</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<!-- Main modal -->
<div id="porto-modal{{ $user->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="porto-modal{{ $user->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <form action="{{ url('user/'.$user.'/portfolio/add') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class=" gap-6 mb-6 ">
                        <div>

                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Add your Portofolio</label>
                            <input  type="file" id="first_name" name="folder" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-grey-900 dark:focus:ring-blue-500 dark:focus:border-blue-500 " accept=
                            "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                            text/plain, application/pdf "  >
                            @error('folder')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>



                    <div class=" mt-4 text-center max-w-full ">

                        <button type="submit" class=" inline-block text-center py-2.5  font-medium  text-white focus:outline-none w-full bg-red-500 rounded-lg border border-gray-200 hover:bg-red-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-red-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-700">Submit Form</button>

                    </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
