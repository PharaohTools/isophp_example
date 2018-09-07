<?php

\ISOPHP\core::$registry = new \Model\RegistryStore();
\ISOPHP\core::$data_ray = array() ;
if (isset($console)) {
    \ISOPHP\js_core::$console = $console ;
}
if (isset($window)) {
    \ISOPHP\js_core::$window = $window ;
}
if (isset($jQuery)) {
    \ISOPHP\js_core::$jQuery = $jQuery ;
}

if (\ISOPHP\core::$php == NULL) {
    if (!defined('ISOPHP_EXECUTION_ENVIRONMENT')) {
        define('ISOPHP_EXECUTION_ENVIRONMENT', 'ZEND') ;
    }
    \ISOPHP\core::$php = new \ISOPHP\PHPWrapper() ;
    \ISOPHP\core::$php->error_log("This is running in Zend ") ;
} else {
    define('ISOPHP_EXECUTION_ENVIRONMENT', 'UNITER') ;
}

if (\ISOPHP\js_core::$console == NULL) {
    \ISOPHP\js_core::$console = new \ISOPHP\console() ;
}

if (\ISOPHP\core::$file_index == NULL) {
    $iso_php = new \ISOPHP\core() ;
    $iso_php->load_file_index();
    ISOPHP\js_core::$console->log(\ISOPHP\core::$file_index) ;
}

if (CURRENT_TARGET === 'desktop') {

    $console->log("desktop init") ;
    $electron_app = $window->require('electron')->remote ;
    \ISOPHP\electron::$BrowserWindow = $electron_app ;

    \ISOPHP\js_core::$window->document->onreadystatechange = function () use ($electron_app) {
        if (\ISOPHP\js_core::$window->document->readyState === "complete") {
            \ISOPHP\electron::application_controls($electron_app);
        }
    } ;

}

function __autoload($classname) {
    $target_extension = 'php' ;
//    if (ISOPHP_EXECUTION_ENVIRONMENT === 'ZEND') {
//        $target_extension = 'php' ;
//    }
//    if (ISOPHP_EXECUTION_ENVIRONMENT === 'UNITER') {
        if (UNITER_BUILD_LEVEL == 'production') {
            $target_extension = 'php' ;
        }
        if (UNITER_BUILD_LEVEL !== 'production') {
            $target_extension = 'fephp' ;
        }
//    }

    if ($classname === 'ISOPHP\core') {
        return ;
    } else if ($classname === 'ISOPHP\js_core') {
        return ;
    } else if ($classname === 'Controller\Base') {
        $path = '/core/Core/Base/Controller/Base.'.$target_extension ;
        require_once (REQUIRE_PREFIX.$path) ;
        return ;
    } else if ($classname === 'Controller\Result') {
        $path = '/core/Core/Base/Controller/Result.'.$target_extension ;
        require_once (REQUIRE_PREFIX.$path) ;
        return ;
    } else if ($classname === 'Model\Base') {
        $path = '/core/Core/Base/Model/Base.'.$target_extension ;
        require_once (REQUIRE_PREFIX.$path) ;
        return ;
    } else if ($classname === 'Model\Configuration') {
        $path = '/core/app_vars.'.$target_extension ;
        require_once (REQUIRE_PREFIX.$path) ;
        return ;
    } else if ($classname === 'Model\Navigate') {
        $path = '/core/Core/Base/Model/Navigate.'.$target_extension ;
        require_once (REQUIRE_PREFIX.$path) ;
        return ;
    } else if ($classname === 'Model\RegistryStore') {
        $path = '/core/Core/Base/Model/RegistryStore.'.$target_extension ;
        require_once (REQUIRE_PREFIX.$path) ;
        return ;
    } else if ($classname === 'Info\Base') {
        $path = '/core/Core/Base/Info/Base.'.$target_extension ;
        require_once (REQUIRE_PREFIX.$path) ;
        return ;
    } else if ($classname === 'stdClass') {
        return ;
    }
    // \ISOPHP\core::$php->error_log("Autoloading " . $classname) ;
    $parts = \ISOPHP\core::$php->explode('\\', $classname) ;
    if ($parts[0] === 'Core') {
        \ISOPHP\js_core::$console->log('Looking in core for '.$classname) ;
        if ($classname == 'Core\Router') {
            $path = '/core/Core/Router.'.$target_extension ;
        } else if ($classname == 'Core\Control') {
            $path = '/core/Core/Control.'.$target_extension ;
        } else if ($classname == 'Core\View') {
            $path = '/core/Core/View.'.$target_extension ;
        }
        if (isset($path)) {
            $full_path = REQUIRE_PREFIX.$path ;
            \ISOPHP\js_core::$console->log('Core path, one line b4 require: ' . $full_path) ;
            require_once ($full_path) ;
        }
    }

    if ($parts[0] === 'Controller') {
        \ISOPHP\js_core::$console->log('Looking in Controller for '.$classname) ;
        $module = \ISOPHP\core::$php->str_replace('Controller', '', $parts[1]) ;
        $path = '/app/'.$module.'/Controller/'.$parts[1].'.'.$target_extension ;
        if (isset($path)) {
            \ISOPHP\js_core::$console->log('Found a controller path ' . $path) ;
            \ISOPHP\js_core::$console->log('Require Prefix: ' . REQUIRE_PREFIX) ;
            $full_path = REQUIRE_PREFIX.$path ;
            \ISOPHP\js_core::$console->log('Controller path, one line b4 require: ' . $full_path) ;
            require_once ($full_path) ;
        }
    }
    if ($parts[0] === 'Model') {
        // \ISOPHP\core::$php->error_log('Looking in Model') ;
        $module = \ISOPHP\core::$php->str_replace('Model', '', $parts[1]) ;
        $path = '/app/'.$module.'/Model/'.$parts[1].$parts[2].'.'.$target_extension ;
        if (isset($path)) {
            // \ISOPHP\core::$php->error_log('found a model path ' . $path) ;
            require_once (REQUIRE_PREFIX.$path) ;
        }
    }
    if ($parts[0] === 'View') {
        // \ISOPHP\core::$php->error_log('Looking in View') ;
        $module = \ISOPHP\core::$php->str_replace('View', '', $parts[1]) ;
        $path = '/app/'.$module.'/View/'.$parts[1].'.'.$target_extension ;
        if (isset($path)) {
            // \ISOPHP\core::$php->error_log('found a view path ' . $path) ;
            require_once (REQUIRE_PREFIX.$path) ;
        }
    }
}
