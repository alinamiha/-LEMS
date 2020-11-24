<?php

namespace Database\Factories;

use App\Models\Passport;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class PassportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'document_name' => $this->faker->randomElement($array = array ('Паспорт','Посвідчення водія', 'Посвідчення безробітнього')),
            'number' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'date_of_issue' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'issued_by' => $this->faker->name,
            'TIN_number' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ];
    }
}
