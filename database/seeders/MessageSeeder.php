<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('messages')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'recipient_id' => random_int(1, 5),
                'sender_id' => random_int(1, 5),
                'message' => \fake()->text(10),
                'created_at' => \now(),
                'updated_at' => \now(),
                'sender_is_patient' => true,
            ];
        }

        return $data;
    }
}
