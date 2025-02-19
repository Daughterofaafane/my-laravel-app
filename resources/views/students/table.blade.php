@extends('welcome')

@section('content')

{{-- Success Messages --}}
@foreach (['add' => 'green', 'update' => 'yellow', 'delete' => 'red'] as $key => $color)
    @if (session()->has($key))
        <div class="py-2 px-4 rounded-full text-center text-md font-semibold bg-{{ $color }}-100 text-{{ $color }}-700 border border-{{ $color }}-300 shadow-sm">
            {{ session()->get($key) }}
        </div>
    @endif
@endforeach

{{-- Table --}}
<div class="overflow-x-auto p-4">
    <table class="w-full border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr class="text-left text-gray-700">
                <th class="px-4 py-2 text-center">Name</th>
                <th class="px-4 py-2 text-center">Email</th>
                @auth
                    <th colspan="2" class="px-4 py-2 text-center">Actions</th>
                @endauth
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
            @foreach($datas as $data)
                <tr class="text-gray-700">
                    <td class="px-4 py-2 text-center">{{ $data->nom }}</td>
                    <td class="px-4 py-2 text-center">{{ $data->email }}</td>
                    @auth
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('resource.edit', $data->id) }}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded transition">Update</a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('resource.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded transition">Delete</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach  
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-4 flex justify-center">
    {{ $datas->links() }}
</div>

@endsection
