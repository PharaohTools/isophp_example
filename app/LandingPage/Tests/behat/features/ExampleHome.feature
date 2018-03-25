@home
Feature: Executing the Application
  As an interface user
  I want to execute the home page
  To see overview information about the application

  Scenario: See the Logo
    Given I go to the start page
    Then I find the logo

  Scenario: See some standard text
    Given I go to the start page
    Then I should see "Isophp example application"
    Then I should see "The Web application"
    Then I should see "How it works"
    Then I should see "Why it's useful"
    Then I should see "Lets get started"
