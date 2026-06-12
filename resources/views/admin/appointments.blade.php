@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-gray-50">
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col p-4 space-y-2">
        <div class="p-4 text-2xl font-bold text-anorraTeal border-b border-gray-50 mb-4">Anorra</div>
        
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('admin.dashboard') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('admin.appointments') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('admin.appointments') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>Appointments</span>
        </a>
        
        <a href="{{ route('admin.patients') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('admin.patients') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span>Patients</span>
        </a>
        
        <a href="{{ route('admin.profile') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('admin.profile') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
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
        <h1 class="text-2xl font-bold text-anorraTeal mb-6">Clinical Bookings</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <p class="text-gray-400 text-xs uppercase font-semibold">Total</p>
                <p class="text-2xl font-bold text-gray-800">50</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <p class="text-gray-400 text-xs uppercase font-semibold">Pending</p>
                <p class="text-2xl font-bold text-gray-800">3</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <p class="text-gray-400 text-xs uppercase font-semibold">Approved</p>
                <p class="text-2xl font-bold text-gray-800">47</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <p class="text-gray-400 text-xs uppercase font-semibold">Rejected</p>
                <p class="text-2xl font-bold text-gray-800">10</p>
            </div>
        </div>

        

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-100">
                        <th class="pb-2">Patient</th>
                        <th class="pb-2">Doctor</th>
                        <th class="pb-2">Date/Time</th>
                        <th class="pb-2">Current Status</th>
                        <th class="pb-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($appointments as $app)
                    <tr>
                        <td class="py-3 font-medium text-gray-800">{{ $app->user->name }}</td>
                        <td class="py-3 text-gray-600">{{ $app->doctor_name }}</td>
                        <td class="py-3 text-xs">{{ $app->appointment_date }} @ {{ $app->appointment_time }}</td>
                        <td class="py-3"><span class="text-xs px-2 py-0.5 rounded font-bold bg-gray-100">{{ $app->status }}</span></td>
                        <td class="py-3 text-right space-x-2">
                            <form action="{{ route('admin.appointment.status', [$app->id, 'Confirmed']) }}" method="POST" class="inline">@csrf
                                <button class="text-xs bg-green-600 text-white px-2 py-1 rounded">Approve</button>
                            </form>
                            <form action="{{ route('admin.appointment.status', [$app->id, 'Cancelled']) }}" method="POST" class="inline">@csrf
                                <button class="text-xs bg-red-500 text-white px-2 py-1 rounded">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection