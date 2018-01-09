<?php

$files_to_update = array(
    "build/ptbuild/pipes",
//    "build/ptbuild/pipes/build_development_application/defaults",
//    "build/ptbuild/pipes/build_development_application/settings",
//    "build/ptbuild/pipes/build_development_application/steps",
    "build/ptbuild/ptbuildvars",
    "build/android-shell.bash",
    "build/cloud-android-shell.bash",
    "build/vm-android-shell.bash",
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
    "clients/desktop/fs.js",
    "clients/mobile/config.xml",
    "clients/mobile/app.js",
    "clients/mobile/fs.js",
    "clients/mobile/www/js/index.js",
    "clients/web/app.js",
    "clients/web/fs.js",
    "core/Core/Control.php",
    "core/Core/Router.php",
    "core/Core/View.php",
    "core/Core/Base/Controller/Base.php",
    "core/Core/Base/Controller/Result.php",
    "core/Core/Base/Info/Base.php",
    "core/Core/Base/Model/Base.php",
    "core/Core/Base/Model/Navigate.php",
    "core/Core/Base/Model/RegistryStore.php",
    'core/bootstrap.php',
    'core/electron.fephp',
    'core/index.php',
    'core/init.php',
    'core/isophp.php',
    'core/WindowMessage.php',
    "vars/configuration_devcloud.php",
    "vars/configuration_local.php",
    "vars/configuration_production.php",
    "vars/configuration_staging.php",
//    "vars/default.php", Intentionally leave this, update it manually
    "vars/production.php",
    "vars/staging.php",
    "vars/vm.php",
    "update-framework.php",
//    "Virtufile",
) ;


if ( isset($argv[1]) && ($argv[1] != '' || $argv[1] != false) ) {
    $isophp_home = $argv[1] ;
} else {
    echo "ISO PHP Home Dir should be first parameter to this script\n" ;
    exit (1) ;
}

if ( isset($argv[2]) && ($argv[2] == 'to' || $argv[2] == 'from') ) {
    $to_from = $argv[2] ;

} else {
    echo "to or from must be the second parameter to this script\n" ;
    exit (1) ;
}

$isophp_example_application_home = getcwd().DIRECTORY_SEPARATOR ;

foreach ($files_to_update as $file_to_update) {

    if ($to_from === 'to') {
        $comm = "cp {$isophp_example_application_home}{$file_to_update} {$isophp_home}{$file_to_update}" ;
    } else {
        $comm = "cp {$isophp_home}{$file_to_update} {$isophp_example_application_home}{$file_to_update}" ;
    }

    if ( isset($argv[3]) && ($argv[3] == 'run') ) {
        echo "run parameter included, performing commands for real\n" ;
        system($comm) ;
    } else {
        if (!isset($runny)) {
            echo "run parameter not included, just echoing what I would have run...\n" ;
            $runny = true ;
        }
        echo "{$comm}\n" ;
    }

}