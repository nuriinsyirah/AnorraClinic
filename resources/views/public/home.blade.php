@extends('layouts.app')
@section('content')
<div class="min-h-screen flex flex-col bg-white">
    <header class="flex justify-between items-center px-10 py-4 border-b border-gray-100">
        <div class="text-2xl font-bold text-anorraTeal">Anorra</div>
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}" class="text-anorraTeal font-semibold">Home</a>
            <a href="{{ route('about') }}" class="text-gray-500 hover:text-anorraTeal">About Us</a>
            <a href="{{ route('login') }}" class="bg-anorraTeal text-white px-6 py-2 rounded-lg font-medium hover:bg-opacity-90">Login</a>
        </div>
    </header>

    <div class="relative bg-cover bg-center py-24 text-center px-4" style="background-image: url('<?php echo asset('images/bg.jpg'); ?>');">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>

        <div class="relative z-10">
            <h1 class="text-4xl font-bold text-white mb-2 drop-shadow-md">Welcome to Anorra Clinic</h1>
            <p class="text-gray-100 text-lg drop-shadow-sm">Your Health, Our Priority</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-16 w-full">
        <h2 class="text-2xl font-bold text-anorraTeal mb-8">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-anorraSecondary bg-opacity-30 p-8 rounded-xl text-center">
                <div class="text-2xl mb-2">❤️</div>
                <p class="font-semibold text-anorraTeal">Cardiology Support</p>
                <p class="text-sm text-gray-500 mt-2">Comprehensive health metric evaluations.</p>
            </div>
            <div class="bg-anorraSecondary bg-opacity-30 p-8 rounded-xl text-center">
                <div class="text-2xl mb-2">✋</div>
                <p class="font-semibold text-anorraTeal">General Therapy</p>
                <p class="text-sm text-gray-500 mt-2">Expert physiological assessment systems.</p>
            </div>
            <div class="bg-anorraSecondary bg-opacity-30 p-8 rounded-xl text-center">
                <div class="text-2xl mb-2">📈</div>
                <p class="font-semibold text-anorraTeal">Vital Monitoring</p>
                <p class="text-sm text-gray-500 mt-2">Continuous tracking and diagnostic layouts.</p>
            </div>
        </div>
    </div>

    <div class="text-center py-12 bg-white">
        <p class="text-xl font-medium text-gray-700 mb-4">Let's book an appointment with us</p>
        <a href="{{ route('login') }}" class="bg-anorraTeal text-white px-8 py-3 rounded-lg font-semibold shadow hover:bg-opacity-90">Get started</a>
    </div>

    <footer class="mt-auto border-t border-gray-100 py-8 text-center bg-gray-50 text-gray-600">
        <p class="font-bold text-anorraTeal mb-2">Contact Us</p>
        <p class="text-sm">📞 +60334578731 &nbsp;&nbsp;|&nbsp;&nbsp; ✉️ anorraclinic@gmail.com</p>
    </footer>
</div>
@endsection