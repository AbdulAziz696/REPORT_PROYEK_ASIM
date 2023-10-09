@extends('welcome')
@section('main')
    <div class="container">


        <p class="my-3 font-bold text-2xl">Edit Post</p>

        <form method="post" action="
    {{ url("post/$edit_post->slug/edit-post") }}
    " enctype="multipart/form-data">
    @method("patch")
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label font-semibold">Nama Projek</label>
                <input type="text"
                    class="block flex-1 border-1  py-1.5 pl-1 text-gray-900 placeholder:text-gray-300 focus:ring-1 sm:text-sm sm:leading-6 rounded-md border-gray-700"
                    id="title" name="title" placeholder="Title" value="{{$edit_post->title}}">
                @error('title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Konten</label>
                <textarea class="form-control rounded-md" id="content" name="content">{!! $edit_post->content !!}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Gambar</label>
                <input type='file' class="form-control border-gray-700 border-1" rows="3" name="image" value="{{$edit_post->image}}"
                    accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">URL</label>
                <input type='url' class="form-control rounded-md " name="url" value="{{"$edit_post->url"}}">
            </div>
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-md py-3 px-3">Simpan</button>
            <div class="bg"></div>
        </form>
    </div>
@endsection
