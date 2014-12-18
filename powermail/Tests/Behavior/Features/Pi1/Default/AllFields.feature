# Features/Pi1/Default/AllFields.feature
@Pi1DefaultAllFields
Feature: AllFields
  In order to see a word definition
  As a website user
  I need to be able to submit a form

  # L=0
  @javascript
  Scenario: Check if AllFields Form is rendered correctly
    Given I am on "/index.php?id=10"
    Then I should see "Input (E-Mail)"
    Then I should see "Textarea"
    Then I should see "Select Statisch"
    Then I should see "Select TypoScript"
    Then I should see "Select Multi"
    Then I should see "Check"
    Then I should see "Radio"
    Then I should see "country"
    Then I should see "Das ist der Text"
    Then I should see "Willkommen zum powermail Testparcour"
    Then the sourcecode should contain '<b>Fett</b> Mager'
    Then I should see "Password"
    Then I should see "Bitte erneut eintragen"
    Then I should see "Upload"
    Then I should see "Date"
    Then I should see "Location"
    Then I should see "yellow[\n]green"
    Then I should see "Captcha"

    When I fill in "tx_powermail_pi1[field][input]" with "email@email.org"
    When I fill in "tx_powermail_pi1[field][marker]" with "Test for Textarea äöß"
    When I select "green" from "tx_powermail_pi1[field][marker_02][]"
    When I select "brown" from "tx_powermail_pi1[field][selecttyposcript][]"
    When I select "yellow" from "tx_powermail_pi1[field][selectmulti][]"
    When I additionally select "black" from "tx_powermail_pi1[field][selectmulti][]"
    When I check "tx_powermail_pi1[field][marker_03][]"
    When I select "yellow" from "tx_powermail_pi1[field][marker_04]"
    When I select "Schweiz" from "tx_powermail_pi1[field][country]"
    When I fill in "tx_powermail_pi1[field][marker_09]" with "password"
    When I fill in "tx_powermail_pi1[field][marker_09_1]" with "password"
    When I attach the file "D:\behat\message.txt" to "tx_powermail_pi1[field][marker_10][]"
    When I fill in "tx_powermail_pi1[field][marker_12]" with "09.07.2014 14:00"
    When I fill in "tx_powermail_pi1[field][marker_13]" with "Kunstmühlstraße 12a, Rosenheim"
    When I fill in "tx_powermail_pi1[field][marker_01]" with "7"
    And I press "Submit"

    Then I should see "Sind diese Eingaben korrekt?"
    Then I should see "email@email.org"
    Then I should see "Test for Textarea äöß"
    Then I should see "green"
    Then I should see "brown"
    Then I should see "yellow"
    Then I should see "black"
    Then I should see "brown"
    Then I should see "CHE"
    Then I should see "password"
    Then I should see ".txt"
    Then I should see "09.07.2014 14:00"
    Then I should see "Kunstmühlstraße 12a, Rosenheim"
    Then I should see "7"
    And I press "Zurück"

    When I fill in "tx_powermail_pi1[field][input]" with "new@email.org"
    When I fill in "tx_powermail_pi1[field][marker]" with "Test for Textarea."
    When I additionally select "red" from "tx_powermail_pi1[field][selectmulti][]"
    When I select "Angola" from "tx_powermail_pi1[field][country]"
    When I fill in "tx_powermail_pi1[field][marker_12]" with "10.07.2014 14:30"
    When I fill in "tx_powermail_pi1[field][marker_01]" with "7"
    And I press "Submit"

    Then I should see "Sind diese Eingaben korrekt?"
    Then I should see "new@email.org"
    Then I should see "Test for Textarea."
    Then I should see "green"
    Then I should see "brown"
    Then I should see "yellow"
    Then I should see "black"
    Then I should see "brown"
    Then I should see "red"
    Then I should see "AGO"
    Then I should see ".txt"
    Then I should see "10.07.2014 14:30"
    Then I should see "Kunstmühlstraße 12a, Rosenheim"
    Then I should see "7"
    And I press "Weiter"

    Then I should see "Danke, alle Werte:"
    Then I should see "new@email.org"
    Then I should see "Test for Textarea."
    Then I should see "green"
    Then I should see "brown"
    Then I should see "yellow"
    Then I should see "black"
    Then I should see "brown"
    Then I should see "red"
    Then I should see "AGO"
    Then I should see ".txt"
    Then I should see "10.07.2014 14:30"
    Then I should see "Kunstmühlstraße 12a, Rosenheim"
    Then I should see "7"

