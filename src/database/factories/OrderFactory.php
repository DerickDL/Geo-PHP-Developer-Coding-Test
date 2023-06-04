<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'total_value' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}



