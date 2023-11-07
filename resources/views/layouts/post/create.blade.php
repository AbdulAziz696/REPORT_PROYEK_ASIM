@extends('welcome')
@section('title','| Buat Post Baru')
@section('main')
    <div class="container m-3">


        <form method="POST" action="{{ url('post/add-post') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label font-semibold">Nama Projek</label>
                <input type="text" class="block flex-1  py-1.5 pl-1 placeholder:text-gray-300 focus:ring-1 sm:text-sm sm:leading-6 rounded-md " id="title" name="title" placeholder="Title...">
                @error('title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Konten</label>
                <textarea class="form-control rounded-md" id="content" name="content" placeholder="Lorem ipsum..."></textarea>
                @error('content')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label font-semibold">Gambar</label>
                <input type="file" class="form-control border border-1  rounded-md " name="image" accept="image/*">
                @error('image')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="url" class="form-label font-semibold">URL</label>
                <input type="text" class="form-control rounded-md " id="url" name="url" placeholder="https://example...">
                @error('url')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="made_by[]" class="form-label font-semibold block">Created By:</label>
                <div class="grid grid-cols-6">
                    @foreach($user as $user)
                    <div>
                        <input type="checkbox" name="made_by[]" value="{{ $user->id }}"> {{ $user->name }}<br>
                    </div>
                        @endforeach
                </div>
                @error('made_by[]')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-md px-3 py-3">Simpan</button>
        </form>

            <div class="bg"></div>
    </div>
@endsection
