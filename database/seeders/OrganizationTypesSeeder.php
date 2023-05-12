<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\OrganizationTypeStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('organization_types')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'organizationType' => \fake()->name(),
                'description' => \fake()->text(),
                'created_at' => \now(),
                'updated_at' => \now(),
                'status' => OrganizationTypeStatus::ACTIVE->value,
            ];
        }

        return $data;
    }
}
