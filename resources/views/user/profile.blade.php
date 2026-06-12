@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-gray-50">
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col p-4 space-y-2">
        <div class="p-4 text-2xl font-bold text-anorraTeal border-b border-gray-50 mb-4">Anorra</div>
        
        <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('user.appointments') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>Appointments</span>
        </a>

        <a href="{{ route('user.appointment.create') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Make Appointment</span>
        </a>
        
        <a href="{{ route('user.profile') }}" class="flex items-center space-x-3 px-4 py-2 bg-anorraLight text-anorraTeal font-semibold rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

    <div class="flex-1 flex flex-col">
        <main class="p-8 flex-1">
            

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                
                <div class="flex space-x-8 border-b border-gray-100 mb-8 text-sm font-medium">
                    <button type="button" class="pb-3 text-anorraTeal border-b-2 border-anorraTeal font-bold">Edit Profile</button>
                    <button type="button" class="pb-3 text-gray-400 hover:text-gray-600 transition-colors">Preferences</button>
                </div>

                <form id="profile-form" action="{{ route('user.profile.update') }}" method="POST" class="flex flex-col lg:flex-row lg:space-x-12 items-start">
                    @csrf

                    <div class="flex flex-col items-center mb-8 lg:mb-0">
                        <div class="w-32 h-32 overflow-hidden rounded-full border border-gray-100 shadow-sm bg-gray-50">
                            <img src="{{ asset('images/patient-profile.jpg') }}" alt="Patient Profile Picture" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Ayu+Alias&background=0D9488&color=fff';">
                        </div>
                    </div>

                    <div class="flex-1 w-full grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5 text-sm text-gray-700">
                        
                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">Your Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name ?? 'Ayu Alias' }}" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">User Name</label>
                            <input type="text" name="username" value="ayualias" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email ?? 'ayualias@gmail.com' }}" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">Password</label>
                            <input type="password" name="password" value="**********" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-400 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5 relative">
                            <label class="font-medium text-gray-500">Date of Birth</label>
                            <div class="relative w-full">
                                <select name="dob" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white appearance-none cursor-pointer">
                                    <option value="2000-05-30">30 May 2000</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">Present Address</label>
                            <input type="text" name="present_address" value="Taman Bukit Tunku, Kuala Lumpur" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">Permanent Address</label>
                            <input type="text" name="permanent_address" value="Taman Bukit Tunku, Kuala Lumpur" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">City</label>
                            <input type="text" name="city" value="Kuala Lumpur" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">Postal Code</label>
                            <input type="text" name="postal_code" value="50480" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <label class="font-medium text-gray-500">Country</label>
                            <input type="text" name="country" value="Malaysia" class="w-full px-4 py-2.5 border border-blue-50/70 focus:border-anorraTeal rounded-xl focus:ring-1 focus:ring-anorraTeal outline-none text-gray-500 font-normal bg-white">
                        </div>

                        <div class="md:col-span-2 flex justify-end mt-4">
                            <button type="submit" class="bg-anorraTeal text-white font-semibold text-sm px-10 py-2.5 rounded-xl hover:bg-opacity-95 transition-all shadow-sm active:scale-[0.98]">
                                Save
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </main>
    </div>
</div>
@endsection