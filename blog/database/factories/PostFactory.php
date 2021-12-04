<?php

namespace Database\Factories;

use App\Models\POST;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
     

          //  'name' => $this->faker->name(),
            'username' => $this->faker->name(),
           // 'email_verified_at' => now(),
            'password' => $this->faker->name(),
            'remember_token' =>  $this->faker->name(),
        ];
    }
}
