@extends('welcome')
@section('content')

@if($message = Session::get('failed'))
	<div class="py-2 px-4 rounded-full border-0 text-center text-md font-semibold bg-red-50 text-red-700">{{ $message }}</div>
@endif

<div class="flex flex-wrap items-center justify-center mt-5">
	<form action="{{route('validate_login')}}" method="POST" class="max-w-dm rounded-lg bg-white p-6 shadow dark:bg-neutral-700">
        <h2 class="text-lg font-bold tracking-wide text-center text-purple-600 m-3">Login</h2>
		@csrf
		<div class="flex flex-wrap -mx-3 mb-6">
			<div class="w-full px-3">
				<label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">Email</label>
				<input class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="email" placeholder="name@gmail.com">
				@if ($errors->has('email'))
					<span class="text-red-500">{{ $errors->first('email') }}</span>
				@endif
			</div>
		</div>
		<div class="flex flex-wrap -mx-3 mb-6">
			<div class="w-full px-3">
				<label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pswd">Password</label>
				<input class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="pswd" type="password" name="password" placeholder="******************">
				@if ($errors->has('password'))
					<span class="text-red-500">{{ $errors->first('password') }}</span>
				@endif
			</div>
		</div>
		<div class="flex md:items-center justify-center">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Login</button>
		</div>
	</form>
</div>


@endsection