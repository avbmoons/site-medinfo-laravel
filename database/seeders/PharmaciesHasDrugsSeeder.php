<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmaciesHasDrugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('pharmacies_has_drugs')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'pharmacy_id' => random_int(1, 10),
                'drugs_id' => random_int(1, 10),
                'count' => random_int(10, 30)
            ];
        }

        return $data;
    }
}
