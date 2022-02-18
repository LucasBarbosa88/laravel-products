<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Defender::createRole('admin');
        
        // Admin
        $admin = App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.dev',
            'password' => Hash::make('admin1234'),
        ]);

        $admin->attachRole($roleAdmin);
    }
}
