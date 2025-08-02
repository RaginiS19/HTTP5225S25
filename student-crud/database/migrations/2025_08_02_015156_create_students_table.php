<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname');          // First name (required)
            $table->string('lname');          // Last name (required)
            $table->string('email')->unique(); // Email (unique)
            $table->timestamps();             // created_at and updated_at
            $table->softDeletes();            // deleted_at (for soft deletes)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};