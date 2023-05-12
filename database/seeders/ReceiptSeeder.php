<?php

namespace Database\Seeders;

use App\Enums\ReceiptStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receipts')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'patient_id' => random_int(11, 20),
                'doctor_id' => random_int(1, 5),
                'name' => \fake()->name(),
                'created_at' => \now(),
                'updated_at' => \now(),
                'valid_until_date' => date_create(),
                'drug_id' => random_int(1, 10),
                'barcode' => \fake()->text(10),
                'status' => ReceiptStatus::ACTIVE->value,
            ];
        }

        return $data;
    }
}
