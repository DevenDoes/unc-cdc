<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'about' => $this->faker->paragraph($nbSentences = 4, $variableNbSentences = true),
            'linkedin' => $this->faker->userName,
            'github' => $this->faker->userName,
            'discord' => $this->faker->userName,
            'twitter' => $this->faker->userName,
            'share_academics' => $this->faker->randomElement($array = array (
                true,
                false,
            )),
        ];
    }
}
