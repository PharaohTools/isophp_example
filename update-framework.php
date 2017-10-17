<?php

$files_to_update = array(
//    "build/ptbuild/pipes/build_development_application/defaults",
//    "build/ptbuild/pipes/build_development_application/settings",
//    "build/ptbuild/pipes/build_development_application/steps",
    "build/ptbuild/ptbuildvars",
//    "build/ptc/all-vm-web-assets.dsl.php", # Intentionally leave this
    "build/ptc/build-desktop-application.dsl.php",
    "build/ptc/build-machine-osx.dsl.php",
    "build/ptc/build-mobile-application.dsl.php",
    "build/ptc/build-web-client-application.dsl.php",
    "build/ptc/build-web-server-application.dsl.php",
    "build/ptc/cloud-mobile-build.dsl.php",
    "build/ptc/config-build-server.dsl.php",
    "build/ptc/development.dsl.php",
    "build/ptc/dev-host.dsl.php",
    "build/ptc/socket-server-restart.dsl.php",
    "build/ptc/virtual-machine.dsl.php",
    "clients/desktop/app.js",
    "clients/mobile/config.xml",
    "clients/mobile/www/js/app.js",
    "clients/mobile/www/js/index.js",

//    "core/Core/Base/Model/Base.php",
//    "core/Core/Base/Model/Navigate.php",

    "vars/configuration_devcloud.php",
    "vars/configuration_local.php",
    "vars/configuration_production.php",
    "vars/configuration_staging.php",
//    "vars/default.php", Intentionally leave this, update it manually
    "vars/production.php",
    "vars/staging.php",
    "vars/vm.php",
//    "Virtufile",
) ;

foreach ($files_to_update as $file_to_update) {
    if ( ($argv[1] == false) || ($argv[1] == '')) {
        $isophp_home = $argv[1] ;
    } else {
        echo "ISO PHP Home Dir shold be first/only parameter to this script\n" ;
        exit (1) ;
    }
    $isophp_example_application_home = getcwd().DIRECTORY_SEPARATOR ; # $argv[1] $argv[2]
    $comm = "cp {$isophp_example_application_home}{$file_to_update} {$isophp_home}{$file_to_update}" ;
    system($comm) ;
}