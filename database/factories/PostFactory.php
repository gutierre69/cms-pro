<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

use FakerData\Generate;

class PostFactory extends Factory
{

    protected $model = Post::class;


    public function definition()
    {
        $fakerData      = new Generate();

        $title = $fakerData->content->title_blah;
        return [
            'title'             => $title,
            'slug'              => Str::slug($title),
            'intro'             => $fakerData->content->paragraph_blah,
            'content'           => $fakerData->content->text_blah,
            'type'              => $fakerData->randomElement(['article', 'news']),
            'category_id'       => rand(1, 10),
            'is_featured'       => $fakerData->randomElement([1, 0]),
            'featured_image'    => 'https://picsum.photos/1200/630',
            'status'            => 1,
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'meta_og_image'     => '',
            'meta_og_url'       => '',
            'author_id'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),
            'published_at'      => date("Y-m-d H:i:s"),
        ];
    }
}
