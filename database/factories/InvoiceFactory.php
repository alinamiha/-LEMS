<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Unemployed;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_number' => $this->faker->randomDigit,
            'name' => $this->faker->name,
            'appointmen_id' => 'Пособие',
            'unemployed' => function (){
                return Unemployed::factory()->create()->id;
            }
        ];
    }
}
