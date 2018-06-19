<?php
print 'Hello from binder.php!';
return function ($document) {
    require("core/constants.fephp") ;
    require("core/app_vars.php") ;
    require("/core/isophp.php") ;
//    \\ISOPHP\\core::$php = $php ;
//    \\ISOPHP\\core::$file_index = $file_index ;
    require("/core/init.php") ;
    require("/core/WindowMessage.php") ;
    require("/core/bootstrap.php") ;
    require("/core/index.php") ;
};

