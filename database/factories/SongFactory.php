<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{   
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->sentence(),
            'artist' =>$this->faker->numberBetween(1,10),
            'collaboratorArtist' =>$this->faker->numberBetween(1,10),
            'album' =>$this->faker->numberBetween(1,10),
            'genre' =>$this->faker->numberBetween(1,10),
            'year' =>$this->faker->numberBetween(1900,2020),
            'track' =>$this->faker->url(),
            'file' =>$this->faker->url(),
            'views' =>$this->faker->numberBetween(1,100),

        ];
    }
}
