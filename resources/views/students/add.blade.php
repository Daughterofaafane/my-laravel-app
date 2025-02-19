@extends('welcome')
@section('content')

@guest
    <h1 class="text-red-600 text-xl font-bold text-center mt-5">You are not allowed to add users</h1>
@else
    <div class="max-w-lg mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
        <form method="POST" action="{{ route('resource.store') }}" class="space-y-4">
            @csrf
            <h1 class="text-xl font-semibold text-gray-800">Create New User</h1>
            <div>
                <label for="nom" class="block text-gray-700 font-medium">Nom:</label>
                <input type="text" name="nom" id="nom" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nom') border-red-500 @enderror"> @error('nom')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email:</label>
                <input type="email" name="email" id="email" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"> @if ($errors->has('email'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition"> Add </button> 
        </form>
    </div>
@endguest


@endsection
