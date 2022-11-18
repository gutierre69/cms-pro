<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

use FakerData\Generate;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    public function definition()
    {
        $fakerData      = new Generate();

        $title = $fakerData->category->title_blah;
        return [
            'title'     => $title,
            'slug'      => Str::slug($title)
        ];
    }
}
