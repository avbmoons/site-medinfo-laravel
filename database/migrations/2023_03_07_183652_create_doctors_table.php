<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('doctors', static function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('working_mode')->nullable();
            $table->string('refresh_token');
            $table->string('access_token');
            $table->boolean('is_online');
            $table->foreignId('speciality_id')->constrained();
            $table->string('name');
            $table->string('surname');
            $table->foreignId('education_organization_id')->constrained('organizations');
            $table->foreignId('status_id')->constrained('doctor_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
