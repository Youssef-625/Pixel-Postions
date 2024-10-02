<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->jobTitle,
            'employer_id'=> Employer::factory(),
            'salary'=>fake()->randomElement(['$50,000','$60,000','$70,000','$80,000','$90,000','$100,000','$120,000','$150,000']),
            'location'=>fake()->randomElement(['Office','Hybrid','Remotely']),
            'schedule'=>fake()->randomElement(['Full Time','Part time']),
            'url'=>fake()->url,
            'featured'=>fake()->randomElement([true,false]),
            'aboutUs'=>fake()->paragraph,
            'responsibilities'=>fake()->paragraph,
            'requirements'=>fake()->paragraph,
        ];
    }
}
