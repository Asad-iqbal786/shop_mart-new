<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'title'=>$this->faker->title,
            'slug'=>$this->faker->unique()->slug,
            'description'=> $this->faker->text(100),
            'photo'=>$this->faker->imageUrl('100','100'),
            'status'=>$this->faker->randomElement(['active','inactive']),

        ];
    }
}
