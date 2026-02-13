Feature: Page championnat

    Scenario: La page index des championnats répond
        Given I am on "/championnat"
        Then the response status code should be 200
