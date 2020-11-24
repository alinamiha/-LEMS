<?php

namespace Database\Factories;

use App\Models\CurriculumVitae;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurriculumVitaeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurriculumVitae::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                return User::factory()->create()->id;
            },
            'cv_name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type_of_working' => $this->faker->randomElement($array = array ('It-сфера','Кур\'єр', 'Такси', 'Мореплавець')),
            'post' => $this->faker->randomElement($array = array ('Офіс менеджер','Продавець', 'Покоївка')),
        ];
    }
}
