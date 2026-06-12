@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-gray-50">
    
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col p-4 space-y-2">
        <div class="p-4 text-2xl font-bold text-anorraTeal border-b border-gray-50 mb-4">Anorra</div>
        
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 bg-anorraLight text-anorraTeal font-semibold rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('admin.appointments') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>Appointments</span>
        </a>
        
        <a href="{{ route('admin.patients') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span>Patients</span>
        </a>
        
        <a href="{{ route('admin.profile') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
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

    <!-- Main Content Body -->
    <main class="flex-1 p-8">
        <h1 class="text-2xl font-bold text-anorraTeal mb-6">Admin Dashboard</h1>
        
        <!-- Top Row: All Three Metric Cards in One Single Line -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="relative overflow-hidden bg-white p-6 rounded-xl border border-gray-100 shadow-sm">

    <img src="{{ asset('images/r1.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover opacity-20"
         alt="">

    <div class="relative z-10">
        <p class="text-sm text-gray-400 font-medium">Total Appointment Items</p>
        <p class="text-2xl font-bold mt-1 text-anorraTeal">{{ $totalApp }}</p>
    </div>

</div>
           <div class="relative overflow-hidden bg-white p-6 rounded-xl border border-gray-100 shadow-sm">

    <img src="{{ asset('images/r2.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover opacity-20"
         alt="">

    <div class="relative z-10">
        <p class="text-sm text-gray-400 font-medium">Pending Approvals</p>
        <p class="text-2xl font-bold mt-1 text-yellow-600">{{ $upcomingApp }}</p>
    </div>

</div>
           <div class="relative overflow-hidden bg-white p-6 rounded-xl border border-gray-100 shadow-sm">

    <img src="{{ asset('images/r3.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover opacity-20"
         alt="">

    <div class="relative z-10">
        <p class="text-sm text-gray-400 font-medium">Cancelled Sessions</p>
        <p class="text-2xl font-bold mt-1 text-red-500">{{ $cancelledApp }}</p>
    </div>

</div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            
            <div class="lg:col-span-2 space-y-6">
                
                <!-- 1. Recent Appointments Box -->
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm min-h-[300px]">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-anorraTeal">Recent Appointments</h3>
                        <a href="{{ route('admin.appointments') }}" class="text-xs font-semibold text-anorraTeal hover:underline">
                            View All →
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500">
                            <thead>
                                <tr class="border-b border-gray-100 text-xs uppercase text-gray-400">
                                    <th class="py-3 font-semibold">Patient Name</th>
                                    <th class="py-3 font-semibold">Date</th>
                                    <th class="py-3 font-semibold">Time</th>
                                    <th class="py-3 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAppointments ?? [] as $app)
                                    <tr class="border-b border-gray-50 last:border-0">
                                        <td class="py-3 font-medium text-gray-700">{{ $app->user->name ?? 'N/A' }}</td>
                                        <td class="py-3">{{ $app->date }}</td>
                                        <td class="py-3">{{ $app->time }}</td>
                                        <td class="py-3">
                                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold 
                                                {{ $app->status === 'Approved' || $app->status === 'approved' ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700' }}">
                                                {{ ucfirst($app->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-8 text-center text-gray-400">No appointments recorded yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 2. Total Patients Annual Statistic Box -->
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm min-h-[300px] flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-bold text-anorraTeal">Total Patients</h3>
                            <span class="text-xs font-medium text-gray-400 bg-gray-50 px-2.5 py-1 rounded-md">Jan 2026 - Dec 2026</span>
                        </div>
                        <p class="text-xs text-gray-400 mb-6">Overview of unique patient registrations tracked over the current calendar cycle.</p>
                        
                        <div class="flex items-baseline space-x-4 mt-4">
                            <span class="text-5xl font-black text-anorraTeal tracking-tight">
                                {{ $totalPatientsCount ?? '142' }}
                            </span>
                            <span class="text-sm font-semibold text-green-500 flex items-center">
                                ↑ 12% increase from last year
                            </span>
                        </div>
                    </div>

                    <div class="w-full bg-gray-100 h-2 rounded-full mt-6 overflow-hidden">
                        <div class="bg-anorraTeal h-full rounded-full" style="width: 78%"></div>
                    </div>
                </div>

            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center text-center">

            <div class="w-20 h-20 mb-3 overflow-hidden rounded-full border-2 border-anorraSecondary shadow-inner">
                    <img src="{{ asset('images/admin-profile.avif') }}" 
                         alt="Admin Profile Picture" 
                         class="w-full h-full object-cover"
                         onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Admin+User&background=0D9488&color=fff';">
                </div>


                <h4 class="font-bold text-anorraTeal text-lg">{{ Auth::user()->name ?? 'Admin User' }}</h4>
                <p class="text-xs text-gray-500 mb-4">{{ Auth::user()->email ?? 'admin@anorra.com' }}</p>

                <a href="{{ route('admin.profile') }}" class="w-full bg-anorraTeal text-white text-center text-sm font-medium py-2 px-4 rounded-lg hover:bg-opacity-90 transition-all shadow-sm">
                    Edit Profile
                </a>
            </div>

        </div>
    </main>
</div>
@endsection