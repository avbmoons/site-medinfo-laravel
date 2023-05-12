<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PharmacyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('pharmacies')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'address' => \fake()->address(),
                'phone' => \fake()->phoneNumber(),
                'email' => \fake()->email(),
                'gps_coordinates' => \fake()->swiftBicNumber(),
                'working_modes' => \fake()->text(10),
                'organization_id' => random_int(1, 10),
                'created_at' => \now(),
                'updated_at' => \now(),
                'organization_types_id' => random_int(1, 10),
                'name' => \fake()->name(),
                'status' => PharmacyStatus::ACTIVE->value,
            ];
        }

        return $data;
    }
}
