<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Config;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public $singular_name       = "Dashboard";
    public $plural_name         = "Dashboard";
    public $slug                = "home";
    public $description_page    = "Here your website resume";
    public $fa_icon             = "fa fa-home";

    public function __construct()
    {
        $this->middleware('auth');

        View::share("singular_name", $this->singular_name);
        View::share("plural_name", $this->plural_name);
        View::share("slug", $this->slug);
        View::share("description_page", $this->description_page);
        View::share("fa_icon", $this->fa_icon);
    }
    
    public function index()
    {
        $data = array();

        $data['categories']             = Category::count();
        $data['articles']               = Post::where("type", "article")->count();
        $data['news']                   = Post::where("type", "news")->count();
        $data['pages']                  = Post::where("type", "page")->count();
        $data['settings']               = Config::count();
        $data['users']                  = User::count();

        $data['password_alert']         = false;
        $user                           = User::where("id",1)->first();
        if($user->created_at == $user->updated_at){
            $data['password_alert'] = true;
        }

        // $data['articles_trashed']       = Post::where("type", "article")->onlyTrashed()->count();
        // $data['news_trashed']           = Post::where("type", "news")->onlyTrashed()->count();
        // $data['pages_trashed']          = Post::where("type", "page")->onlyTrashed()->count();

        return view('admin.home', $data);
    }
}
