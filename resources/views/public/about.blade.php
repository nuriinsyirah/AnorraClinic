@extends('layouts.app')
@section('content')
<div class="relative min-h-screen">
    
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/about-bg.jpg') }}" alt="Clinic Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80"></div>
    </div>

    <div class="relative z-10">
        <header class="flex justify-between items-center px-10 py-4 border-b border-gray-100 bg-white/50 backdrop-blur-sm">
            <div class="text-2xl font-bold text-anorraTeal">Anorra</div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-anorraTeal">Home</a>
                <a href="{{ route('about') }}" class="text-anorraTeal font-semibold">About Us</a>
                <a href="{{ route('login') }}" class="bg-anorraTeal text-white px-6 py-2 rounded-lg font-medium hover:bg-opacity-90">Login</a>
            </div>
        </header>

        <div class="max-w-4xl mx-auto px-4 py-12">
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-anorraTeal mb-4">Our Background</h2>
                <p class="text-gray-600 leading-relaxed">
                    Anorra Clinic provides top-tier diagnostic services, dedicated patient tracking layouts, and automated scheduling workflows.
                </p>
            </section>

            <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-bold text-anorraTeal mb-2">VISION</h3>
                    <p class="text-sm text-gray-600">To deliver modern health analytics with continuous digital booking visibility.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-bold text-anorraTeal mb-2">MISSION</h3>
                    <p class="text-sm text-gray-600">To treat every clinical guest with structural integrity, care, and reliable tracking tools.</p>
                </div>
            </section>

            <section class="mb-12 text-center bg-white py-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-anorraTeal mb-2">Operating Hours</h2>
                <p class="text-gray-700 font-semibold bg-anorraLight inline-block px-6 py-2 rounded">Mon - Sun 8:00 - 12:00</p>
            </section>

            <section class="mb-12">
                <h2 class="text-2xl font-bold text-anorraTeal mb-8 text-center">Meet Our Doctors</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div class="border border-gray-100 p-6 rounded-xl bg-white shadow-sm flex flex-col items-center">
                        <div class="w-24 h-24 mb-4 overflow-hidden rounded-full border-2 border-anorraSecondary">
                            <img src="{{ asset('images/dr-1.png') }}" alt="Dr. Linda" class="w-full h-full object-cover">
                        </div>
                        <h4 class="font-bold text-anorraTeal text-lg">Dr. Linda</h4>
                        <p class="text-xs text-gray-500 mt-1">General Medicine Specialist</p>
                    </div>
                    <div class="border border-gray-100 p-6 rounded-xl bg-white shadow-sm flex flex-col items-center">
                        <div class="w-24 h-24 mb-4 overflow-hidden rounded-full border-2 border-anorraSecondary">
                            <img src="{{ asset('images/dr-2.png') }}" alt="Dr. Ali" class="w-full h-full object-cover">
                        </div>
                        <h4 class="font-bold text-anorraTeal text-lg">Dr. Ali</h4>
                        <p class="text-xs text-gray-500 mt-1">Therapeutic Care Specialist</p>
                    </div>
                    <div class="border border-gray-100 p-6 rounded-xl bg-white shadow-sm flex flex-col items-center">
                        <div class="w-24 h-24 mb-4 overflow-hidden rounded-full border-2 border-anorraSecondary">
                            <img src="{{ asset('images/dr-3.png') }}" alt="Dr. Sofia" class="w-full h-full object-cover">
                        </div>
                        <h4 class="font-bold text-anorraTeal text-lg">Dr. Sofia</h4>
                        <p class="text-xs text-gray-500 mt-1">Cardiology Lead Consultant</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection