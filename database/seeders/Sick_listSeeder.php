<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sick_listSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('sick_lists')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'patient_id' => random_int(11, 20),
                'doctor_id' => random_int(1, 5),
                'description' => \fake()->text(10),
                'created_at' => \now(),
                'updated_at' => \now(),
                'valid_until_date' => date_create(),
                'diagnosis_id' => random_int(1, 10),
                'receipt_id' => random_int(11, 23),
            ];
        }

        return $data;
    }
}
