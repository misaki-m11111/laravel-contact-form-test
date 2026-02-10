<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
protected $model = Contact::class;

public function definition()
{
    return [
        'last_name'   => $this->faker->lastName(),
        'first_name'  => $this->faker->firstName(),
        'gender'      => $this->faker->numberBetween(1, 3),
        'email'       => $this->faker->unique()->safeEmail(),
        'tel'         => $this->faker->numerify('090-####-####'),

        'address'     => $this->faker->prefecture()
            . $this->faker->city()
            . $this->faker->streetName()
            . $this->faker->buildingNumber(),

        'building'    => $this->faker->boolean()
            ? $this->faker->secondaryAddress()
            : null,

        'detail'      => $this->faker->realText(120),

        'category_id' => Category::inRandomOrder()->first()->id,
    ];
}

}
