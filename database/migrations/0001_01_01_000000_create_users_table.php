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
       Schema::create('users', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('name'); // user's full name
            $table->string('email')->unique(); // user's email address, unique
            $table->timestamp('email_verified_at')->nullable(); // for email verification
            $table->string('password'); // hashed password
            $table->rememberToken(); // for remember me functionality
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        
    }
};
