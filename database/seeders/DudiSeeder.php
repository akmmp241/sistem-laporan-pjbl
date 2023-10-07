<?php

namespace Database\Seeders;

use App\Models\Dudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dudi::factory()->count(5)->create();
    }
}
