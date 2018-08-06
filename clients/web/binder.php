<?php

return function ($jQuery, $window, $console, $php, $file_index) {

    print 'Binder Loaded!';
    define('UNITER_BUILD_LEVEL', 'production') ;
    define('REQUIRE_PREFIX', '.') ;
    print "ReqPref: " . REQUIRE_PREFIX ;
    print "UBL: " . UNITER_BUILD_LEVEL ;

    require(REQUIRE_PREFIX."/core/constants.php") ;
    require(REQUIRE_PREFIX."/core/app_vars.php") ;
    require(REQUIRE_PREFIX."/core/isophp.php") ;
    \ISOPHP\js_core::$jQuery = $jQuery ;
    \ISOPHP\js_core::$window = $window ;
    \ISOPHP\js_core::$console = $console ;
    \ISOPHP\core::$php = $php ;
    \ISOPHP\core::$file_index = $file_index ;
    require(REQUIRE_PREFIX."/core/init.php") ;
    require(REQUIRE_PREFIX."/core/WindowMessage.php") ;
    require(REQUIRE_PREFIX."/core/bootstrap.php") ;
    require(REQUIRE_PREFIX."/core/index.php") ;
};
