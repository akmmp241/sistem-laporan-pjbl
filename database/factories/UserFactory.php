<?php

namespace Database\Factories;

use App\Models\Dudi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dudi = Dudi::query()->first();

        return [
            'name' => fake()->name(),
            'dudi_id' => $dudi->id,
            'supervisor_id' => 1,
            'username' => '10001',
            'password' => Hash::make('10001'),
            'class' => 'XI PPLG 2',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
