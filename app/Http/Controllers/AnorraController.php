<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnorraController extends Controller
{
    // --- PUBLIC PAGES ---
    public function home() { return view('public.home'); }
    public function about() { return view('public.about'); }
    public function showLogin() { return view('public.login'); }

    // --- AUTHENTICATION ---
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Auth::user()->role === 'admin' ? redirect()->route('admin.dashboard') : redirect()->route('user.dashboard');
        }
        return back()->withErrors(['username' => 'Invalid Credentials.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function showRegister() { return view('public.register'); }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', 
        ]);

        Patient::create([
            'user_id' => $user->id,
            'blood_pressure' => 'N/A',
            'heart_rate' => 0,
            'temperature' => 0.0,
            'blood_sugar' => 0,
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('user.dashboard')->with('success', 'Account created successfully!');
    }

    // --- USER DASHBOARD ---
    public function userDashboard() {
        $user = Auth::user();
        $patient = Patient::firstOrCreate(['user_id' => $user->id]);
        $appointments = Appointment::where('user_id', $user->id)->orderBy('appointment_date', 'desc')->get();
        return view('user.dashboard', compact('user', 'patient', 'appointments'));
    }

    public function userProfile() { return view('user.profile', ['user' => Auth::user()]); }

   public function updateUserProfile(Request $request) {
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,'.Auth::id(),
        'dob' => 'nullable|date',
        'present_address' => 'nullable|string',
        'permanent_address' => 'nullable|string',
        'city' => 'nullable|string',
        'postal_code' => 'nullable|string',
    ]);
    
    $user = \App\Models\User::find(Auth::id());
    
    if ($user) {
        $user->update($data);
        return back()->with('success', 'Profile Updated Successfully!');
    }

    return back()->withErrors(['error' => 'User not found.']);
}

    // --- USER APPOINTMENTS ---
    public function userAppointments() {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('user.appointments', compact('appointments'));
    }

    public function showCreateAppointment() { return view('user.create_appointment'); }

    public function storeAppointment(Request $request) {
        $request->validate([
            'doctor_name' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'notes' => 'nullable|string'
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'doctor_name' => $request->doctor_name,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'notes' => $request->notes,
            'amount' => 40.00,
            'status' => 'Pending'
        ]);

        return redirect()->route('user.appointments')->with('success', 'Appointment booked!');
    }

    public function cancelAppointment(string $id) {
        $appointment = Appointment::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $appointment->update(['status' => 'Cancelled']);
        return back()->with('success', 'Appointment Cancelled.');
    }

    // --- ADMIN DASHBOARD ---
    public function adminDashboard() {
    $totalApp = Appointment::count();
    $upcomingApp = Appointment::where('status', 'Pending')->count();
    $cancelledApp = Appointment::where('status', 'Cancelled')->count();
    
    $totalPatientsCount = User::where('role', 'user')->whereYear('created_at', date('Y'))->count();
    
    $recentAppointments = Appointment::with('user')->orderBy('created_at', 'desc')->take(5)->get();
    
    return view('admin.dashboard', compact('totalApp', 'upcomingApp', 'cancelledApp', 'recentAppointments', 'totalPatientsCount'));
}

    public function adminProfile() { return view('admin.profile', ['user' => Auth::user()]); }

    // --- ADMIN PATIENTS ---
    public function adminPatients() {
        $patients = User::where('role', 'user')->with('patientProfile')->get();
        return view('admin.patients', compact('patients'));
    }

    public function showAddPatient() {
        return view('admin.add-patient');
    }

    public function storePatient(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Patient::create([
            'user_id' => $user->id,
            'blood_pressure' => 'N/A',
            'heart_rate' => 0,
            'temperature' => 0.0,
            'blood_sugar' => 0,
        ]);

        return redirect()->route('admin.patients')->with('success', 'Patient added successfully!');
    }

    public function deletePatient(string $id)
{
    $user = User::findOrFail($id);

    Patient::where('user_id', $user->id)->delete();

    Appointment::where('user_id', $user->id)->delete();

    $user->delete();

    return redirect()
        ->route('admin.patients')
        ->with('success', 'Patient deleted successfully!');
}

    // --- ADMIN APPOINTMENTS ---
    public function adminAppointments() {
        $appointments = Appointment::with('user')->get();
        return view('admin.appointments', compact('appointments'));
    }

    public function adminUpdateAppointmentStatus(string $id, string $status) {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => $status]);
        return back()->with('success', 'Status updated successfully!');
    }
}