<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'assign-role-list',
            'assign-role-create',
            'assign-role-edit',
            'assign-role-delete',
            'gallery-list',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'scheme-list',
            'scheme-create',
            'scheme-edit',
            'scheme-delete',
            'about-list',
            'about-create',
            'about-edit',
            'about-delete',
            'pages-list',
            'pages-create',
            'pages-edit',
            'pages-delete',
            'promotions-list',
            'promotions-create',
            'promotions-edit',
            'slider-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'slider-delete',
            'rate-list',
            'rate-create',
            'rate-edit',
            'rate-delete',
            'settings-socialMedia',
            'settings-admin',
            'settings-contact',
            'settings-sellers',
            'settings-home.page.seo',






        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => 'web', 'display_name' => ucwords(str_replace('-', ' ', $permission))]
            );
        }
    }
}
