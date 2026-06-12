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
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-anorraTeal">Patient Accounts Records</h1>
            <a href="{{ route('admin.patients.add') }}" class="bg-anorraTeal text-white px-4 py-2 rounded-lg shadow-sm hover:bg-opacity-90 transition font-medium text-sm">
                + Add Patient
            </a>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-100">
                        <th class="pb-2">Name</th>
                        <th class="pb-2">Email</th>
                        <th class="pb-2">Blood Pressure Metric</th>
                        <th class="pb-2">Heart Rate</th>
                        <th class="pb-2">Status Flag</th>
                        <th class="pb-2">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($patients as $patient)
                    <tr>
                        <td class="py-3 font-medium text-gray-800">{{ $patient->name }}</td>
                        <td class="py-3 text-gray-500">{{ $patient->email }}</td>
                        <td class="py-3 font-mono text-xs">{{ $patient->patientProfile->blood_pressure ?? '120/80' }}</td>
                        <td class="py-3 text-xs">{{ $patient->patientProfile->heart_rate ?? '80' }} bpm</td>
                        <td class="py-3"><span class="text-xs px-2 py-0.5 rounded font-bold bg-green-50 text-green-600">Active</span></td>
                        <td class="py-3">
    <form action="{{ route('admin.patients.delete', $patient->id) }}"
          method="POST"
          onsubmit="return confirm('Are you sure you want to delete this patient?');">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
            Delete
        </button>

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