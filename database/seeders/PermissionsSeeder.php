<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $models = [
            'department', 'course', 'session', 'term', 'file',
            'document', 'quiz', 'question', 'rubric', 'feedback',
            'participant', 'myCourse', 'plan', 'user'
        ];

        foreach ($models as $model) {
            // create permissions
            Permission::create(['name' => $model . '.index']);
            Permission::create(['name' => $model . '.create']);
            Permission::create(['name' => $model . '.edit']);
            Permission::create(['name' => $model . '.delete']);
            Permission::create(['name' => $model . '.show']);
        }

        Permission::create(['name' => 'document.order']);
        Permission::create(['name' => 'menu.education']);
        Permission::create(['name' => 'menu.toolbox']);
        Permission::create(['name' => 'mentor.list']);
        


        $role1 = Role::create(['name' => 'Super-Admin']);

        // create role and assign permission to super visor
        $role2 = Role::create(['name' => 'supervisor']);
        foreach ($models as $model) {
            $role2->givePermissionTo($model . '.index');
            $role2->givePermissionTo($model . '.create');
            $role2->givePermissionTo($model . '.edit');
            $role2->givePermissionTo($model . '.show');
        }
        $role2->givePermissionTo('document.order');
        $role2->givePermissionTo('menu.education');
        $role2->givePermissionTo('menu.toolbox');
        $role2->givePermissionTo('mentor.list');

        // create roles and assign existing permissions to mentos
        $role3 = Role::create(['name' => 'mentor']);
        foreach ($models as $model) {
            $role3->givePermissionTo($model . '.index');
            $role3->givePermissionTo($model . '.show');
        }
        $role3->givePermissionTo('menu.education');
        $role3->givePermissionTo('mentor.list');
        

        // create roles and assign existing permissions
        $role4 = Role::create(['name' => 'student']);
        $role4->givePermissionTo('myCourse.index');




        // create users
        // participants
        // create demo users


        // Super Admin
        $admin = \App\Models\User::factory()->create([
            'name' => 'Wildan Frananda',
            'email' => 'wildanfrananda@microsoft.dev',
        ]);
        $admin->assignRole($role1);

        /*
        * SuperVisor Users
        */

        // SuperVisors Sofware
        $supervisor = \App\Models\User::factory()->create([
            'name' => 'Software SuperVisor',
            'email' => 'supervisor@learnify.ac.id',
        ]);
        $supervisor->assignRole($role2);

        // SuperVisors Kids
        $supervisorCyber = \App\Models\User::factory()->create([
            'name' => 'Cyber SuperVisor',
            'email' => 'cyber_supervisor@learnify.ac.id',
        ]);
        $supervisorCyber->assignRole($role2);

        // SuperVisors Teenage
        $supervisorNetwork = \App\Models\User::factory()->create([
            'name' => 'Network SuperVisor',
            'email' => 'network_supervisor@learnify.ac.id',
        ]);
        $supervisorNetwork->assignRole($role2);


        /*
        * Mentors Users
        */

        // mentor software
        $mentor = \App\Models\User::factory()->create([
            'name' => 'Software Mentor',
            'email' => 'software_mentor@learnify.ac.id',
        ]);
        $mentor->assignRole($role3);

        // mentor cyber
        $mentorCyber = \App\Models\User::factory()->create([
            'name' => 'Cyber Mentor',
            'email' => 'cyber_mentor@learnify.ac.id',
        ]);
        $mentorCyber->assignRole($role3);

        // mentor network
        $mentorNetwork = \App\Models\User::factory()->create([
            'name' => 'Network Mentor',
            'email' => 'network_mentor@learnify.ac.id',
        ]);
        $mentorNetwork->assignRole($role3);

        /*
        * students Users
        */

        // software student
        $student = \App\Models\User::factory()->create([
            'name' => 'Wildan Frananda',
            'email' => 'wildan@student.learnify.ac.id',
        ]);
        $student->assignRole($role4);


         // network student
         $studentNetwork = \App\Models\User::factory()->create([
            'name' => 'Nenden Nur Himami',
            'email' => 'nenden@student.learnify.ac.id',
        ]);
        $studentNetwork->assignRole($role4);

        
         // cyber student
         $studentCyber = \App\Models\User::factory()->create([
            'name' => 'Abdul Malik Dzakwan',
            'email' => 'dzakwan@student.learnify.ac.id',
        ]);
        $studentCyber->assignRole($role4);
    }
}
