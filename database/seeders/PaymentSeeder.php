<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
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
                'patient_id' => random_int(1, 10),
                'payment_type_id' => random_int(1, 10),
                'service_id' => random_int(1, 10),
                'payment_status_id' => random_int(1, 10),
                'created_at' => \now(),
                'updated_at' => \now(),
                'description' => \fake()->text(10),

            ];
        }

        return $data;
    }
}
