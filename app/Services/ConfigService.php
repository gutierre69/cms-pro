<?Php

namespace App\Services;

use App\Models\Config;

class ConfigService {

    public function __construct(AppHelper $helper){ 

    }

    public static function bySlug($slug){
        $conf = [];
        $configs = Config::all();
        foreach($configs AS $config){
            $conf[ $config->slug ] = $config->value;
        }
        return $conf[$slug];
    }

}