<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserAcademics;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserAcademicsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAcademics::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'school' => $this->faker->randomElement($array = array (
                'University of North Carolina at Chapel Hill',
                'North Carolina State University',
                'Eastern Carolina University',
                'University of North Carolina at Charlotte',
            )),
            'school_level' => $this->faker->randomElement($array = array (
                'Undergraduate',
                'Master\'s',
                'PhD',
            )),
            'graduation_year' => $this->faker->numberBetween($min = 2020, $max = 2024),
            'major_primary' => $this->faker->randomElement($array = array (
                'Computer Science',
                'Statistics',
                'Political Science',
                'Environmental Science',
            )),
            'major_secondary' => $this->faker->randomElement($array = array (
                'Computer Science',
                'Statistics',
                'Political Science',
                'Environmental Science',
                null
            )),
            'minor' => $this->faker->randomElement($array = array (
                'Computer Science',
                'Statistics',
                'Political Science',
                'Environmental Science',
                null
            )),
        ];
    }
}
