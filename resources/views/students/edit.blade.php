@extends('welcome')

@section('content')

<div class="max-w-lg mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
    <form method="POST" action="{{ route('resource.update', $data->id) }}" class="space-y-4">
        @method('put')
        @csrf
        <h1 class="text-xl font-semibold text-gray-800">Update User</h1>
        <div>
            <label for="nom" class="block text-gray-700 font-medium">Nom:</label>
            <input type="text" name="nom" id="nom" value="{{ $data->nom }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('nom') border-red-500 @enderror"> @error('nom')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="block text-gray-700 font-medium">Email:</label>
            <input type="email" name="email" id="email" value="{{ $data->email }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('email') border-red-500 @enderror"> @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full bg-yellow-500 text-white font-semibold py-2 rounded-lg hover:bg-yellow-600 transition"> Update </button> </form>
</div>

@endsection
