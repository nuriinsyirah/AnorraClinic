# Anorra Clinic
# AnorraClinic - Online Clinic Appointment Booking System

## Group Information
**Group Name:** Moon
**Section:** 1

**Group Members:**
- Nik Siti Aishah Alhumaira binti Nik Syahriman - 2412928 
- Nur Insyirah binti Shariffudin - 2413204 
- Nur Atina binti Zubaidi - 2412632 
- Nur Izzati Atiqah Binti Abd Razak - 2418940 
- Nurfarah Liyana binti Azahari - 2412040

## Project Overview 
Introduction: 
The Smart Clinic Appointment Management System is a web website built on the Laravel framework to help small medical clinics manage their daily tasks better. Our project aims to replace slow, manual workflows, like paper logbooks and Excel sheets because we want to solve common problems such as double-bookings, data entry errors, and long waiting lines. The system utilizes core framework features, including secure authentication to protect patient data, web routes for smooth navigation, and full CRUD operations to manage records easily. Ultimately, we developed a secure, self-service Patient Portal for booking appointments and tracking health metrics in real-time, and an Admin Dashboard that gives clinic staff complete control over digital patient records and doctor schedules.

## Project Objectives
Primary Goal: Create a functional clinic appointment management platform that connects patients and administrators.
Technical Goal: Implement Laravel MVC architecture, routing, authentication, and full CRUD operations in a real-world system.
User Experience Goal: Provide a convenient, organized, and intuitive booking interface for patients.
Business Goal: Enable efficient clinic operations and reduce manual errors in managing schedules and patient records through a centralized platform.

## Target Users
Patients: Individuals looking to register, book appointments, and monitor their schedules online.
Doctors: Medical professionals who need to view their daily schedules and manage availability.
Administrators: Clinic staff and managers who handle patient records, approve appointment requests, and oversee platform information.

## Features and Functionalities

**Patient Features**
- User Registration & Login: Enter the username and password to protect patient data. 
- Patient Dashboard: Overview of patient’s health condition, appointment made in the calendar, appointment summary,  and appointment history
- Appointment Page: View the appointment detail made
- Appointment Booking: Book an appointment via selecting the available doctor, date, time and description of the symptoms
- History Tracking: View past and upcoming medical appointment records.
- Profile Management: Update user personal information like age, contact number, gender

**Admin Features**
– Admin dashboard: Overview of clinic functionality and operations including Patient volume and number of patients scheduled per day.
- Schedule Management: Manage days(skd_day) and hours(skd_time) for specific doctors available to see the patients.
- Doctor Roster Management: Create, update or delete numerous doctors along with their specialty type in system.
- Patient Record: View the details of the registry's enrolled patients in a secure manner.
Appointment Control: Approve and/or modify patient appointments within the system. 

## Technical Implementation 

**Technology Stack**
- Backend Framework: Laravel 10.x
- Frontend: Blade Templates with Bootstrap 5 (HTML/CSS)
- Database: MySQL 8.0
- Authentication: Laravel Breeze
- Development Environment: XAMPP/ Visual Studio Code

### Entity Relationship Diagram (ERD)

https://docs.google.com/document/d/1fWjODnfmgeQAYN3PjOL6URY2a5C5bufPL2Yg--C38Hc/edit?usp=sharing 
 
Key relationships: 
Patient can have multiple appointment (One-to-Many)
Doctor can have multiple appointment (One-to-Many)
Doctor can have multiple schedules (One-to-Many)
The admin manages all the relationships between Patients, Doctors and Schedules.


## Laravel Components Implementation 

Routes (web.php)  
Route::get('/', [AnorraController::class, 'home'])->name('home');
Route::get('/about', [AnorraController::class, 'about'])->name('about');
Route::post('/logout', [AnorraController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Guest Only Routes (Login & Registration Features)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    // Login endpoints
    Route::get('/login', [AnorraController::class, 'showLogin'])->name('login');
    Route::post('/login', [AnorraController::class, 'login']);


    // Registration endpoints
    Route::get('/register', [AnorraController::class, 'showRegister'])->name('register');
    Route::post('/register', [AnorraController::class, 'register']);
});


