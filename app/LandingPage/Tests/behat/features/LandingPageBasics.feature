@landing @basics
Feature: Executing the Landing Page
  As an interface user
  I want to view the home page
  To see overview information about the product

  Scenario: See the Logo
    Given I go to the start page
    Then I find the logo

  Scenario: See some standard text
    Given I go to the start page
    Then I should see "Isomorphic php"
    Then I should see "The Web application"
    Then I should see "How it works"
    Then I should see "Why its useful"
    Then I should see "Lets get started"
