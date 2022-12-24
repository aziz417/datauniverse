<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CommandSeeder extends Seeder
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
                'name' => 'client and product',
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
