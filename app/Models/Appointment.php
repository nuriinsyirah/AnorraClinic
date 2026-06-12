<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {
    protected $fillable = [
        'user_id', 'doctor_name', 'appointment_date', 
        'appointment_time', 'status', 'notes', 'amount', 'payment_method'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}