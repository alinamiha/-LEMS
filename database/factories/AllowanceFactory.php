<?php

namespace Database\Factories;

use App\Models\Allowance;
use App\Models\Passport;
use App\Models\Unemployed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class AllowanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Allowance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unemployed_id' => 1,
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'citizenship' => $this->faker->randomElement($array = array ('Українець', 'Українка')),
            'passport_id' => function(){
                return Passport::factory()->create()->id;
            },
            'registration_address' => $this->faker->address,
            'factual_address' => $this->faker->address,
            'education_degree' => $this->faker->randomElement($array = array ('Середнє', 'Вище','Незакінчене вище', 'Без освіти')),
            'name_education' => $this->faker->randomElement($array = array ('ОНПУ', 'ОНМУ','МГУ', 'ОГРПУ')),
            'last_work_place' => $this->faker->company,
            'status' => $this->faker->numberBetween(0,2)
        ];

    }
}
