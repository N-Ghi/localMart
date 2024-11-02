<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // Automatically creates an auto-incrementing ID column
            $table->string('business_type'); // Type of business (e.g., cooking class, restaurant)
            $table->string('location'); // Address
            $table->string('phone_number'); // Phone number
            $table->string('payment_info'); // Payment information (bank account, mobile money code, etc.)
            $table->time('business_hours_open'); // Opening time (HH:mm)
            $table->time('business_hours_close'); // Closing time (HH:mm)
            $table->text('about'); // Description of the business
            $table->json('social_media'); // Social media links (stored as JSON for flexibility)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
