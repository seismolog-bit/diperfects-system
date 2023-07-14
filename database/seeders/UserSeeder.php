<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => '$2y$10$JsCOUktkd7/mSpe8FH5L1e/1BCcqXgJTyHEgtYG93Yvs5bfuz0mjq', //11223344
            'role' => 'administrator'
        ]);

        $cashier = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@mail.com',
            'password' => '$2y$10$JsCOUktkd7/mSpe8FH5L1e/1BCcqXgJTyHEgtYG93Yvs5bfuz0mjq', //11223344
            'role' => 'cashier'
        ]);

        $warehouse = User::create([
            'name' => 'Warehouse',
            'email' => 'warehouse@mail.com',
            'password' => '$2y$10$JsCOUktkd7/mSpe8FH5L1e/1BCcqXgJTyHEgtYG93Yvs5bfuz0mjq', //11223344
            'role' => 'warehouse'
        ]);

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@mail.com',
            'password' => '$2y$10$JsCOUktkd7/mSpe8FH5L1e/1BCcqXgJTyHEgtYG93Yvs5bfuz0mjq', //11223344
            'role' => 'manager'
        ]);
    }
}
