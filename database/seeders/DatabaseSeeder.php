<?php

namespace Database\Seeders;

use FakerData\Generate;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $fakerData  = new Generate();
        
        \App\Models\User::truncate();
        \App\Models\User::factory(1)->create();

        \App\Models\Category::truncate();
        \App\Models\Category::factory(10)->create();

        // create a website category pages
        $website_category = \App\Models\Category::create([
            "title"     => "Website Page",
            "slug"      => "website-page"
        ]);

        \App\Models\Post::truncate();
        \App\Models\Post::factory(10)->create();

        // create static pages
        \App\Models\Post::create([
            "title"         => "Privacy",
            "slug"          => "privacy",
            "type"          => "page",
            "content"       => $fakerData->content->text,
            "category_id"   => $website_category->id
        ]);

        
        $settings   = array(
            array(
                "name"  => "Site Name",
                "slug"  => "site-name",
                "value" => "My Website"
            ),
            array(
                "name"  => "Site Slogan",
                "slug"  => "site-slogan",
                "value" => "A Laravel CMS website"
            ),
            array(
                "name"  => "Site Description",
                "slug"  => "site-description",
                "value" => "This website was developed using cmspro.io"
            ),
            array(
                "name"  => "Meta Description",
                "slug"  => "meta-description",
                "value" => "This website was developed using cmspro.io"
            ),
            array(
                "name"  => "Meta Keywords",
                "slug"  => "meta-keywords",
                "value" => "cms, website, laravel"
            ),
            array(
                "name"  => "Site Logo SVG",
                "slug"  => "site-logo-svg",
                "value" => '<svg viewBox="0 0 265 199" height="46"><g featurekey="rootContainer" transform="matrix(1.1,0,0,1.1,0,0)" fill="#111"><rect width="265" height="199"></rect></g><g featurekey="cmx" transform="matrix(2.095820734669338,0,0,2.095820734669338,28.646688023767304,6.8142923614919795)" fill="#fff"><path d="M18.16 40.6 c-4.52 0 -8.4 -1.6 -11.64 -4.76 c-3.28 -3.16 -4.92 -7 -4.92 -11.44 s1.64 -8.28 4.92 -11.44 c3.24 -3.16 7.12 -4.76 11.64 -4.76 c4.56 0 8.48 1.6 11.72 4.76 c2.44 2.36 3.96 5.12 4.52 8.2 l-8.36 0 c-0.4 -1.04 -1.04 -2 -1.84 -2.8 c-1.64 -1.64 -3.64 -2.44 -6.04 -2.44 c-2.36 0 -4.36 0.84 -6 2.48 s-2.48 3.64 -2.48 6 s0.84 4.36 2.48 6 s3.64 2.48 6 2.48 c2.4 0 4.4 -0.84 6.04 -2.48 c1.12 -1.12 1.84 -2.36 2.2 -3.84 l8.16 0 c-0.44 3.56 -1.96 6.64 -4.68 9.28 c-3.24 3.16 -7.16 4.76 -11.72 4.76 z M35.894000000000005 40 l0 -31.2 l8.04 0 l9 21.36 l9.04 -21.36 l8.04 0 l0 31.2 l-7.96 0 l0 -14.68 l-6.48 14.68 l-5.24 0 l-6.48 -14.68 l0 14.68 l-7.96 0 z M84.628 40.6 c-3.88 0 -7.04 -0.84 -9.52 -2.56 s-3.72 -4.04 -3.72 -7.04 l0 -0.36 l-0.04 -1.6 l7.84 0 l0 1.8 c0 0.68 0.48 1.32 1.4 1.92 s2.2 0.92 3.88 0.92 c1.4 0 2.4 -0.2 3.04 -0.56 c0.6 -0.36 0.92 -0.84 0.92 -1.36 c0 -0.64 -0.4 -1.2 -1.16 -1.68 c-0.8 -0.48 -2.2 -1.04 -4.16 -1.72 c-1.24 -0.44 -2.28 -0.8 -3.12 -1.12 s-1.84 -0.8 -3 -1.44 c-1.16 -0.6 -2.12 -1.28 -2.8 -1.96 s-1.28 -1.52 -1.8 -2.56 s-0.76 -2.16 -0.76 -3.4 c0 -2.92 1.12 -5.28 3.4 -7.04 s5.2 -2.64 8.8 -2.64 c3.72 0 6.76 0.92 9.16 2.76 s3.6 4.28 3.6 7.32 l0 1.96 l-7.8 0 l0 -1.8 c0 -0.84 -0.4 -1.64 -1.24 -2.32 s-2.04 -1 -3.56 -1 c-1.24 0 -2.2 0.2 -2.84 0.6 c-0.64 0.44 -0.96 0.92 -0.96 1.52 s0.36 1.08 1.08 1.48 c0.72 0.44 2.08 1 4.08 1.68 l2.04 0.72 l2.16 0.88 c0.92 0.44 1.68 0.8 2.24 1.16 s1.2 0.84 1.96 1.44 s1.32 1.24 1.76 1.84 c0.4 0.6 0.76 1.36 1.08 2.2 c0.28 0.84 0.44 1.76 0.44 2.68 c0 2.96 -1.16 5.24 -3.44 6.84 c-2.28 1.64 -5.28 2.44 -8.96 2.44 z"></path></g><g featurekey="pro" transform="matrix(2.257641989467771,0,0,2.257641989467771,28.387772763025186,83.48734042308567)" fill="#fff"><path d="M1.6 40 l0 -31.2 l13.76 0 c3.92 0 6.96 1 9.08 3 c2.12 2.04 3.16 4.56 3.16 7.48 c0 3.08 -1.04 5.64 -3.16 7.64 s-5.12 3.04 -9.08 3.04 l-5.76 0 l0 10.04 l-8 0 z M9.6 23.56 l5.32 0 c3.08 0 4.6 -1.4 4.6 -4.24 c0 -1.2 -0.36 -2.16 -1.12 -2.96 s-1.92 -1.16 -3.48 -1.16 l-5.32 0 l0 8.36 z M28.934 40 l0 -31.2 l13.76 0 c3.92 0 6.96 1 9.08 3 c2.12 2.04 3.16 4.56 3.16 7.48 c0 3.08 -1.04 5.64 -3.16 7.64 c-0.68 0.64 -1.44 1.16 -2.28 1.6 l6.24 11.48 l-7.56 0 l-5.48 -10.04 l-5.76 0 l0 10.04 l-8 0 z M36.934 23.56 l5.32 0 c3.08 0 4.6 -1.4 4.6 -4.24 c0 -1.2 -0.36 -2.16 -1.12 -2.96 s-1.92 -1.16 -3.48 -1.16 l-5.32 0 l0 8.36 z M73.628 40.6 c-4.52 0 -8.4 -1.6 -11.64 -4.76 c-3.28 -3.16 -4.92 -7 -4.92 -11.44 s1.64 -8.28 4.92 -11.44 c3.24 -3.16 7.12 -4.76 11.64 -4.76 c4.56 0 8.48 1.6 11.72 4.76 s4.84 7 4.84 11.44 s-1.6 8.28 -4.84 11.44 s-7.16 4.76 -11.72 4.76 z M73.628 32.88 c2.4 0 4.4 -0.84 6.04 -2.48 s2.44 -3.64 2.44 -6 s-0.8 -4.4 -2.44 -6.04 s-3.64 -2.44 -6.04 -2.44 c-2.36 0 -4.36 0.84 -6 2.48 s-2.48 3.64 -2.48 6 s0.84 4.36 2.48 6 s3.64 2.48 6 2.48 z"></path></g></svg>'
            ),
            array(
                "name"  => "Website MENU",
                "slug"  => "website-menu",
                "value" => json_encode(
                    array(
                        array(
                            "label"     => "Home",
                            "url"       => "[base_url]",
                            "target"    => ""
                        ),
                        array(
                            "label"     => "About CMS PRO",
                            "url"       => "https://cmspro.io/",
                            "target"    => "_blank"
                        ),
                        array(
                            "label"     => "Privacy",
                            "url"       => "[base_url]/privacy",
                            "target"    => ""
                        ),
                        array(
                            "label"     => "Contact Us",
                            "url"       => "[base_url]/contact",
                            "target"    => ""
                        )
                    )
                )
            ),
            array(
                "name"  => "Site About",
                "slug"  => "site-about",
                "value" => $fakerData->content->paragraph,
            ),
            array(
                "name"  => "Contact Email",
                "slug"  => "contact-email",
                "value" => "contact@cmspro.io",
            )
        );

        \App\Models\Config::truncate();
        foreach($settings AS $data){
            \App\Models\Config::create([
                "name"      => $data['name'],
                "slug"      => $data['slug'],
                "value"     => $data['value']
            ]);
        }
    }
}
