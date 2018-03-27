<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR) ;
}
$bd = dirname(dirname(dirname(dirname(__FILE__)))).DS ;

try {

    $app_path = $bd.'app' ;
    $mods = scandir ($app_path) ;
    foreach ($mods as $mod) {
        if (!in_array($mod, array('.', '..', '.git', '.gitkeep'))) {
            $context_path = $app_path.DS.$mod.DS.'Tests'.DS.'behat'.DS.'bootstrap' ;
            if (is_dir($context_path)) {
                $context_path_files = scandir($context_path) ;
                foreach ($context_path_files as $context_path_file) {
                    if (!in_array($mod, array('.', '..'))) {
                        if (substr($context_path_file, strlen($context_path_file)-4) === '.php') {
                            require_once ($context_path.DS.$context_path_file) ;
                        }
                    }
                }
            }
        }
    } }
catch (\Exception $e) {
    echo "Setup cant load auto load Contexts from Modules\n" ;
    echo 'Message: ' .$e->getMessage() ;
}
