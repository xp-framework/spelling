Spelling based on pspell for the XP Framework
========================================================================

Built on top of the [pspell](http://de3.php.net/pspell) functionality in
PHP.

```php
use text\spelling\SpellChecker;

$spell= new SpellChecker('en');
$spell->check('Hello');             // true
$spell->check('Bahnhof');           // false

$spell->suggestionsFor('delibrate'); //  [ "deliberate", "deliberator", ... ]
```