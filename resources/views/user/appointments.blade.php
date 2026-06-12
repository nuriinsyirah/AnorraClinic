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
            <h1 class="text-2xl font-bold text-anorraTeal">Your Booking History</h1>
            <a href="{{ route('user.appointment.create') }}" class="bg-anorraTeal text-white text-xs font-semibold px-4 py-2 rounded-lg">+ Add Appointment</a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-gray-100 text-gray-400">
                        <th class="pb-2">Scheduled Date</th>
                        <th class="pb-2">Time Slot</th>
                        <th class="pb-2">Practitioner Doctor</th>
                        <th class="pb-2">Status</th>
                        <th class="pb-2 text-right">Actions Panel</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($appointments as $app)
                    <tr>
                        <td class="py-3 font-medium">{{ $app->appointment_date }}</td>
                        <td class="py-3">{{ $app->appointment_time }}</td>
                        <td class="py-3">{{ $app->doctor_name }}</td>
                        <td class="py-3"><span class="px-2 py-0.5 rounded text-xs font-bold bg-gray-100">{{ $app->status }}</span></td>
                        <td class="py-3 text-right">
                            @if($app->status != 'Cancelled')
                            <form action="{{ route('user.appointment.cancel', $app->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500 hover:underline text-xs font-bold">Cancel</button>
                            </form>
                            @else
                            <span class="text-xs text-gray-400 italic">Terminated</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection