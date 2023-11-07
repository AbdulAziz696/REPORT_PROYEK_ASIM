@extends('welcome')
@section('title', '| Edit Infografis')

@section('main')
    <div class="container my-3 ">




        <form method="post" action="{{ url('infografis/' . $info->slug . '/edit-info') }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label font-semibold">Nama Projek</label>
                <input type="text"
                    class="block flex-1 border-1  py-1.5 pl-1 text-gray-900 placeholder:text-gray-300 focus:ring-1 sm:text-sm sm:leading-6 rounded-md border-gray-700"
                    id="title" name="title" placeholder="Title..." value="{{ $info->title }}">
                @error('title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Konten</label>
                <textarea class="form-control rounded-md" id="content" name="content" placeholder="Lorem ipsum...">{!! $info->content !!}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">Gambar</label>
                <input type='file' class="form-control rounded-md border-gray-700 border-1" rows="3" name="image"
                    value="{!! $info->image !!}" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label font-semibold">URL</label>
                <input type='url' class="form-control rounded-md  border-gray-700 border-1" name="url" value="{{ "$info->url" }}" placeholder="https://example...">
            </div>
            <div class="mb-3">
                <label for="made_by[]" class="form-label font-semibold block">Referenced to:</label>
                <div class="grid grid-cols-6">
                    @foreach ($post as $i)
                    <div>
                        @php
                            $name = json_decode($info->made_by);
                            $users = App\Models\post::whereIn('id', (array) $name)->get();
                        @endphp
                        <input type="checkbox" name="made_by[]" value="{{ $i->id }}"
                            {{ in_array($i->id, $users->pluck('id')->toArray()) ? 'checked' : '' }}> {{ $i->title }}<br>
                        </div>
                    @endforeach
                    @error('made_by[]')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="created_by[]" class="form-label font-semibold block">Created By:</label>
                <div class="grid grid-cols-6">
                    @foreach ($user as $i)
                    <div>
                        @php
                            $name = json_decode($info->created_by);
                            $users = App\Models\user::whereIn('id', (array) $name)->get();
                        @endphp
                        <input type="checkbox" name="created_by[]" value="{{ $i->id }}"
                            {{ in_array($i->id, $users->pluck('id')->toArray()) ? 'checked' : '' }}> {{ $i->name }}<br>
                        </div>
                    @endforeach
                    @error('created_by[]')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-md py-3 px-3">Simpan</button>
            <div class="bg"></div>
        </form>
    </div>
@endsection
