<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'slug'=>$this->faker->unique()->slug,
            'summary'=>$this->faker->text,
            'description'=>$this->faker->text,
            'stock'=>$this->faker->numberBetween(2,10),

            'brand_id'=>$this->faker->randomElement(Brand::pluck('id')->toArray()),
            'vendor_id'=>$this->faker->randomElement(User::pluck('id')->toArray()),
            'cat_id'=>$this->faker->randomElement(Category::where('is_parent',1)->pluck('id')->toArray()),
            'child_cat_id'=>$this->faker->randomElement(Category::where('is_parent',0)->pluck('id')->toArray()),

            'photo'=>$this->faker->imageUrl('400','400'),
            'price'=>$this->faker->numberBetween(1000,5000),
            'offer_price'=>$this->faker->numberBetween(1500,4500),
            'discount'=>$this->faker->randomElement(Category::pluck('id')->toArray()),
            'size'=>$this->faker->randomElement(['S','M','L']),

            'condition'=>$this->faker->randomElement(['new','popular','winter']),

            'status'=>$this->faker->randomElement(['active','inactive']),

        ];
    }
}
