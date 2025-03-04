<?php

namespace Database\Factories;

use App\Enum\Students\StudentStatus;
use App\Models\Course;
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
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'status' => $this->faker->randomElement(StudentStatus::asArray()),
            'gender' => $this->faker->boolean()
        ];
    }
}
