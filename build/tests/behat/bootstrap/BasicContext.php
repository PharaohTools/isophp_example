<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\ContextInterface;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Behat context class.
 */

class BasicContext implements Context {


    /**
     * @Given /^I go to the start page$/
     */
    public function iRunTheApplicationCommandInTheShell()
    {
        $command = PTCCOMM ;
        exec($command, $output);
        $this->output = trim(implode("\n", $output));
    }
}