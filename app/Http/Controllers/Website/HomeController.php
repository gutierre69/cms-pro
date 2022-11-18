<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PostService;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{

    public function __construct(){
        parent::__construct();
        PostService::featuredPosts();
    }

    public function index(){
        $data = array();
        $data['posts'] = Post::where("is_featured", 0)->with(['category','author'])->paginate(5);
        
        return view('templates.'.env('TEMPLATE').'.index', $data);
        
    }
}
