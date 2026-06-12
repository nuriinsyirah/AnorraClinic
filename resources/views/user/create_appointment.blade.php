@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-gray-50">
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col p-4 space-y-2">
    <div class="p-4 text-2xl font-bold text-anorraTeal border-b border-gray-50 mb-4">Anorra</div>
    
    <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.dashboard') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <span>Dashboard</span>
    </a>
    
    <a href="{{ route('user.appointments') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.appointments') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span>Appointments</span>
    </a>

    <a href="{{ route('user.appointment.create') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.appointment.create') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>Make Appointment</span>
    </a>
    
    <a href="{{ route('user.profile') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.profile') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
        <span>Profile</span>
    </a>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
    <form action="{{ route('logout') }}" method="POST" class="pt-4 border-t border-gray-100 mt-auto">
        @csrf
        <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span>Logout</span>
        </button>
    </form>

</aside>

    <main class="flex-1 p-8">
        <h1 class="text-2xl font-bold text-anorraTeal mb-6">Book an Appointment Slot</h1>
        
        <div class="flex gap-10 items-start w-full">
        <div class="w-[55%]"> 
        <form action="{{ route('user.appointment.create') }}" method="POST" class="bg-white p-6 rounded-xl border border-gray-100 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Available Doctor</label>
                <select name="doctor_name" class="w-full border border-gray-300 p-2 rounded-lg text-sm bg-white focus:border-anorraTeal focus:outline-none">
                    <option value="Dr. Linda">Dr. Linda (General Medicine)</option>
                    <option value="Dr. Michael">Dr. Ali (Therapy Support)</option>
                    <option value="Dr. Sophea">Dr. Sofia (Cardiology Consultant)</option>
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="appointment_date" required class="w-full border border-gray-300 p-2 rounded-lg text-sm focus:border-anorraTeal focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                    <input type="time" name="appointment_time" required class="w-full border border-gray-300 p-2 rounded-lg text-sm focus:border-anorraTeal focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Symptoms Description / Assessment Notes</label>
                <textarea name="notes" rows="4" class="w-full border border-gray-300 p-2 rounded-lg text-sm focus:border-anorraTeal focus:outline-none" placeholder="Briefly describe your medical concerns..."></textarea>
            </div>
            <button type="submit" class="bg-anorraTeal text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-opacity-90">Confirm Session</button>
        </form>

        </div>

<img src="{{ asset('images/appt.jpeg') }}"
     class="w-[40%] h-auto object-contain">

</div>

    

    </main>
</div>
@endsection