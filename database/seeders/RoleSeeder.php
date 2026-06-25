<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $permission = Permission::firstOrCreate(
            [
                'name' => 'edit articles',
                'guard_name' => 'web',
            ],
            [
                'display_name' => 'Edit Articles',
            ]
        );

        $adminRole->givePermissionTo($permission);

        $user = User::find(1);

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
