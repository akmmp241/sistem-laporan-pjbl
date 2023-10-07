<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dudi;
use App\Models\Report;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Dudi::factory(5)->create();
        $this->call(DudiSeeder::class);

//        User::factory(10)->create();
        User::query()->insert($this->dumpSiswa());

//        Supervisor::factory(3)->create();
        $this->call(SupervisorSeeder::class);

//        Student::factory(6)->create();
        $this->call(StudentSeeder::class);
    }

    public function dumpSiswa(): array
    {
        return [
            [
                'role_id' => User::$ADMIN,
                'username' => 'akmmp',
                'password' => bcrypt('password'),
                'name' => 'Akmal Muhammad Pridianto',
            ],
            [
                'role_id' => User::$SUPERVISOR,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$SUPERVISOR,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$SUPERVISOR,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$STUDENT,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$STUDENT,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$STUDENT,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$STUDENT,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$STUDENT,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ],
            [
                'role_id' => User::$STUDENT,
                'username' => fake()->userName(),
                'password' => bcrypt('password'),
                'name' => fake()->name(),
            ]
        ];
    }
}
