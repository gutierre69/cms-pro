<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Image;
use View;

use App\Services\SlugService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{
    public $user;

    public $singular_name       = "Category";
    public $plural_name         = "Categories";
    public $slug                = "category";
    public $description_page    = "";
    public $fa_icon             = "fa fa-list";

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
        $data['rows']       = Category::orderBy("title","asc")->paginate(20);

        return view('admin.category.index', $data);
    }

    public function new()
    {
        $data = array();


        return view('admin.category.new', $data);
    }

    public function edit($id)
    {
        $data                   = array();
        $data['row']            = Category::where("id",$id)->first();

        return view('admin.category.new', $data);
    }

    public function store(Request $request)
    {
        $form           = $request->all();
        $form['slug']   = Str::slug($form['title']);
 
        Category::create($form);

        return redirect('/admin/category');
    }

    public function update(Request $request, $id)
    {
        $form           = $request->all();
        $form['slug']   = Str::slug($form['title']);

        Category::find($id)->update($form);

        return redirect('/admin/category');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
    	return redirect('/admin/category');
    }

}