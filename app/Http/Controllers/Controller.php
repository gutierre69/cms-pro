<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Support\Facades\URL;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

        $cfgs = array();

        $configs = Config::all();
        foreach($configs AS $config){
            $cfgs[ $config->slug ] = $config->value;
        }

        $menus = json_decode($cfgs['website-menu']);
        foreach($menus AS $k => $menu){
            $menus[$k]->url = str_replace("[base_url]", URL::to('/'), $menus[$k]->url);
        }

        View::share("config", $cfgs);
        View::share("menus", $menus);
    }
}
