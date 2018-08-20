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
    Then I should see "Try out the Demo Apps"
    Then I should see "Build an Application"
    Then I should see "See other Applications built with ISO PHP"