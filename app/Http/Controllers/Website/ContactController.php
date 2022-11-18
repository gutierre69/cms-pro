<?php

namespace App\Http\Controllers\Website;

use Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PostService;
use App\Services\ConfigService;

class ContactController extends Controller
{

    public function __construct(){
        parent::__construct();
        PostService::featuredPosts();
    }

    public function index(){
        $data = array();
 
        return view('templates.'.env('TEMPLATE').'.contact', $data);
        
    }

    public function send(Request $request){
        $form = $request->all();
        if(
            isset($form['name']) && isset($form['email']) && isset($form['message'])
            && $form['name']!="" && $form['email']!="" && $form['message']!=""
        ){
            $data = array(
                'name'      => $form['name'],
                'email'     => $form['email'],
                "content"   => $form['message']
            );

            Mail::send('email.contact', $data, function($message) use ($data) {
                $message->to(ConfigService::bySlug('contact-email'), ConfigService::bySlug('site-name'))->subject("Contact from your website");
                $message->from(trim($data['email']), trim($data['name']));
            }); 

            return redirect('/contact')->with("success", "Your message are sended.");
        } else {
            return redirect()->route('contact', ["form"=>$form, "error"=>"All fields are required!"]);
        }
        

    }
}
