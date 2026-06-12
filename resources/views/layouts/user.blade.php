<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anorra - Patient Portal</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        anorraTeal: '#0D9488',
                        anorraLight: '#F0FDFA',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 antialiased">

<div class="flex min-h-screen">
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col p-4 space-y-2 shrink-0">
        <div class="p-4 text-2xl font-bold text-anorraTeal border-b border-gray-50 mb-4">Anorra</div>
        
        <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.dashboard') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
            <svg class="w-5 h-5 {{ request()->routeIs('user.dashboard') ? 'text-anorraTeal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('user.appointments') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.appointments') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
            <svg class="w-5 h-5 {{ request()->routeIs('user.appointments') ? 'text-anorraTeal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>Appointments</span>
        </a>

        <a href="{{ route('user.appointment.create') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.appointment.create') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
            <svg class="w-5 h-5 {{ request()->routeIs('user.appointment.create') ? 'text-anorraTeal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Make Appointment</span>
        </a>
        
        <a href="{{ route('user.profile') }}" class="flex items-center space-x-3 px-4 py-2 {{ request()->routeIs('user.profile') ? 'bg-anorraLight text-anorraTeal font-semibold' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
            <svg class="w-5 h-5 {{ request()->routeIs('user.profile') ? 'text-anorraTeal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

    <div class="flex-1 flex flex-col min-w-0">
        
        <header class="bg-white px-8 py-4 flex justify-between items-center border-b border-gray-100/50">
            <div></div> 
            <div class="flex items-center space-x-6">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search" class="bg-gray-50 border-0 text-sm rounded-full pl-10 pr-4 py-2 w-64 focus:ring-1 focus:ring-anorraTeal outline-none text-gray-600">
                </div>
                <button class="p-2 bg-gray-50 text-gray-400 hover:text-anorraTeal rounded-full transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </button>
                <button class="p-2 bg-red-50 text-red-400 rounded-full relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="w-10 h-10 overflow-hidden rounded-full border border-gray-200">
                    <img src="{{ asset('images/patient-profile.png') }}" alt="User Avatar" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=User&background=0D9488&color=fff';">
                </div>
            </div>
        </header>

        <main class="p-8 flex-1">
            @yield('user-content')
        </main>
    </div>
</div>

</body>
</html>