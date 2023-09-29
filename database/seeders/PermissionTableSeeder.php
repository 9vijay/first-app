<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-add',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'hrm-add',
           'hrm-list',
           'hrm-create',
           'hrm-edit',
           'hrm-delete',
           'salary-add',
           'salary-list',
           'salary-create',
           'salary-edit',
           'salary-delete',
           'leaves-add',
           'leaves-list',
           'leaves-create',
           'leaves-edit',
           'leaves-delete',
           'attendence-add',
           'attendence-list',
           'attendence-create',
           'attendence-edit',
           'attendence-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
        $suparadmin = Role::where('name','suparadmin')->first();
        $suparadmin->givePermissionTo([

           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-add',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'hrm-add',
           'hrm-list',
           'hrm-create',
           'hrm-edit',
           'hrm-delete',
           'salary-add',
           'salary-list',
           'salary-create',
           'salary-edit',
           'salary-delete',
           'leaves-add',
           'leaves-list',
           'leaves-create',
           'leaves-edit',
           'leaves-delete',
           'attendence-add',
           'attendence-list',
           'attendence-create',
           'attendence-edit',
           'attendence-delete'
        ]);
    }
}
