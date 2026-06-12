@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-anorraTeal">Anorra Clinic</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Create your new patient account</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 text-red-500 p-3 rounded-lg text-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-4" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label class="text-sm font-semibold text-gray-600">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full mt-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-anorraTeal" placeholder="John Doe">
            </div>

            <div>
                <label class="text-sm font-semibold text-gray-600">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required class="w-full mt-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-anorraTeal" placeholder="johndoe123">
            </div>

            <div>
                <label class="text-sm font-semibold text-gray-600">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-anorraTeal" placeholder="john@example.com">
            </div>

            <div>
                <label class="text-sm font-semibold text-gray-600">Password</label>
                <input type="password" name="password" required class="w-full mt-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-anorraTeal" placeholder="••••••••">
            </div>

            <div>
                <label class="text-sm font-semibold text-gray-600">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full mt-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-anorraTeal" placeholder="••••••••">
            </div>

            <button type="submit" class="w-full bg-anorraTeal text-white py-2.0 rounded-lg font-semibold shadow hover:bg-opacity-90 transition duration-150 mt-4 py-2">
                Register Account
            </button>
        </form>

        <div class="text-center text-sm text-gray-500 mt-4">
            Already have an account? <a href="{{ route('login') }}" class="text-anorraTeal font-medium hover:underline">Log in</a>
        </div>
    </div>
</div>
@endsection