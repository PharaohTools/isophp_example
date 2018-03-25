<?php

echo "Generating Yaml for executing Behat".PHP_EOL ;

// find and collate feature dirs
define("DS", DIRECTORY_SEPARATOR) ;

$contexts = array() ;
$contexts[] = "FeatureContext" ;
$contexts[] = "AnyModuleActionsContext" ;
$feature_paths = array('%paths.base%/features') ;

$app_dir = dirname(dirname(dirname(__DIR__))).DS."app".DS ;
$mods = scandir ($app_dir) ;

foreach ($mods as $mod) {
    if (!in_array($mod, array('.', '..', '.git', '.gitkeep'))) {
        $context_path = $app_dir.$mod.DS.'Tests'.DS.'behat'.DS.'bootstrap' ;
        $feature_path = $app_dir.$mod.DS.'Tests'.DS.'behat'.DS."features" ;
        if (is_dir($feature_path)) {
            $feature_paths[] = $feature_path ;
        }
        if (is_dir($context_path)) {
            $context_path_files = scandir($context_path) ;
            foreach ($context_path_files as $context_path_file) {
                if (!in_array($context_path_file, array('.', '..'))) {
                    $context_class = substr($context_path_file, 0, strlen($context_path_file)-4 ) ;
                    $context_class_with_namespace = $mod.'\\'.$context_class ;
                    var_dump($context_class_with_namespace) ;
                    $contexts[] = $context_class_with_namespace ;
                }
            }
        }
    }
}



$contexts_string = implode(",", $contexts) ;
$fps = '' ;
foreach ($feature_paths as $feature_path) {
    $fps .= "                - {$feature_path}\n" ;
}

    $start_yaml = "
default:
    autoload:
        - %paths.base%/bootstrap
    suites:
        core_features:
            paths: 
{$fps}            contexts: [ {$contexts_string} ]
" ;

$res = file_put_contents(__DIR__.DS."behat_gen.yml", $start_yaml) ;
if ($res == false) {
    echo "Unable to write Behat Configuration file to ".__DIR__.DS."behat_gen.yml".PHP_EOL ;
    exit(1) ; }
echo "Wrote {$res} Bytes in Behat Configuration file to ".__DIR__.DS."behat_gen.yml".PHP_EOL ;
exit(0) ;
