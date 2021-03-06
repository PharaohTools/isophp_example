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
        $config['ISOPHP_API_SERVER_URL'] = 'http://server.devcloud.'.$config['domain'] ;
        $config['env_level'] = 'dev' ;
        if (isset($config[$var])) {
            return $config[$var];
        }
        return null ;
    }

}

