@extends('welcome')
@section('content')

<div class="flex flex-wrap items-center justify-center mt-5">
    <form method="POST" action="{{ route('posts.update', $data->id) }}" enctype="multipart/form-data" class="max-w-lg rounded-lg bg-white p-6 shadow-md dark:bg-neutral-700"> 
        @method('put')
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg @error('title') border-red-500 @enderror" value="{{$data->title}}" placeholder="Title" name="title"> 
                @if($errors->has('title'))
                    <span class="text-red-500 text-sm">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="author" value="{{$data->author}}" readonly>
            </div>
        </div>
        <div>
            @if ($data->image)
                <img src="{{ asset('storage/' . $data->image) }}" width="150" class="mt-2">
            @endif
            <label for="image">Change picture here:</label>
            <input type="file" name="image" id="image" accept="image/*" class="@error('image') border-red-500 @enderror">
            <br>
            @if($errors->has('image'))
                <span class="text-red-500 text-sm">{{$errors->first('image')}}</span>
            @endif
        </div>
        <div class="mt-3">
            <textarea name="description" cols="30" rows="10" placeholder="Description" class="w-full p-2 border border-gray-300 rounded-lg @error('description') border-red-500 @enderror">{{$data->description}}</textarea>
        </div>
        <div class="flex justify-center mt-2">
            <button type="submit" class="shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>










@endsection