<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $gender = ['male', 'female'];
        return [
            'name' => $this->faker->name(),
            'gender' => $gender[rand(0,1)],
            'nip' => $this->faker->randomNumber(8, true),
            'password' => bcrypt('12345')
        ];
    }
}
