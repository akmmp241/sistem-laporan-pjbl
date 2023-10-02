<?php

namespace Database\Factories;

use App\Models\Dudi;
use Illuminate\Database\Eloquent\Factories\Factory;
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
            'name' => 'Test User',
            'role_id' => '1',
            'dudi_id' => $dudi->id,
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
