<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // software department
        # 1
        \App\Models\Course::factory()->create([
            'title' => 'Software Engineering',
            'department_id' => 1
        ]);

        # 2
        \App\Models\Course::factory()->create([
            'title' => 'Design and Architecture',
            'department_id' => 1
        ]);

        # 3
        \App\Models\Course::factory()->create([
            'title' => 'Testing and Quality Assurance',
            'department_id' => 1
        ]);

        # 4
        \App\Models\Course::factory()->create([
            'title' => 'Project Management',
            'department_id' => 1
        ]);

        # 5
        \App\Models\Course::factory()->create([
            'title' => 'Development Life Cycle',
            'department_id' => 1
        ]);


        // network department
        # 6
        \App\Models\Course::factory()->create([
            'title' => 'Protocols and Standarts',
            'department_id' => 2
        ]);

        # 7
        \App\Models\Course::factory()->create([
            'title' => 'Network Security',
            'department_id' => 2
        ]);

        # 8
        \App\Models\Course::factory()->create([
            'title' => 'Wireless and Mobile Networks',
            'department_id' => 2
        ]);

        # 9
        \App\Models\Course::factory()->create([
            'title' => 'Cloud and Distributed Networks',
            'department_id' => 2
        ]);


        // cyber department
        # 10
        \App\Models\Course::factory()->create([
            'title' => 'Cybersecurity Fundamentals',
            'department_id' => 3
        ]);

        # 11
        \App\Models\Course::factory()->create([
            'title' => 'Ethics and Law',
            'department_id' => 3
        ]);

        # 12
        \App\Models\Course::factory()->create([
            'title' => 'Cyber Management',
            'department_id' => 3
        ]);

        # 13
        \App\Models\Course::factory()->create([
            'title' => 'Cyber Forensics',
            'department_id' => 3
        ]);

        # 14
        \App\Models\Course::factory()->create([
            'title' => 'Penetration Testing',
            'department_id' => 3
        ]);

        #15
        \App\Models\Course::factory()->create([
            'title' => 'Cryptography',
            'department_id' => 3
        ]);

        #16
        \App\Models\Course::factory()->create([
            'title' => 'Cybersecurity Operations',
            'department_id' => 3
        ]);

        // data department
        # 17
        \App\Models\Course::factory()->create([
            'title' => 'Programming for Data Science',
            'department_id' => 4
        ]);

        # 18
        \App\Models\Course::factory()->create([
            'title' => 'Data Mining',
            'department_id' => 4
        ]);
    }
}
