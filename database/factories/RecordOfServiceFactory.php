<?php

namespace Database\Factories;

use App\Models\RecordOfService;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordOfServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecordOfService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->sentence,
            'started_date' => $this->faker->date(),
            'expiration_date' => $this->faker->date(),
            'post' => $this->faker->sentence,
            'user_id' => function (){
                return User::factory()->create()->id;
            }
        ];
    }
}
