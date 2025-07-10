<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For PostgreSQL, we need to handle the conversion explicitly
        if (DB::getDriverName() === 'pgsql') {
            // Convert time to datetime by combining with current date
            DB::statement("ALTER TABLE bookings ALTER COLUMN booked_time TYPE timestamp(0) without time zone USING (CURRENT_DATE + booked_time::time)");
        } else {
            // For other databases, use Laravel's change method
            Schema::table('bookings', function (Blueprint $table) {
                $table->dateTime('booked_time')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // For PostgreSQL, extract just the time part
        if (DB::getDriverName() === 'pgsql') {
            DB::statement("ALTER TABLE bookings ALTER COLUMN booked_time TYPE time USING booked_time::time");
        } else {
            Schema::table('bookings', function (Blueprint $table) {
                $table->time('booked_time')->change();
            });
        }
    }
};