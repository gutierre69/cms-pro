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

    public static function postModifier(Post $post){

        $pattern = "/\[youtube=(.*?)\]/";
        $post->content = preg_replace_callback($pattern, function($matches){
            $res = strip_tags($matches[1]);
            $p = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $res, $m);
            if(isset($m[0])) {
                return '<div class="video-responsive"><iframe width="420" height="315" src="https://www.youtube.com/embed/'.$m[0].'" frameborder="0" allowfullscreen></iframe></div>';
            } else {
                $idyoutube = $res;
                $idyoutube = str_replace("https://www.youtube.com/shorts/","",$idyoutube);
                $idyoutube = str_replace("https://youtube.com/shorts/","",$idyoutube);
                $idyoutube = str_replace("https://www.youtu.be/shorts/","",$idyoutube);
                if($idyoutube){
                    $ped = explode("?", $idyoutube);
                    $idyou = $ped[0];
                    if($idyou){
                        return '<div class="video-responsive"><iframe width="420" height="315" src="https://www.youtube.com/embed/'.$idyou.'" frameborder="0" allowfullscreen></iframe></div>';
                    }
                }
            }
        }, $post->content);

        return $post;
    }

}