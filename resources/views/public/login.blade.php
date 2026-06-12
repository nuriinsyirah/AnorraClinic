@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-anorraLight px-4">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md border border-gray-100">
        <h2 class="text-2xl font-bold text-anorraTeal text-center mb-6">Anorra Clinic Login</h2>
        
        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-4">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:border-anorraTeal">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:border-anorraTeal">
            </div>
            <button type="submit" class="w-full bg-anorraTeal text-white py-2 rounded-lg font-semibold hover:bg-opacity-90">Login</button>
        </form>

        <!-- Dynamic Registration Invitation Link Container Section -->
        <div class="text-center text-sm text-gray-500 mt-6 pt-4 border-t border-gray-50">
            New patient? <a href="{{ route('register') }}" class="text-anorraTeal font-semibold hover:underline">Create an account here</a>
        </div>
    </div>
</div>
@endsection