/*
|--------------------------------------------------------------------------
| Authenticated Patient (User) Dashboard Framework Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AnorraController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/profile', [AnorraController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile', [AnorraController::class, 'updateUserProfile'])->name('user.profile.update');
    Route::get('/my-appointments', [AnorraController::class, 'userAppointments'])->name('user.appointments');
    Route::get('/book-appointment', [AnorraController::class, 'showCreateAppointment'])->name('user.appointment.create');
    Route::post('/book-appointment', [AnorraController::class, 'storeAppointment']);
    Route::post('/appointment/cancel/{id}', [AnorraController::class, 'cancelAppointment'])->name('user.appointment.cancel');
});


/*
|--------------------------------------------------------------------------
| Authenticated Admin Dashboard Control Management Area Route List
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
   
    Route::get('/dashboard', [AnorraController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/profile', [AnorraController::class, 'adminProfile'])->name('profile');
   
    // Patient Routes
    Route::get('/patients', [AnorraController::class, 'adminPatients'])->name('patients');
    Route::get('/patients/add', [\App\Http\Controllers\AnorraController::class, 'showAddPatient'])->name('patients.add');
    Route::post('/patients/store', [AnorraController::class, 'storePatient'])->name('patients.store');
    Route::delete('/patients/delete/{id}', [AnorraController::class, 'deletePatient'])
    ->name('patients.delete');


    // Appointment Routes
    Route::get('/appointments', [AnorraController::class, 'adminAppointments'])->name('appointments');
    Route::post('/appointment/{id}/{status}', [AnorraController::class, 'adminUpdateAppointmentStatus'])->name('appointment.status');
});

- Controllers 

*Main Controllers Implemented are below:*
1. AnorraController: Central controller handling all core application logic including front-end views, authentication processing, patient record management, and appointment scheduling. 

- Models and Relationships 
php // User Model
class User extends Authenticatable { 
use Notifiable; 
protected $fillable = [ 'name', 'username', 'email', 'password', 'role', 'dob', 'present_address', 'permanent_address', 'city', 'postal_code', 'country' 
]; 
public function appointments() { 
return $this->hasMany(Appointment::class); 
} 
public function patientProfile() { 
return $this->hasOne(Patient::class);
 	}
 } 

// Appointment Model 
class Appointment extends Model { 
protected $fillable = [ 'user_id', 'doctor_name', 'appointment_date', 'appointment_time', 'status', 'notes', 'amount', 'payment_method' 
]; 
public function user() { 
return $this->belongsTo(User::class); 
} 
}

// Patient Model
class Patient extends Model { 
protected $fillable = [ 'user_id', 'blood_pressure', 'heart_rate', 'temperature', 'blood_sugar', 'status' 
]; 
public function user() { 
return $this->belongsTo(User::class); 
} 
}

- Views and User Interface

  *Blade Templates Structure:*
- layouts/app.blade.php - Core application frame for authenticated sessions 
- layouts/guest.blade.php - Layout frame used for authentication and guest pages
- layouts/navigation.blade.php - Dynamic responsive top navigation navbar
- public/home.blade.php - Patient landing page for the Anorra platform 
- public/about.blade.php - Informational page detailing the medical platform 
- public/login.blade.php - Custom entry gateway form for system users 
- public/register.blade.php - Digital enrollment form for new patients 
- user/dashboard.blade.php - Medical portal landing for authenticated patients 
- user/appointments.blade.php - Schedule log showing patient's historical and upcoming visits 
- user/create_appointment.blade.php - Interactive scheduling form to book new doctor visits 
- user/profile.blade.php - Personal details configuration panel for patients 
- admin/dashboard.blade.php - Executive control hub for clinic administrators 
- admin/patients.blade.php - Master directory index of all registered system patients 
- admin/appointments.blade.php - Central queue monitoring panel for all scheduled sessions 
- admin/add-patient.blade.php - Administration utility to register patient profiles manually 
- profile/edit.blade.php - Central account management page with sub-form configurations 

*Design Features:*
- Color Scheme: Clean and professional to suit the healthcare field
- Navigation: Intuitive menu structure utilizing role-based access controls for each different roles
- Interactive Elements: Form inputs, action status tracking, and dynamic dashboard tables
- Tailwind CSS Framework Components: Built utilizing responsive, modern UI elements including pre-styled modals, text inputs, and danger action triggers. 

## User Authentication System 
### Authentication Features
- Registration System: Secure new account creation for patients, gathering key details including full name, birth date, email address, and residency location.
- Login System: Role-specific secure authentication using a dedicated username and password portal that seamlessly differentiates and redirects admins and patients.
- Role-Based Access: Specialized interfaces dynamically loaded based on account type:
- Admin Dashboard: Centralized panel tracking total appointments, pending approvals, cancelled sessions, annual patient enrollment statistics, and real-time vital metrics records.
- Patient Dashboard: Self-service layout showcasing vital medical metrics (blood pressure, heart rate, temperature, blood sugar), upcoming schedules, and integrated historical metrics logs.
- Profile Management: Dual-mode profile editing panels equipped with profile picture uploading capabilities and toggle tabs ("Edit Profile" and "Preferences") for personal account curation 

### Security Measures 
- Password encryption using Laravel’s built-in hashing engine to ensure credential protection.
- Strict middleware route defenses preventing unauthenticated users from bypassing login frames or accessing high-privilege administrative clinic screens.
- Form data input validation and sanitization during registration, booking processing, and profile updates.
- Universal CSRF token protection on all post submission methods, protecting user sessions against cross-site request forgery vectors.

## Installation and Setup Instructions 
### Prerequisites: 
- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL 8.0
- XAMPP 

### Step-by-Step Installation

1. Clone the Repository

git clone [https://github.com/](https://github.com/)[nuriinsyirah]/Anorra.git
cd Anorra

2. Install Dependencies

bashcomposer install
npm install

3. Environment Configuration

bashcp .env.example .env
php artisan key:generate

4. Database Setup

bash# Configure database in .env file
php artisan migrate
php artisan db:seed

5. Start Development Server

bashphp artisan serve
npm run dev


## Usage Guide

Once the development server is running and you navigate to http://127.0.0.1:8000, use the following guidelines to test the application features.

###  Test Credentials
To explore the role-based dashboards without creating new accounts, you can use these pre-registered credentials:

Patient (User)
username: ayualias
password: password123
Administrator
username: ahmadfarish
password: admin123

### Patient (User) Walkthrough
1. Authentication: Go to the login page and enter the patient credentials.
2. Dashboard: Upon entering, you will be redirected to the Patient dashboard tracking your medical status summary.
3. Book Appointment: Click “Book Appointment” in the navigation menu. Select your doctor, a calendar date, an available time slot, and add any specific medical notes. Click “Submit”.
4. View Schedules: Go to “My Appointments” to view your active booking requests. You can monitor whether the admin has approved them or choose to cancel an appointment.

### Administrator Walkthrough
1. Log In: Authenticate using the admin account credentials.
2.Admin Dashboard: Access the Admin Dashboard to view pending clinic requests and registered patient volumes.
3. Approve/Deny Appointments: Navigate to the Appointments queue to instantly update the status of incoming patient requests.
4. Manage Patients: View the patient index directory or manually add new records using the registration utility forms.

##  Testing and Quality Assurance
### Functionality Testing
- End-to-End Appointment Lifecycle: We tested the complete appointment process, starting from browsing the website homepage, registering a patient account, logging in, accessing the patient portal, and submitting an appointment request. All functions worked as expected throughout the user journey. 
- Sidebar Navigation: We tested all navigation tabs in the patient portal, including Dashboard, About Us, Appointments, and Profile. We confirmed that each page loaded correctly and maintained a consistent website layout without any navigation issues. 
- Form Data Integrity and Server-Side Validation: We verified that important fields such as Full Name, Date, Time, Contact Number, and Email could correctly receive and store user input. The system successfully prevented empty or invalid submissions and displayed appropriate error messages to guide users. 
- Admin Dashboard Calculation: We checked the statistics displayed on the admin dashboard, including Total Appointments, Pending Approvals, and Cancelled Appointments. The results were accurate and updated automatically based on the latest records stored in the database. 
### Browser Compatibility
We tested the website on different web browsers to ensure a consistent user experience across all platforms. 
-Google Chrome: All pages displayed correctly, with proper layout alignment and accurate rendering of design elements such as shadows and content boxes. 
-Microsoft Edge: The website functions worked smoothly without any errors. The responsive layout also adjusted properly when the browser window was resized. 
-Apple Safari: Text formatting and alignment remained consistent across pages. In addition, doctor profile images were displayed correctly and maintained their circular shape. 
### Performance Testing
- Blade Page Assembly Optimization: We improved the website structure by using a master layout that is shared across multiple pages. This reduced duplicate code and helped pages load faster, with an average response time of less than 1.5 seconds on the local server. 
- Asset Management Optimization:  We used Content Delivery Networks (CDNs) and optimized CSS utility classes to manage the website's styling. This helped reduce page loading time and prevented performance issues caused by large or unnecessary stylesheet files.
  
## Challenges Faced and Solutions
### Challenge 1: Duplicate Page Structure and Layout Issues 
The Problem: At the beginning of development, several view files such as index.blade.php and create.blade.php contained repeated HTML code, including the <head> and <body> sections. This caused layout conflicts, resulting in broken page structures, navigation problems, and sidebar menus that could not be clicked properly. 
The Solution: To solve this issue, we created a shared layout file called patient.blade.php to store common components such as the sidebar and navigation bar. We then removed the duplicate HTML code from individual pages and used Blade template inheritance with @extends and @section to ensure a consistent layout across the system. 
### Challenge 2: Routing Errors with Nested View Folders 
The Problem: After organizing view files into subfolders such as resources/views/user, the system could no longer locate some pages correctly. This caused routing errors and certain pages displayed 404 error messages. 
The Solution: We updated the routing configuration in web.php to use Laravel's dot notation when referencing views. For example, view('user.dashboard') and view('user.about') were used instead of view('dashboard'). This allowed Laravel to correctly find and load the view files from their respective folders. 
### Challenge 3: Active Sidebar Highlight Not Displaying Correctly 
The Problem: When users moved between the appointment list page and the appointment booking page, the active highlight on the sidebar disappeared. This made it difficult for users to know which section they were currently viewing. 
The Solution: We modified the sidebar navigation by using Blade conditional statements and wildcard route matching, such as request()->is('appointments*'). This ensured that the appointment menu remained highlighted even when users navigated to related pages within the same section. 

## Future Enhancements
-SMS and WhatsApp Notification Integration: In the future, the system can be integrated with messaging services such as Twilio to automatically send SMS or WhatsApp notifications to patients. This will allow patients to receive appointment reminders and booking status updates whenever their appointment is confirmed, rescheduled, or cancelled. 
-Asynchronous Booking Calendar: Currently, appointments are booked using standard input fields. Future development could include an interactive calendar using FullCalendar.js, allowing patients to view available time slots in real-time and helping to prevent double bookings. 
-Secure Medical Record Management: A medical record module can be added to the admin panel, enabling clinic staff to securely store and manage patient information. This may include consultation records, medical notes, treatment history, and prescribed medications for each patient. 
-Health Data Visualization: The patient portal can be enhanced by integrating Chart.js to display health information in graphical form. This feature would allow patients to track health metrics such as blood pressure and heart rate over time, making it easier to monitor their overall health trends. 

## Learning Outcomes & Conclusion
### Technical Skills Gained
- Laravel Blade Template Hierarchy: We gained experience using Laravel Blade templates, including template inheritance, reusable layouts, and passing data between views. This helped us create a more organized and maintainable project structure.
- Web Routing and Middleware Implementation: We learned how to create and manage application routes, protect pages using authentication middleware, and handle URL requests securely within the Laravel framework. 
- Frontend Styling with Tailwind CSS: We improved our frontend development skills by building responsive user interfaces using Tailwind CSS. We applied Flexbox, CSS Grid, and mobile-first design principles to create a user-friendly experience.
   
### Soft Skills Developed
-Problem-Solving and Debugging: Throughout the project, we developed systematic debugging skills by analyzing Laravel error messages and using browser developer tools to identify and resolve issues efficiently. 
-Teamwork and Communication: We strengthened our ability to work as a team by discussing solutions, sharing responsibilities, and supporting one another when facing development challenges. 
-Technical Documentation: We improved our documentation skills by preparing project reports, recording system requirements, and explaining technical processes in a clear and structured manner.

### Key Achievements
- Operational Clinic Portal: We successfully developed the Anorra Clinic Management System, which provides appointment management features for both patients and clinic administrators. 
- Well-Organized Code Structure:  We improved the quality of our code by reducing duplication and implementing a reusable layout structure, making the system easier to maintain and expand. 
- Role-Based User Experiences: We designed separate interfaces for patients and administrators, ensuring that each user group can easily access the features relevant to their needs.
  
### Project Impact
The Anorra Clinic Management System demonstrates how technology can improve the efficiency of clinic operations. Patients can conveniently book appointments online without needing to call the clinic, while staff can manage appointment records through a centralized system. This helps reduce paperwork, minimize human errors, and improve the overall appointment management process. 

## References 
1. Nguyen, L. A. T., Huynh, T. S., Tran, D. T., & Vu, Q. H. (2022). Design and Implementation of Web Application Based on MVC Laravel Architecture. European Journal of Electrical Engineering and Computer Science, 6(4), 23–29. Retrieved from https://doi.org/10.24018/ejece.2022.6.4.448
2. Oracle Corporation. (2019). MySQL :: MySQL 8.0 Reference Manual. Mysql.com. Retrieved from https://dev.mysql.com/doc/refman/8.0/en/
3. Laravel Documentation. (2024). Laravel 10.x Documentation. Retrieved from https://laravel.com/docs/10.x
4. PHP MVC Architecture | Complete Guide to Model-View-Controller | Web Reference. (2026). Webreference.com. 
Retrieved from https://webreference.com/php/web-development/mvc/
