@extends('layouts.app')
@section('content')
<div class="p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
        <h2 class="text-xl font-bold mb-6 text-anorraTeal">Add New Patient</h2>
        
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 text-red-600 rounded-lg text-sm">
                <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.patients.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div><label class="block text-sm font-medium">Name</label><input type="text" name="name" class="w-full border-gray-200 rounded-lg" required></div>
                <div><label class="block text-sm font-medium">Username</label><input type="text" name="username" class="w-full border-gray-200 rounded-lg" required></div>
                <div><label class="block text-sm font-medium">Email</label><input type="email" name="email" class="w-full border-gray-200 rounded-lg" required></div>
                <div><label class="block text-sm font-medium">Password</label><input type="password" name="password" class="w-full border-gray-200 rounded-lg" required></div>
                
                <button type="submit" class="w-full bg-anorraTeal text-white py-2 rounded-lg hover:bg-opacity-90">Save Patient</button>
            </div>
        </form>
    </div>
</div>
@endsection