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

class FeatureContext  implements Context {

    private $output;
    public static $session ;

    /**
     * Initializes context. Every scenario gets it's own context object.
     *
     * @param array $parameters Suite parameters (set them up through behat.yml)
     */
    public function __construct() {
        $this->setup() ;
    }

    private function setup() {

    }

    /**
     * @Given /^I go to the start page$/
     */
    public function iGoToTheStartPage()
    {
// Choose a Mink driver. More about it in later chapters.
//        $driver = new \Behat\Mink\Driver\Selenium2Driver();
        $driver = new \Behat\Mink\Driver\GoutteDriver();
        $session = new \Behat\Mink\Session($driver);
        \FeatureContext::$session = $session ;
        $session->start();
        $session->visit('http://www.isophpexampleapplication.vm');
    }

    /**
     * @Given I go to the page :arg1
     */
    public function iGoToThePage($arg1)
    {
// Choose a Mink driver. More about it in later chapters.
//        $driver = new \Behat\Mink\Driver\Selenium2Driver();
        $driver = new \Behat\Mink\Driver\GoutteDriver();
        $session = new \Behat\Mink\Session($driver);
        \FeatureContext::$session = $session ;
        $session->start();
        $session->visit('http://www.isophpexampleapplication.vm'.$arg1);
    }

    /**
     * @Given /^I find the logo$/
     */
    public function iFindTheLogo()
    {
        $session = \FeatureContext::$session ;
        $page = $session->getPage();
        $logo = $page->find('css', '.header_logo');
        if ($logo == null) {
            throw new \Exception('Unable to find logo');
        }
    }

    /**
     * @Given /^I have a correct status code$/
     */
    public function iHaveACorrectStatusCode()
    {
        $session = \FeatureContext::$session ;
        $code = $session->getStatusCode() ;
        if ($code !== '200') {
            throw new \Exception('Status code not 200');
        }
    }


    /**
     * @Then I should see :arg1
     */
    public function iShouldSee2($arg1)
    {
        $session = \FeatureContext::$session ;
        $page = $session->getPage();
        $text = $page->getText();
        if (stripos($text, $arg1) == false) {
            var_dump($text) ;
            throw new \Exception('Unable to see "'.$arg1.'"');
        }
    }

    /**
     * @Given I go to the home page
     */
    public function iGoToTheHomePage(){
        $this->iGoToTheStartPage() ;
    }

}