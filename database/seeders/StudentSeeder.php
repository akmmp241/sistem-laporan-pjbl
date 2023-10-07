<?php

namespace Database\Seeders;

use App\Models\Dudi;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::query()->where('role_id', User::$STUDENT)->get();
        $dudi = Dudi::query()->first();
        $supervisor = Supervisor::query()->first();

        $users->map(function ($user) use ($dudi, $supervisor) {
            Student::query()->create([
                'user_id' => $user->id,
                'supervisor_id' => $supervisor->id,
                'dudi_id' => $dudi->id,
                'nis' => fake()->randomNumber(5),
                'name' => $user->name,
                'class' => 'XI PPLG 2'
            ]);
        });
    }
}
