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
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-anorraTeal">Patient Dashboard</h1>
            <p class="text-gray-700">Hello, <span class="font-bold text-anorraTeal">{{ $user->name }}</span>!</p>
        </div>

        <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Current Vitals Metrics</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-anorraTeal text-white p-4 rounded-xl">
                <p class="text-xs text-opacity-80">Blood Pressure</p>
                <p class="text-lg font-bold mt-1">{{ $patient->blood_pressure }}</p>
            </div>
            <div class="bg-anorraTeal text-white p-4 rounded-xl">
                <p class="text-xs text-opacity-80">Heart Rate</p>
                <p class="text-lg font-bold mt-1">{{ $patient->heart_rate }} bpm</p>
            </div>
            <div class="bg-anorraTeal text-white p-4 rounded-xl">
                <p class="text-xs text-opacity-80">Temperature</p>
                <p class="text-lg font-bold mt-1">{{ $patient->temperature }}°C</p>
            </div>
            <div class="bg-anorraTeal text-white p-4 rounded-xl">
                <p class="text-xs text-opacity-80">Blood Sugar</p>
                <p class="text-lg font-bold mt-1">{{ $patient->blood_sugar }} mg/dL</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <div class="lg:col-span-2 flex flex-col gap-4">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-orange-50 text-orange-500 rounded-lg text-2xl">⏰</div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Upcoming Appointments</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $appointments->where('status', 'Pending')->count() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-50 text-blue-500 rounded-lg text-2xl">📁</div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Appointments</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $appointments->count() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-teal-50 text-anorraTeal rounded-lg text-2xl">👤</div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Visited Doctor</p>
                            <h3 class="text-2xl font-bold text-gray-800">
                                {{ $appointments->where('status', 'Completed')->unique('doctor_name')->count() ?: 3 }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-bold text-gray-800 text-base">Calendar</h4>
                        <span class="text-sm font-semibold text-anorraTeal bg-anorraLight bg-opacity-50 px-3 py-1 rounded-md">
                            {{ now()->format('F Y') }}
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-7 text-center text-xs font-bold text-gray-400 mb-2">
                        <div>Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>
                    </div>
                    
                    <div class="grid grid-cols-7 gap-y-2 text-center text-sm font-medium text-gray-600">
                        @php
                            $startOfMonth = now()->startOfMonth();
                            $daysInMonth = now()->daysInMonth;
                            $blankDaysBefore = $startOfMonth->dayOfWeek; 
                            $currentDayNumber = now()->day;
                        @endphp

                        @for ($i = 0; $i < $blankDaysBefore; $i++)
                            <div class="text-transparent">0</div>
                        @endfor

                        @for ($day = 1; $day <= $daysInMonth; $day++)
                            <div class="flex items-center justify-center h-8 w-8 mx-auto rounded-full 
                                {{ $day == $currentDayNumber ? 'bg-anorraTeal text-white font-bold shadow-sm' : 'hover:bg-gray-100 cursor-pointer' }}">
                                {{ $day }}
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-anorraTeal text-md mb-4">Recent Appointments Summary</h3>
            <div class="space-y-2">
                @forelse($appointments->take(3) as $app)
                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg text-sm">
                    <div>
                        <p class="font-semibold text-gray-800">Doctor: {{ $app->doctor_name }}</p>
                        <p class="text-xs text-gray-400">{{ $app->appointment_date }} @ {{ $app->appointment_time }}</p>
                    </div>
                    <span class="px-2 py-1 rounded text-xs font-bold bg-anorraSecondary text-anorraTeal">{{ $app->status }}</span>
                </div>
                @empty
                <p class="text-sm text-gray-400">No scheduled slots active yet.</p>
                @endforelse
            </div>
        </div>
    </main>
</div>
@endsection