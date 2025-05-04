<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $users = [
            [
                'uuid' => Str::random(15),
                'username' => 'admin',
                'first_name' => 'System',
                'middle_name' => null,
                'last_name' => 'Admin',
                'department' => 'IT',
                'position' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ],
            [
                'uuid' => Str::random(15),
                'username' => 'jdoe',
                'first_name' => 'John',
                'middle_name' => 'M',
                'last_name' => 'Doe',
                'department' => 'Finance',
                'position' => 'Accountant',
                'email' => 'jdoe@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'uuid' => Str::random(15),
                'username' => 'asmith',
                'first_name' => 'Alice',
                'middle_name' => 'B',
                'last_name' => 'Smith',
                'department' => 'HR',
                'position' => 'HR Specialist',
                'email' => 'asmith@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'uuid' => Str::random(15),
                'username' => 'bjones',
                'first_name' => 'Bob',
                'middle_name' => 'C',
                'last_name' => 'Jones',
                'department' => 'Engineering',
                'position' => 'Developer',
                'email' => 'bjones@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
        ];

        // Insert users and track their UUIDs
        foreach ($users as $user) {
            $user['is_deleted'] = false;
            $user['created_at'] = $now;
            $user['updated_at'] = $now;

            DB::table('users')->insert($user);

            // Add 5 perfect and 2 imperfect attendance records
            for ($i = 0; $i < 7; $i++) {
                $isPerfect = $i < 5;
                DB::table('attendance')->insert([
                    'uuid' => $user['uuid'],
                    'attID' => Str::random(15),
                    'time_in' => $isPerfect || $i % 2 == 0 ? '08:00:00' : null,
                    'time_out' => $isPerfect || $i % 2 == 1 ? '17:00:00' : null,
                    'date' => now()->subDays(6 - $i)->toDateString(),
                    'is_deleted' => false,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
