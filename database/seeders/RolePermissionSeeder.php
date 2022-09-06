<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        //Role create
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);        
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        //permission create
        $permissions = [
            //dashboard
            'dashboard.view',

            //blog permission
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approved',

            //admin permission
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approved',

            //role permission
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approved',

            //profile permission
            'profile.view',
            'profile.edit',
        ];

        //create and assign permission
        for ($i=0; $i < count($permissions) ; $i++) { 
            $permission = Permission::create(['name' => $permissions[$i]]);

            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
