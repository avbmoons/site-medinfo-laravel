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
        Schema::create('patients', static function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('refresh_token');
            $table->string('access_token');
            $table->boolean('is_online');
            $table->string('name');
            $table->string('surname');
            $table->string('barcode');
            $table->foreignId('medical_card_stored_in_clinic_id')->constrained('clinics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
