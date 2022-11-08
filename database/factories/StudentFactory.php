<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['male','female'];
        $religions = ['islam', 'christian', 'hindu', 'buddha'];

        return [
            'name' => $this->faker->name(),
            'nisn' => $this->faker->randomNumber(8, true),
            'password' => bcrypt('12345'),
            'gender' => $gender[rand(0,1)],
            'birth_place_and_date' => $this->faker->word() . ', ' . $this->faker->date(),
            'religion' => $religions[rand(0,3)],
            'address' => $this->faker->sentence(3),
            'parent_name' => $this->faker->name(),
            'parent_mobile' => $this->faker->phoneNumber(),
            'status' => 'active'
        ];
    }
}
