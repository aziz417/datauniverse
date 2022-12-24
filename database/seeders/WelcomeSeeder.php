<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class WelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name' => 'welcome',
                'permissions' => [
                    'create',
                    'edit',
                    'delete',
                    'status'
                ]
            ]
        ];

        foreach ($modules as $module) {
            foreach ($module['permissions'] as $permission) {
                Permission::create([
                    'name' => $module['name'] . ' ' . $permission,
                    'module_name' => $module['name'],
                    'guard_name' => 'admin',
                ]);
            }
        }
    }
}
