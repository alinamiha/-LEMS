<?php

namespace Database\Factories;

use App\Models\Allowance;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sum' => $this->faker->randomDigit,
            'invoice_id' => function (){
                return Invoice::factory()->create()->id;
            },
            'allowance_id' => function (){
                return Allowance::factory()->create()->id;
            }
        ];
    }
}
