<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;

/**
 * Behat context class.
 */

class FeatureContext  implements Context
{

    private $output;

    /**
     * Initializes context. Every scenario gets it's own context object.
     *
     * @param array $parameters Suite parameters (set them up through behat.yml)
     */
    public function __construct() {
        $this->setup();
//        $this->useContext('noactions', new \NoActionsContext()) ;
//        $this->useContext('anymods', new \AnyModuleActionsContext()) ;
    }

    private function setup() {
//        try {
//            require_once ($bd.'src'.DS. 'Constants.php') ; }
//        catch (\Exception $e) {
//            echo "Setup cant load constants\n" ;
//            echo 'Message: ' .$e->getMessage(); }
//        try {
//            require_once ($bd.'src'.DS. 'BootstrapCore.php') ; }
//        catch (\Exception $e) {
//            echo "Setup cant load Bootstrap Core Class\n" ;
//            echo 'Message: ' .$e->getMessage(); }
    }

}