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
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->text('introduction')->nullable();
            $table->string('email', 150)->unique();
            $table->string('image', 100)->default('profile_pic.png');
            $table->string('password', 150);
            $table->string('github_link', 150)->nullable();
            $table->string('linkedin_link', 150)->nullable();
            $table->string('facebook_link', 150)->nullable();
            $table->string('twitter_link', 150)->nullable();
            $table->string('titles', 200)->nullable();
            $table->string('cv', 100)->nullable();
            $table->string('cv_image', 100)->nullable();
            $table->string('address', 200)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('country', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('mobile_number', 50)->nullable();
            $table->string('phone_number', 50)->nullable();

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
