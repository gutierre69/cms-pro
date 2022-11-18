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

class ConfigController extends Controller
{
    public $user;

    public $singular_name       = "Setting";
    public $plural_name         = "Settings";
    public $slug                = "config";
    public $description_page    = "";
    public $fa_icon             = "fa fa-cog";

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
        $data               = array();
        $data['rows']       = Config::orderBy("name","asc")->paginate(10);

        return view('admin.config.index', $data);
    }

    public function new()
    {
        $data = array();


        return view('admin.config.new', $data);
    }

    public function edit($id)
    {
        $data                   = array();
        $data['row']            = Config::where("id",$id)->first();

        return view('admin.config.new', $data);
    }

    public function store(Request $request)
    {
        $form           = $request->all();
        $form['slug']   = Str::slug($form['name']);
 
        Config::create($form);

        return redirect('/admin/config');
    }

    public function update(Request $request, $id)
    {
        $form           = $request->all();
        $form['slug']   = Str::slug($form['name']);

        Config::find($id)->update($form);

        return redirect('/admin/config');
    }

    public function delete($id)
    {
        Config::where('id', $id)->delete();
    	return redirect('/admin/config');
    }

}