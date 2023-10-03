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
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role',['intern','admin'])->default('intern');
            $table->enum('status', ['active', 'inactive'])->default('active');
            // $table->string('phone');
            $table->text('city');
            $table->text('addres');
            $table->string('password');
            $table->string('image')->default('image_user.png')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
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
