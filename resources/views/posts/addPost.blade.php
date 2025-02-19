@extends('welcome')
@section('content')

    @auth        
        <div class="flex flex-wrap items-center justify-center mt-5">
            <form method="POST" action="{{ route('posts.store') }}" class="max-w-lg rounded-lg bg-white p-6 shadow-md dark:bg-neutral-700" enctype="multipart/form-data"> 
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg @error('title') border-red-500 @enderror" placeholder="Title" name="title" value="{{ old('title') }}"> 
                        @if($errors->has('title'))
                            <span class="text-red-500 text-sm">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="author" value="{{auth()->user()->name}}" readonly>
                    </div>
                </div>
                <div>
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="image" accept="image/*" class="@error('image') border-red-500 @enderror">
                    <br>
                    @if($errors->has('image'))
                        <span class="text-red-500 text-sm">{{$errors->first('image')}}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <textarea name="description" cols="30" rows="10" placeholder="Description" class="w-full p-2 border border-gray-300 rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                </div>
                <div class="flex justify-center mt-2">
                    <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Add Post</button>
                </div>
            </form>
        </div>
    @else
        <div class="flex justify-center mt-5">
            <span class="bg-red-500 text-white px-4 py-2 rounded">Only Admin can Access this page.</span>
        </div>
    @endauth
@endsection
