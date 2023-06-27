<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #1
        \App\Models\Department::factory()->create([
            'title' => 'Software Development',
        ]);

        #2
        \App\Models\Department::factory()->create([
            'title' => 'Network Architecutre',
        ]);

        #3
        \App\Models\Department::factory()->create([
            'title' => 'Cyber Security',
        ]);

        #4
        \App\Models\Department::factory()->create([
            'title' => 'Data Science',
        ]);
    }
}
