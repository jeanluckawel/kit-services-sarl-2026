<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {

        $permissions = [
            // Employees
            'create_employee',
            'view_employee',
            'edit_employee',
            'delete_employee',
            'import_employee',
            'export_employee',

            // Customers
            'create_customer',
            'view_customer',
            'edit_customer',
            'delete_customer',
            'create_invoice',
            'view_invoice',
            'edit_invoice',
            'delete_invoice',

            // Users
            'create_user',
            'view_user',
            'edit_user',
            'delete_user',

            // Roles
            'create_role',
            'view_role',
            'edit_role',
            'delete_role',

            // Aucun rôle
            'none',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }


        $roles = [
            'admin' => Permission::all()->pluck('name')->toArray(),
            'drh' => [
                'create_employee', 'view_employee', 'edit_employee', 'delete_employee',
                'import_employee', 'export_employee',
                'create_customer', 'view_customer', 'edit_customer', 'delete_customer',
                'create_invoice', 'view_invoice', 'edit_invoice', 'delete_invoice',
            ],
            'clerk' => [
                'create_employee', 'view_employee',
            ],
            'none' => [],
        ];

        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);

            $role->syncPermissions($perms);
        }


        $users = [
            [
                'name' => 'Admin ',
                'email' => 'admin@kit-services.org',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'DRH ',
                'email' => 'drh@kit-services.org',
                'password' => bcrypt('password'),
                'role' => 'drh',
            ],
            [
                'name' => 'Clerk ',
                'email' => 'clerk@kit-services.org',
                'password' => bcrypt('password'),
                'role' => 'clerk',
            ],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => $data['password'],
                ]
            );

            $user->syncRoles([$data['role']]);
        }
    }
}
