<?php

return function ($jQuery, $window, $console, $php, $file_index, $electron_remote) {
    $console->log('Binder Loaded!') ;
    require("./core/constants_uniter_prod.php") ;
    $console->log( "Require Prefix value in Binder: " . REQUIRE_PREFIX) ;
    $console->log("Uniter Build Level in Binder: " . UNITER_BUILD_LEVEL)  ;
    $console->log("window: ", $window)  ;
    require(REQUIRE_PREFIX."/core/app_vars.php") ;
    require(REQUIRE_PREFIX."/core/isophp.php") ;
    require(REQUIRE_PREFIX."/core/electron.php") ;
    \ISOPHP\js_core::$jQuery = $jQuery ;
    \ISOPHP\js_core::$window = $window ;
    \ISOPHP\js_core::$console = $console ;
    \ISOPHP\core::$php = $php ;
    \ISOPHP\core::$file_index = $file_index ;
    \ISOPHP\electron::$BrowserWindow = $electron_remote ;
    require(REQUIRE_PREFIX."/core/init.php") ;
    require(REQUIRE_PREFIX."/core/WindowMessage.php") ;
    require(REQUIRE_PREFIX."/core/bootstrap.php") ;
    require(REQUIRE_PREFIX."/core/index.php") ;
};
