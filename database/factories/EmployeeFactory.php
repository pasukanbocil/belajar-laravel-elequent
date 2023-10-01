<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => '',
            'name' => '',
            'title' => '',
            'salary' => 0
        ];
    }

    public function programer(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'title' => 'Programer',
                'salary' => 5000000
            ];
        });
    }

    public function seniorProgramer(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'title' => 'Senior Programer',
                'salary' => 10000000
            ];
        });
    }
}
