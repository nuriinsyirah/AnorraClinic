<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('doctor_name');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('status')->default('Pending');
            $table->text('notes')->nullable();
            $table->decimal('amount', 8, 2)->default(40.00);
            $table->string('payment_method')->default('Cash');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('appointments');
    }
};
