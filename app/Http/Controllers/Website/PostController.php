<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Events\PostRead;
use App\Services\PostService;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct(){
        parent::__construct();
        PostService::featuredPosts();
    }

    public function single($slug){
        $data = array();
        $data['post'] = Post::where("slug", $slug)->first();
        
        event(new PostRead($data['post']));
        
        if($data['post']->type=="article")  return view('templates.'.env('TEMPLATE').'.single', $data);
        if($data['post']->type=="news")     return view('templates.'.env('TEMPLATE').'.single', $data);
        if($data['post']->type=="page")     return view('templates.'.env('TEMPLATE').'.single_page', $data);
    }
}
