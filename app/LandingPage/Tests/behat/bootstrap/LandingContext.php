<?php

namespace LandingPage ;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\ContextInterface;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Behat context class.
 */

class LandingContext implements Context {

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
     * @Given /^I find the logo$/
     */
    public function iFindTheLogo()
    {
        $session = \FeatureContext::$session ;
        $page = $session->getPage();
        $logo = $page->find('css', '.header_logo');
        if ($logo == null) {
            return false ;
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
            return false ;
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
            return false ;
        }
    }

    /**
     * @Given I go to the home page
     */
    public function iGoToTheHomePage(){
        $this->iGoToTheStartPage() ;
    }


}