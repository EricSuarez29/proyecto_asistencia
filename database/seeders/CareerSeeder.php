<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::create([
            'name' => 'Universidad Tecnologica de León'
        ]);

        Career::create([
            'name' => 'Desarrollo de Software',
            'acronym' => 'DSM',
            'school_id' => $school->id
        ]);

        Career::create([
            'name' => 'Gastronomía',
            'acronym' => 'GA',
            'school_id' => $school->id
        ]);

        Career::create([
            'name' => 'Desarrollo de Negocios',
            'acronym' => 'DN',
            'school_id' => $school->id
        ]);

        Career::create([
            'name' => 'Química',
            'acronym' => 'QM',
            'school_id' => $school->id
        ]);

        Career::create([
            'name' => 'Procesos Industriales',
            'acronym' => 'PI',
            'school_id' => $school->id
        ]);
    }
}
