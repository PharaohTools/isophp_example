@basics
Feature: Basic functionality of all modules
  As a command line user
  I want to execute any modules basic features
  To see they are working before use

  Scenario: Execute any help command for a correct exit code
    Given I run the help for all compatible modules checking success exit codes
