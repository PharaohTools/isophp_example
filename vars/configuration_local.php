<?php

namespace Model ;

class Configuration {

    public static $config ;

    public static function variable($var) {
        $file_ext = 'php' ;
        if (ISOPHP_EXECUTION_ENVIRONMENT === 'ZEND') {
            $file_ext = 'php' ;
        }
        if (ISOPHP_EXECUTION_ENVIRONMENT === 'UNITER') {
            if (UNITER_BUILD_LEVEL == 'production') {
                $file_ext = 'php' ;
            }
            if (UNITER_BUILD_LEVEL !== 'production') {
                $file_ext = 'fephp' ;
            }
        }
        require (REQUIRE_PREFIX.'/core/default.'.$file_ext) ;
        $config = \Model\Configuration::$config ;
        $config['ISOPHP_API_SERVER_URL'] = 'http://server.'.$config['application_slug'].'.vm:80'.$config['random_port_suffix'] ;
        $config['env_level'] = 'dev' ;
        if (isset($config[$var])) {
            return $config[$var];
        }
        return null ;
    }

}