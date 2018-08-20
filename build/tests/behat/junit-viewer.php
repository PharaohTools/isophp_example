<?php
/**
 * Created by PhpStorm.
 * User: pharaoh
 * Date: 25/03/18
 * Time: 00:11
 */

$autoload = __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php' ;
require_once ($autoload) ;

use Naroga\JUnitParser\Parser;

if (isset($argv[1]) && $argv[1]!="") {
    $source = $argv[1] ;
    $source = rtrim($source, '/') . '/';
} else {
    echo "First argument must be source Junit XML directory\n" ;
    exit(1) ;
}

if (isset($argv[2]) && $argv[2]!="") {
    $target = $argv[2] ;
} else {
    echo "Second argument must be target HTML directory\n" ;
    exit(1) ;
}

$all_files = scandir($source) ;
foreach ($all_files as $one_file) {
    if (!in_array($one_file, array('.', '..'))) {
        $file_content = file_get_contents($source.$one_file) ;
        if (!isset($parser)) {
            $twig = new \Twig_Environment(new \Twig_Loader_String());
            $parser = new Parser($twig, $file_content);
        } else {

            $parser->addXmlContent($file_content);
        }
    }
}

$html = $parser->parse('html'); //Returns HTML result.
var_dump($html);
file_put_contents($target, $html) ;

