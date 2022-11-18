<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

use App\Models\User;

class UserController extends Controller
{
    public $user;

    public $singular_name       = "User";
    public $plural_name         = "Users";
    public $slug                = "user";
    public $description_page    = "";
    public $fa_icon             = "fa fa-user";

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

        return view('admin.user.change_password', $data);
    }

    public function save(Request $request)
    {
        $form = $request->all();
        if($form['new_password']==$form['re_new_password']){
            $user_id    = Auth::user()->id;
            $password   = Hash::make($form['new_password']);

            User::where("id", $user_id)->update(["password" => $password]);

            return redirect('/admin/user/change-password')->with("success", "Your password has changed.");
        } else {
            return redirect('/admin/user/change-password')->with("error", "The new password have an error.");
        }

        
    }



}