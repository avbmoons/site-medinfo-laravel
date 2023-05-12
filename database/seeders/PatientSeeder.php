<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PatientStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('patients')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'created_at' => \now(),
                'updated_at' => \now(),
                'refresh_token' => \fake()->text(10),
                'access_token' => \fake()->text(10),
                'is_online' => true,
                'name' => \fake()->name(),
                'surname' => \fake()->name(),
                'barcode' => \fake()->text(10),
                'medical_card_stored_in_clinic_id' => random_int(11, 20),
                'status' => PatientStatus::ACTIVE->value,
                'insurance' => \fake()->text(10),

            ];
        }

        return $data;
    }
}
