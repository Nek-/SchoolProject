Feature:
  As a user
  I should be able to show the homepage

  Scenario: show the homepage
    Given I am on the homepage
    Then I should see "Hello"

  @javascript
  Scenario: send the form
    Given I am on the homepage
    And I follow "Ajouter une ligne"
    And I fill in "Amount" with "10"
    And I fill in "Description" with "Swagg"
    And I fill in "Vat" with "20"
    When I press "Envoyer"
    Then I should see "Total: 12"
