<?php

namespace Database\Seeders;

use App\Models\AssistanceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssistanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssistanceType::create([
            'type' => 'A'
        ]);

        AssistanceType::create([
            'type' => 'F'
        ]);

        AssistanceType::create([
            'type' => 'R'
        ]);

        AssistanceType::create([
            'type' => 'J'
        ]);
    }
}
