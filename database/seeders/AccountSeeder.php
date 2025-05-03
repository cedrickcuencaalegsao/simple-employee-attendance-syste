<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now()->toDateTimeString();

        DB::table('users')->insert([
            [
                'uuid' => Str::random(15),
                'username' => 'admin',
                'first_name' => 'System',
                'middle_name' => null,
                'last_name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // change this
                'is_admin' => true,
                'is_deleted' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'uuid' => Str::random( 15),
                'username' => 'jdoe',
                'first_name' => 'John',
                'middle_name' => null,
                'last_name' => 'Doe',
                'email' => 'jdoe@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'is_deleted' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'uuid' => Str::random(15),
                'username' => 'asmith',
                'first_name' => 'Alice',
                'middle_name' => null,
                'last_name' => 'Smith',
                'email' => 'asmith@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'is_deleted' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'uuid' => Str::random(15),
                'username' => 'bjones',
                'first_name' => 'Bob',
                'middle_name' => null,
                'last_name' => 'Jones',
                'email' => 'bjones@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'is_deleted' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
