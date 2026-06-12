<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role',
        'dob', 'present_address', 'permanent_address', 'city', 'postal_code', 'country'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function patientProfile() {
        return $this->hasOne(Patient::class);
    }
}