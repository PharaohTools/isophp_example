<?php

//$pipe_dir = __DIR__.DIRECTORY_SEPARATOR."build/ptbuild/pipes" ;
$pipe_dir = "build/ptbuild/pipes" ;
$pipe_files = getDirContents($pipe_dir) ;

$other_files = array(
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
//    "clients/mobile/config.xml",
    "clients/mobile/app.js",
    "clients/mobile/fs.js",
    "clients/mobile/binder.php",
    "clients/mobile/constants_uniter_prod.fephp",
    "clients/mobile/constants_uniter.fephp",
    "clients/mobile/constants-webclient-server.fephp",
    "clients/mobile/dev_app.js",
    "clients/mobile/prod_app_webpack.js",
    "clients/mobile/uniter_build_level",
    "clients/mobile/webpack.config.js",
    "clients/mobile/www/index_prod.js",
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

$files_to_update = array_merge($pipe_files, $other_files) ;


if ( isset($argv[1]) && ($argv[1] != '' || $argv[1] != false) ) {
    $isophp_home = $argv[1] ;
    if (substr($isophp_home, -1, 1) !== DIRECTORY_SEPARATOR) {
        $isophp_home .= DIRECTORY_SEPARATOR ;
    }
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
        $dir = dirname($isophp_home.$file_to_update) ;
        if (!is_dir($dir)) mkdir($dir, 0755, true) ;
        $comm = "cp {$isophp_example_application_home}{$file_to_update} {$isophp_home}{$file_to_update}" ;
    } else {
        $dir = dirname($isophp_example_application_home.$file_to_update) ;
        if (!is_dir($dir)) mkdir($dir, 0755, true) ;
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



if ( isset($argv[3]) && ($argv[3] == 'run') ) {
    echo "run parameter included, updating mobile config for real\n" ;

    if ($to_from === 'to') {
        configMobileXml($isophp_example_application_home, $isophp_home) ;
    } else {
        configMobileXml($isophp_home, $isophp_example_application_home) ;
    }
} else {
    if (!isset($runny)) {
        echo "run parameter not included, not updating mobile config...\n" ;
    }
}

function getDirContents($path) {
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
    $files = array();
    foreach ($rii as $file)
        if (!$file->isDir())
            $files[] = $file->getPathname();
    return $files;
}


function configMobileXml($source, $target) {

    echo "Now configuring Mobile client XML\n" ;
    $source_config_xml_location = $source  . 'clients'. DIRECTORY_SEPARATOR .'mobile'. DIRECTORY_SEPARATOR .'config.xml' ;
    $override_config_xml_location = $target . 'config-overrides.xml' ;
    $target_file_location = $target . 'clients'. DIRECTORY_SEPARATOR .'mobile'. DIRECTORY_SEPARATOR .'config.xml' ;
    echo "Source XML: $source_config_xml_location\n" ;
    echo "Override XML: $override_config_xml_location\n" ;
    echo "Target XML: $target_file_location\n" ;

    $agg_xml_object = simplexml_load_file($source_config_xml_location) ;
    if (file_exists($override_config_xml_location)) {

        $override_xml_object = simplexml_load_file($override_config_xml_location) ;

        // update widget element attributes
        $new_attributes = $override_xml_object->attributes() ;
        $agg_xml_object->attributes()->id = $new_attributes->id ;
        $agg_xml_object->attributes()->version = $new_attributes->version ;

        // update anything else defined entirely
        foreach ($override_xml_object as $key => $child_element) {
            $agg_xml_object->$key = $child_element ;
        }

        $string = $agg_xml_object->asXML();
        file_put_contents($target_file_location, $string) ;
    } else {
        echo "No Overrides to merge available in target location {$override_config_xml_location}\n" ;
    }
}