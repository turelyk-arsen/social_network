<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // create our own factory fake Listings for db
        return [
            //here we can put whatever we want
            //in our case it needs to match our table in db
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
