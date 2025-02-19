@extends('welcome')
@section('content')

<div class="bg-gray-300 shadow p-5 m-10 rounded col-5">
    @if($posts->image)
        <img src="{{ asset('storage/' . $posts->image) }}" alt="Post Image" class="w-50 h-50 object-cover rounded-lg">
    @endif
    <h1 class="font-bold text-2xl mb-2">{{$posts->title}}</h1>
    <h3 class="font-mono text-s mb-2 ">{{$posts->author}}</h3>
    <p class="my-3">{{$posts->description}}</p>
</div>

@endsection