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
        Schema::create('pharmacies_has_drugs', function (Blueprint $table) {
            $table->foreignId('pharmacy_id')->references('id')->on('pharmacies')->cascadeOnDelete();
            $table->foreignId('drugs_id')->references('id')->on('drugs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        //
    }
};
