<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionsSeeder extends Seeder
{
    public function run(): void
    {
        /** -----------------------------------------------------------------
         *  SUPER ADMIN (Guard: web)
         *  ----------------------------------------------------------------*/
        $webGuard = 'web';

        $superAdminPerms = [
            'manage_users',
            'manage_roles',
            'manage_permissions',
            'view_reports',
        ];

        foreach ($superAdminPerms as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => $webGuard,
            ]);
        }

        $roleSuperAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
            'guard_name' => $webGuard,
        ]);
        $roleSuperAdmin->givePermissionTo($superAdminPerms);

        $superAdminUser = User::firstOrCreate(
            ['email' => 'superadmin@email.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123456'),
            ]
        );
        $superAdminUser->assignRole($roleSuperAdmin);

        /** -----------------------------------------------------------------
         *  ADMIN (Guard: web)
         *  ----------------------------------------------------------------*/
        $adminPerms = [
            'manage_students',
            'manage_classes',
            'view_reports',
        ];

        foreach ($adminPerms as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => $webGuard,
            ]);
        }

        $roleAdmin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => $webGuard,
        ]);
        $roleAdmin->givePermissionTo($adminPerms);

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@email.com'],
            [
                'name' => 'Admin Sekolah',
                'password' => Hash::make('123456'),
            ]
        );
        $adminUser->assignRole($roleAdmin);

        /** -----------------------------------------------------------------
         *  STUDENT (Guard: student)
         *  ----------------------------------------------------------------*/
        $studentGuard = 'student';

        $studentPerms = [
            'student_dashboard',
            'view_grades',
            'edit_profile',
        ];

        foreach ($studentPerms as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => $studentGuard,
            ]);
        }

        $roleStudent = Role::firstOrCreate([
            'name' => 'student',
            'guard_name' => $studentGuard,
        ]);
        $roleStudent->givePermissionTo($studentPerms);

        $studentUser = Student::firstOrCreate(
            ['email' => 'student@email.com'],
            [
                'name' => 'Siswa Pertama',
                'password' => Hash::make('123456'),
            ]
        );
        $studentUser->assignRole($roleStudent);

        /** -----------------------------------------------------------------
         *  DONE
         *  ----------------------------------------------------------------*/
        $this->command->info('✅ Seeder berhasil! User, Role, dan Permission berhasil dibuat.');
    }
}
