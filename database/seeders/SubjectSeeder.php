<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create(['name' => 'Desarrollo de Aplicaciones']);
        Subject::create(['name' => 'Administración del tiempo']);
        Subject::create(['name' => 'Metodología de la programación']);

        Subject::create(['name' => 'Gastronomia Francesa']);
        Subject::create(['name' => 'Frances']);

        Subject::create(['name' => 'Matermaticas I']);
        Subject::create(['name' => 'Matermaticas II']);
        Subject::create(['name' => 'Matermaticas III']);

        Subject::create(['name' => 'Expresión Oral I']);
        Subject::create(['name' => 'Expresión Oral II']);
    }
}
