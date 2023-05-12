<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('services')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => \fake()->name(),
                'description' => \fake()->text(10),
                'price' => \fake()->randomFloat(2, 1, 1000),
                'rules_url' => \fake()->url(),
                'created_at' => \now(),
                'updated_at' => \now(),

            ];
        }

        return $data;
    }
}
