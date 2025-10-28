<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            
            // Extra profile fields (not in patients table)
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('zip', 20)->nullable();

            $table->string('profile_photo')->nullable();

            // Health details
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->text('allergies')->nullable();
            $table->text('chronic_diseases')->nullable();
            $table->text('medications')->nullable();
            $table->text('past_surgeries')->nullable();

            // Donation details
            $table->date('last_donation_date')->nullable();
            $table->integer('total_donations')->default(0);
            $table->string('preferred_center')->nullable();
            $table->boolean('availability_status')->default(true);


            // Emergency contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relation')->nullable();

            // Notifications
            $table->string('notification_method')->default('email');

            $table->timestamps();

            // Foreign key
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_profiles');
    }
};
