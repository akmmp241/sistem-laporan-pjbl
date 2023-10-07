<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::query()->where('role_id', User::$SUPERVISOR)->get();

        $users->map(function ($user) {
            Supervisor::query()->create([
                'user_id' => $user->id,
                'name' => $user->name,
                'NIP' => fake()->randomNumber(9),
            ]);
        });
    }
}
