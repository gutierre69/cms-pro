<?Php

namespace App\Services;

use View;

use App\Models\Category;
use App\Models\Post;

class PostService {

    public function __construct(AppHelper $helper){ 

    }

    public static function featuredPosts($category = 0){

        $data                               = array();
        $data['website_categories']         = array();
        $data['website_posts_featured']     = array();
        $data['website_posts_more_views']   = array();

        $posts = Post::where("is_featured",1)->with(['category','author'])->limit(3)->get();
        if($posts){
            $data['website_posts_featured'] = $posts;
        }

        $posts = Post::with(['category','author'])->orderBy("hits","desc")->limit(3)->get();
        if($posts){
            $data['website_posts_more_views'] = $posts;
        }

        foreach($data AS $key => $value){
            View::share($key, $value);
        }
    }

}