<?php

namespace Database\Factories;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return[
            'description'=>$this->faker->words(2,true),
            'amount'=>$this->faker->randomFloat(2,-10000,10000),
            'date' => Carbon::create($this->faker->dateTimeBetween('-3 years', 'now')),
            'identity'=>$this->faker->name(),
            'account'=>$this->faker->iban('be'),
            'fund_id' => 1,
        ];
    }
}
