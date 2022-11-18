<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PostService;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{

    public function __construct(){
        parent::__construct();
        PostService::featuredPosts();
    }

    public function single($slug){
        $data = array();

        $category = Category::where("slug", $slug)->first();

        $data['posts'] = Post::where("category_id", $category->id)->with(['category','author'])->paginate(5);
        
        return view('templates.'.env('TEMPLATE').'.category', $data);
    }
}
