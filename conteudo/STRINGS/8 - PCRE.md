## PCRE

São divididas em duas:
- Expressão Regular (POSIX Extended)
- PCRE - Expressões Regulares (Compatíveis com Perl)

> POSIX não é coberto pela prova de certificação

### PCRE(Perl Compatible Regular Expressions)

- multi-byte string compatible
- delimiter – used in the beginning and end of each pattern, can be manually assigned, usually “/”, “#”, “~”, “!” or use brackets: {pattern}
- greediness – by default the maximum match is returned for each character symbol


#### Meta-characters

char | descrição
--- | ---
\ | general escape character
[] | a class
&#124; | or
() | a sub-pattern
[^] | negate the class, must be put in the first character
[-] | range
 | Character Classes
\d | Digits 0-9 [:digit:]
\D | Anything not a digit
\w | Any alphanumeric character or an underscore (_) [:word:]
\W | Anything not an alphanumeric character or an underscore
\s | Any whitespace (spaces, tabs, newlines) [:space:]
\S | Any non-whitespace character
. | Any character except for a newline
alnum | letter and digits
alpha | letters
lower | lower case letters
upper | upper case letters


#### Anchors

char | descrição
--- | ---
^ | Start of a line
$ | End of a line (if multiline mode is on, /n evaluates to end of line)

##### Positioners

char | descrição
--- | ---
\b | word boundary
\B | not a word boundary
\A | Start of a string
\Z | End of a string or newline at end
\z | End of a string
\G | first matching position in subject

##### Quantifiers

char | descrição
--- | ---
? | Occurs 0 or 1 time
* | Occurs 0 or more times
+ | Occurs 1 or more times
{n} | Occurs exactly n times
{,n} | Occurs at most n times
{m,} | Occurs m or more times
{m,n} | Occurs between m and n times
| Combination of ? with * or + makes the pattern non-greedy, i.e. *? or +?

##### Unicode Character Properties (for UTF-8)

char | descrição
--- | ---
\p{xx} | a character with the xx property
\P{xx] | a character without the xx property
\X | an extended Unicode sequence

#### Pattern Modifiers

i – Case insensitive search
m – Multiline, $ and ^ will match at newlines
s – Makes the dot metacharacter match newlines
x – Allows for commenting
U – Makes the engine un-greedy
u – Turns on UTF8 support
e – Matched with preg_replace() allows you to call

**Example**
$pattern = ‘/^\s+/i’;

#### Functions


preg_match ($pattern, $subject, $matches, $flags, $offset);   // perform a regular expression match, stop once matched, return 1 if matched, 0 if not matched, FALSE if error occurs
preg_match_all ();  // Perform a global regular expression match, returns the number of matches
preg_grep ($pattern, $array);  // returns the array consisting of the elements of the input array that match the given pattern, keys preserved, like preg_filter except without replacement
preg_filter ($pattern, $replace, $subject);   // returns and replace the $subject when there is a match, $subject can be arrays
preg_replace ($pattern, $replace, $subject);   // returns all the $subject after replacement with matches
preg_replace_callback ($pattern, $callback, $subject)  // transform using a callback function
$array = preg_split ($pattern, $string);  // the array contains the $string split with $pattern
preg_quote ($sting, $optional_delimiter); // format the string into a PECL pattern with escape characters
preg_last_error ();   // return the error code of the last regex execution, e.g. PREG_NO_ERROR, PREG_BAD_UTF8_OFFSET_ERROR
