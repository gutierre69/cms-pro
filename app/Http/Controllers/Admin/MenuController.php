<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Image;
use View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

use App\Models\Config;

class MenuController extends Controller
{
    public $user;

    public $singular_name       = "Menu";
    public $plural_name         = "Menus";
    public $slug                = "menu";
    public $description_page    = "";
    public $fa_icon             = "fa fa-bars";

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
        $menu_site = Config::where("slug","website-menu")->first();
        $data['menus'] = json_decode($menu_site->value);

        return view('admin.menu.index', $data);
    }

    public function save(Request $request)
    {
        $config_menu = Config::where("slug","website-menu")->first();
        Config::where("id", $config_menu->id)->update(["value" => $request->json]);

        return true;
    }


}