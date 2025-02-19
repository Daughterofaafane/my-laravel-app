@extends('welcome')
@section('content')

<div class="flex flex-wrap items-center justify-center mt-5">
	<form action="{{route('validate_signup')}}" method="POST" class="max-w-dm rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"> @csrf
		<div class="flex flex-wrap mx-3 mb-6">
			<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
				<label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="full-name"> Full Name </label> 
				<input class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="full-name" type="text" name="name" placeholder="Name"> 
				@if ($errors->has('name'))
					<span class="text-red-500">{{ $errors->first('name') }}</span>
				@endif
			</div>
			<div class="w-full md:w-1/2 px-3 mb-2">
				<label class="uppercase tracking-wide text-gray-700 text-xs font-bold" for="email"> Email </label> 
				<input class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="email" placeholder="name@gmail.com"> 
				@if ($errors->has('email'))
					<span class="text-red-500">{{ $errors->first('email') }}</span>
				@endif
			</div>
		</div>
		<div class="flex flex-wrap mx-3 mb-6">
			<div class="w-full px-3 mb-2">
				<label class="uppercase tracking-wide text-gray-700 text-xs font-bold" for="pswd"> Password </label> <input class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="pswd" type="password" name="password" placeholder="******************"> 
				@if ($errors->has('password')) 
					<span class="text-red-500">{{ $errors->first('password') }}</span>
				@endif
			</div>
		</div>
		<div class="flex md:items-center justify-center">
            <button class="shadow bg-purple-600 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Sign Up</button>
		</div>
	</form>
</div>


@endsection