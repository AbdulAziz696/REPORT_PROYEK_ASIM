@extends('welcome')
@section('title', '| Edit Post')

@section('main')
    <div class="container my-3 ">




        <form method="post" action="
    {{ url('post/'.$edit_post->slug.'/edit-post') }}
    " enctype="multipart/form-data">
    @method("patch")
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label font-semibold">Nama Projek</label>
                <input type="text"
                    class="block flex-1   py-1.5 pl-1 text-gray-900 placeholder:text-gray-300 focus:ring-1 sm:text-sm sm:leading-6 rounded-md "
                    id="title" name="title" placeholder="Title..." value="{{$edit_post->title}}">
                @error('title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Konten</label>
                <textarea class="form-control rounded-md  " id="content" name="content" placeholder="Lorem ipsum...">{!! $edit_post->content !!}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold rounded-md border-1 border">Gambar</label>
                <input type='file' class="form-control  " rows="3" name="image" value="{!! $edit_post->image !!}"
                    accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">URL</label>
                <input type='url' class="form-control rounded-md   " name="url" value="{{"$edit_post->url"}}" placeholder="https://example...">
            </div>
            <div class="mb-3">
                <label for="made_by[]" class="form-label font-semibold block">Created By:</label>
                <div class="grid grid-cols-6">

                    @foreach($user as $i)
                    @php
                $name = json_decode($edit_post->made_by);
                $users = App\Models\User::whereIn('id',(array)$name)->get();
                @endphp
            <div>

                <input type="checkbox" name="made_by[]"
                value="{{ $i->id }}"
                {{ in_array($i->id, $users->pluck('id')->toArray()) ? 'checked' : '' }}> {{ $i->name }}<br>
            </div>
            @endforeach
        </div>


                @error('made_by[]')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            </div>
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-md py-3 px-3">Simpan</button>
            <div class="bg"></div>
        </form>
    </div>
@endsection
