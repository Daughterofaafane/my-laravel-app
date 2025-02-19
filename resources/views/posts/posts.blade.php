@extends('welcome')
@section('content')

@if (session()->has('add'))
    <div class="py-2 px-4 mt-2 rounded-full text-center text-md font-semibold bg-green-100 text-green-700 border border-green-300 shadow-sm">
        {{ session()->get('add') }}
    </div>
@endif
@if (session()->has('update'))
    <div class="py-2 px-4 mt-2 rounded-full text-center text-md font-semibold bg-yellow-100 text-yellow-700 border border-yellow-300 shadow-sm">
        {{ session()->get('update') }}
    </div>
@endif
@if (session()->has('delete'))
    <div class="py-2 px-4 mt-2 rounded-full text-center text-md font-semibold bg-red-100 text-red-700 border border-red-300 shadow-sm">
        {{ session()->get('delete') }}
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6 p-4 lg:px-48">
    @foreach ($posts as $post)
        <div class="bg-gray-100 p-5 rounded-lg shadow flex items-center space-x-4"> 
            @if($post->image)
                <a href="{{ route('posts.show', $post->id) }}">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-40 h-40 object-cover rounded-lg">
                </a>
            @endif
            <div class="flex-1">
                <h1 class="font-bold text-2xl mb-2 text-gray-800">{{ $post->title }}</h1>
                <h3 class="font-mono text-xs text-gray-600 mb-2">{{ $post->author }}</h3>
                <p class="text-gray-700 my-3">{{ \Illuminate\Support\Str::limit($post->description, 100, '...') }}</p>
                <div class="flex space-x-2 mt-3"> 
                    <a href="{{ route('posts.show', $post->id) }}">
                        <button class="text-white font-semibold text-xs bg-blue-600 hover:bg-blue-800 px-4 py-2 rounded transition">Read More</button>
                    </a>
                    @auth
                        @if(auth()->user()->name === $post->author)  
                            <a href="{{ route('posts.edit', $post->id) }}">
                                <button class="text-white font-semibold text-xs bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded transition">Update</button>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="text-white font-semibold text-xs bg-red-500 hover:bg-red-600 px-4 py-2 rounded transition">Delete</button>
                            </form>
                        @endif
                    @endauth    
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
