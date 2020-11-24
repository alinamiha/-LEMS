<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobVacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobVacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'type_of_working' => $this->faker->randomElement($array = array ('It-сфера','Кур\'єр', 'Такси', 'Мореплавець')),
            'post' => $this->faker->randomElement($array = array ('Директор','Виконавець', "Молодший специалист")),
            'form_of_work' => $this->faker->randomElement($array = array ('Дистанційно','В офісі')),
            'company_name' => $this->faker->company,
            'address' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'sales' => $this->faker->numberBetween($min = 1000, $max = 20000),
            'emloyee_id' => function(){
                return Employee::factory()->create()->id;
            }
        ];
    }
}
