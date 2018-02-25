<?php

//$pipe_dir = __DIR__.DIRECTORY_SEPARATOR."build/ptbuild/pipes" ;
$pipe_dir = "build/ptbuild/pipes" ;
$pipe_files = getDirContents($pipe_dir) ;


$other_files = array(
    "vars/configuration_devcloud.php",
    "vars/configuration_local.php",
    "vars/configuration_production.php",
    "vars/configuration_staging.php",
//    "vars/default.php", Intentionally leave this, update it manually
    "vars/production.php",
    "vars/staging.php",
    "vars/vm.php",
) ;

$files_to_update = array_merge($pipe_files, $other_files) ;

if ( isset($argv[1]) && ($argv[1] != '' || $argv[1] != false) ) {
    $var_files_string = $argv[1] ;
} else {
    echo "Comma seperated php files containing an array named vars or variables must be the first parameter to this script\n" ;
    exit (1) ;
}

$var_files_array = explode(',', $var_files_string) ;

$isophp_example_application_home = getcwd().DIRECTORY_SEPARATOR ;


$output_string  = '<?php '."\n" ;
$output_string .= ''."\n" ;
$output_string .= '  $vars = '."\n" ;
$output_string = '<?php '."\n" ;
$output_string = '<?php '."\n" ;

foreach ($files_to_merge as $file_to_merge) {

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

function getDirContents($path) {
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

    $files = array();
    foreach ($rii as $file)
        if (!$file->isDir())
            $files[] = $file->getPathname();

    return $files;
}

//function recursive_copy($source, $dest) {
////    $source = "dir/dir/dir";
////    $dest= "dest/dir";
//
//    mkdir($dest, 0755);
//    foreach (
//        $iterator = new \RecursiveIteratorIterator(
//            new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
//            \RecursiveIteratorIterator::SELF_FIRST) as $item
//    ) {
//        if ($item->isDir()) {
//            mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
//        } else {
//            copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
//        }
//    }
//}