<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\DoctorStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('doctors')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'created_at' => \now(),
                'updated_at' => \now(),
                'working_mode' => \fake()->text(10),
                'refresh_token' => \fake()->text(10),
                'access_token' => \fake()->text(10),
                'is_online' => true,
                'speciality_id' => random_int(1, 7),
                'name' => \fake()->name(),
                'surname' => \fake()->name(),
                'education_organization_id' => random_int(1, 8),
                'status_id' => random_int(1, 9),
                'status' => DoctorStatus::ACTIVE->value,
            ];
        }

        return $data;
    }
}
