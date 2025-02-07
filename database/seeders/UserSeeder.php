<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
        ], [
            'password' => Hash::make('password'),
        ]);

        $superAdmin->assignRole(Role::SUPERADMIN);
    }
}
