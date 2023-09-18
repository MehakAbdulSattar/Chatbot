<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Replace with your model
use App\Models\Permission; // Replace with your model


class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // Example: Insert dummy users
        $user1=User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Smith Toe',
            'email' => 'smith@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Begu',
            'email' => 'begu@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Lami',
            'email' => 'Lami@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Huma',
            'email' => 'huma@gmail.com',
            'password' => bcrypt('password'),
        ]);

       $user =  User::create([
            'name' => 'Doka',
            'email' => 'doka@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'kemi',
            'email' => 'kemi@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Department::create([
            'name' => 'Sales',
        ]);

        Department::create([
            'name' => 'Marketing',
        ]);

        Department::create([
            'name' => 'Data Entry',
        ]);

        Department::create([
            'name' => 'HR',
        ]);

        Department::create([
            'name' => 'Developers',
        ]);


        Team::create([
            'name' => 'Alpine',
            'department_id' => '1',
            'teamlead_id' => '1',
        ]);

        Team::create([
            'name' => 'Squad',
            'department_id' => '2',
            'teamlead_id' => '2',
        ]);

        Team::create([
            'name' => 'Wineers',
            'department_id' => '3',
            'teamlead_id' => '3',
        ]);

        Team::create([
            'name' => 'Cheers',
            'department_id' => '4',
            'teamlead_id' => '4',
        ]);

        Team::create([
            'name' => 'Kaliya',
            'department_id' => '5',
            'teamlead_id' => '5',
        ]);

        TeamMember::create([
            'team_id' => '5',
            'user_id' => '5',
        ]);

        TeamMember::create([
            'team_id' => '2',
            'user_id' => '2',
        ]);

        TeamMember::create([
            'team_id' => '3',
            'user_id' => '3',
        ]);

        TeamMember::create([
            'team_id' => '4',
            'user_id' => '4',
        ]);

        TeamMember::create([
            'team_id' => '1',
            'user_id' => '1',
        ]);


        Task::create([
            'name' => 'Code',
            'user_id' => '4',
        ]);

        Task::create([
            'name' => 'Bugs',
            'user_id' => '3',
        ]);

        Task::create([
            'name' => 'Requirments',
            'user_id' => '2',
        ]);

        Task::create([
            'name' => 'Run',
            'user_id' => '1',
        ]);

        Task::create([
            'name' => 'Compile',
            'user_id' => '5',
        ]);
        

        $permissions= [
        'user_create',
        'user_view',
        'user_edit',
        'user_delete',
        
        'department_create',
        'department_view',
        'department_edit',
        'department_delete',
        
        
        'team_create',
        'team_view',
        'team_edit',
        'team_delete',
        
        'team_member_add',
        'team_member_view',
        'team_member_remove',
        
        
        'task_create',
        'task_view',
        'task_edit',
        'task_delete',
    ];
    
        foreach ($permissions as $permission)
        {
            Permission::create([
                'name' => $permission,
                'guard_name'=>'web',
            ]);

            Permission::create([
                'name' => $permission,
                'guard_name'=>'api',
            ]);

        }


        $user->givePermissionTo($permissions); //doku

        $user1->givePermissionTo(['team_create', 'department_create']); //john



    }

}

