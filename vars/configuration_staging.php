<?php

namespace Model ;

class Configuration {

    public static $config ;

    public static function variable($var) {
        if (UNITER_BUILD_LEVEL == 'production') {
            $file_ext = 'php' ;
        } else {
            $file_ext = 'fephp' ;
        }
        require (REQUIRE_PREFIX.'/core/default.'.$file_ext) ;
        $config = \Model\Configuration::$config ;
        $config['env_level'] = 'staging' ;
        $config['ISOPHP_API_SERVER_URL'] = 'http://server.'.$config['env_level'].$config['domain'] ;
        if (isset($config[$var])) {
            return $config[$var];
        }
        return null ;
    }

}

