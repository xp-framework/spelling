<?php namespace text\spelling\unittest;

use text\spelling\SpellChecker;

/**
 * TestCase for spelling API
 *
 * @see      xp://text.spelling.SpellChecker
 */
#[@action(new \unittest\actions\ExtensionAvailable('pspell'))]
class SpellCheckerTest extends \unittest\TestCase {

  /**
   * Create a new spell checker instance with the specified language
   *
   * @param   string $language
   * @return  text.spelling.SpellChecker
   */
  protected function spelling($language) {
    return new SpellChecker($language);
  }

  #[@test, @expect('lang.IllegalArgumentException')]
  public function unavailable_language_passed_to_constructor_raises_exception() {
    $this->spelling('@@unavailable@@');
  }
  
  #[@test]
  public function check_returns_true_for_correctly_spelled_input() {
    $this->assertTrue($this->spelling('en')->check('Hello'));
  }

  #[@test]
  public function check_returns_false_for_correctly_misspelled_input() {
    $this->assertFalse($this->spelling('en')->check('Bahnhof'));
  }

  #[@test]
  public function suggestions_returns_nonempty_array_for_misspelled_input() {
    $suggestionsFor= $this->spelling('en')->suggestionsFor('delibrate');
    $this->assertArray($suggestionsFor);
    $this->assertNotEquals(0, sizeof($suggestionsFor));
  }
}
