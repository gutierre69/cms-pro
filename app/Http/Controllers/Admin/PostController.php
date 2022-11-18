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

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public $user;

    public $singular_name       = "Post";
    public $plural_name         = "Posts";
    public $slug                = "post";
    public $description_page    = "";
    public $fa_icon             = "fa fa-edit";

    public function __construct(Request $request)
    {
        $this->middleware('auth');

        View::share("singular_name", $this->singular_name);
        View::share("plural_name", $this->plural_name);
        View::share("slug", $this->slug);
        View::share("description_page", $this->description_page);
        View::share("fa_icon", $this->fa_icon);

        View::share("post_types", Post::TYPES);
        View::share("featured", Post::FEATURED);
    }
    
    public function index(Request $request)
    {
        $data               = array();
        $data['categories'] = Category::where("slug","!=","website-page")->orderBy("title", "asc")->get();
        $data['rows']       = Post::where("type", $request->type)->orderBy("id","desc")->paginate(10);

        return view('admin.post.index', $data);
    }

    public function new()
    {
        $data = array();
        $data['categories'] = Category::orderBy("title", "asc")->get();

        return view('admin.post.new', $data);
    }

    public function edit($id)
    {
        $data                   = array();
        $data['categories']     = Category::where("slug","!=","website-page")->orderBy("title", "asc")->get();
        $data['row']            = Post::where("id",$id)->first();

        return view('admin.post.new', $data);
    }

    public function store(Request $request)
    {
        $form           = $request->all();
        $form['slug']   = Str::slug($form['title']);
        if(isset($form['is_featured']) && $form['is_featured']==true) $form['is_featured'] = 1; else $form['is_featured'] = 0;

        if($request->hasFile('featured_image')){
            
            $image      = $request->file('featured_image');
            $ext        = $image->extension();
            $filename   = uniqid(date('HisYmd')).".".$ext;

            Image::make($image)->crop(1200,630)->save( storage_path('app/public/post/' . $filename ) );
            $form['featured_image'] = URL::to('/storage/post')."/".$filename;
        }
        
        Post::create($form);

        return redirect('/admin/post?type='.$form['type']);
    }

    public function update(Request $request, $id)
    {
        $form           = $request->all();
        $form['slug']   = Str::slug($form['title']);
        if(isset($form['is_featured']) && $form['is_featured']==true) $form['is_featured'] = 1; else $form['is_featured'] = 0;

        if($request->hasFile('featured_image')){
            
            $image      = $request->file('featured_image');
            $ext        = $image->extension();
            $filename   = uniqid(date('HisYmd')).".".$ext;

            Image::make($image)->crop(1200,630)->save( storage_path('app/public/post/' . $filename ) );
            $form['featured_image'] = URL::to('/storage/post')."/".$filename;
        }

        Post::find($id)->update($form);

        return redirect('/admin/post?type='.$form['type']);
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->first();
        
        Post::where('id', $id)->delete();
    	return redirect('/admin/post?type='.$post->type);
    }

}