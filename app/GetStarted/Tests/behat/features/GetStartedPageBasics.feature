@getstarted @basics
Feature: Executing the Get Started Page
  As an interface user
  I want to view the Get Started page
  To see overview information about the product

  Scenario: See the Logo
    Given I go to the page "/GetStarted"
    Then I find the logo

  Scenario: See some standard text
    Given I go to the page "/GetStarted"
    Then I should see "Isophp example application"
    Then I should see "The Web application"
    Then I should see "How it works"
    Then I should see "Why it's useful"
    Then I should see "Lets get started"
