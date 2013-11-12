<?php namespace text\spelling;

/**
 * Spell checker
 *
 * @test  xp://text.spelling.unittest.SpellCheckerTest
 * @ext   pspell
 */
class SpellChecker extends \lang\Object {
  protected $handle= null;
  
  /**
   * Constructor
   *
   * @see     php://pspell_new
   * @param   string language
   * @param   string spelling
   * @param   string jargon
   * @param   string encoding 
   * @param   int mode 
   * @throws  lang.IllegalArgumentException
   */
  public function __construct($language, $spelling= null, $jargon= null, $encoding= null, $mode= PSPELL_NORMAL) {
    if (false === ($this->handle= pspell_new($language, $spelling, $jargon, $encoding, $mode))) {
      $e= new \lang\IllegalArgumentException('Could not create spell checker');
      \xp::gc(__FILE__);
      throw $e;
    }
  }
  
  /**
   * Checks a single word
   *
   * @param   string word
   * @return  bool
   */
  public function check($word) {
    return pspell_check($this->handle, $word);
  }

  /**
   * Retrieve suggestions for a given word.
   *
   * @param   string word
   * @return  string[]
   */
  public function suggestionsFor($word) {
    return pspell_suggest($this->handle, $word);
  }
}
