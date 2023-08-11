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
        Schema::create('employees', function (Blueprint $table) {

            $table->id();
            $table->string('empcode')->unique(); // Add this line
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('EmailId'); // Correct column name
            $table->string('Password');
            $table->string('Gender');
            $table->string('Dob');
            $table->string('Department');
            $table->string('Address'); // Removed leading space
            $table->string('City');
            $table->string('Country');
            $table->string('PhoneNumber'); // Made it CamelCase to match others
            $table->string('Status');
            $table->string('RegDate');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
