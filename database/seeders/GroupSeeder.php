<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$group->factor->hasStudents(10)->create();
        Group::factory()
            ->hasAttached(
                Student::factory()->count(10)
            )
            ->create();
    }
}
