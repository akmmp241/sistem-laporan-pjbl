<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Test User Admin',
            'role_id' => User::$ADMIN,
            'username' => 'akmmp',
            'password' => Hash::make('password'),
        ]);
    }
}
