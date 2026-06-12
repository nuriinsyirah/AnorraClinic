<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
    protected $fillable = ['user_id', 'blood_pressure', 'heart_rate', 'temperature', 'blood_sugar', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}