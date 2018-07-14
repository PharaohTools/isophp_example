<?php

include("constants-webclient-server.fephp") ;
include("core/app_vars.".ISOPHP_EXTENSION) ;
include("core/isophp.".ISOPHP_EXTENSION) ;
include("core/init.".ISOPHP_EXTENSION) ;
include("core/WindowMessage.".ISOPHP_EXTENSION) ;
include("core/bootstrap.".ISOPHP_EXTENSION) ;
include("core/index.".ISOPHP_EXTENSION) ;

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <title></title>
        <link rel="stylesheet" href="app/ISOPHPExample/Assets/css/animate.css">
        <link rel="stylesheet" href="app/ISOPHPExample/Assets/css/icomoon.css">
        <link rel="stylesheet" href="app/ISOPHPExample/Assets/css/bootstrap.css">
        <link rel="stylesheet" href="app/ISOPHPExample/Assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="app/ISOPHPExample/Assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="app/ISOPHPExample/Assets/css/style.css">
        <script src="app/ISOPHPExample/Assets/js/modernizr-2.6.2.min.js"></script>
    </head>

    <body class="drag_body">
        <div id="message_overlay"></div>
        <div id="app-loader" class="app-loader"></div>
        <div id="template" class="app">
            <?php
                echo \Core\View::$server_template ;
            ?>
        </div>

        <?php define ('UNITER_BUILD_LEVEL', 'production') ; ?>
        <?php if (UNITER_BUILD_LEVEL == 'production') { ?>
            <script type="text/javascript" src="/uniter_bundle/prod_bundle.js"></script>
        <?php } else { ?>
            <script type="text/javascript" src="/uniter_bundle/bundle.js"></script>
        <?php } ?>

    </body>

</html>