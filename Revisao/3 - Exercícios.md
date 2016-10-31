# Perguntas

**1 - What is a good rule to follow when quoting string data?**

a) Use double quotes because you might want to use variable interpolation at a later time

b) Use single quotes unless you are using variable interpolation because single quotes are faster

c) Use single quotes unless you have a ' in your string or you are doing variable
 interpolation because it declares whether you want variables to be interpolated

---

**2 - You want to search for such users who have not used any digit in their user names to register to your Website. Which of the following regular expressions will you use to accomplish the task?**

a) [[:digit:^]]

b) [^[:digit:]]

c) ^[[:digit]]

d) [[:digit:]^]

---

**3 - What is the key difference between HEREDOC and NOWDOC?**

a) NOWDOC allows you to use block delimiters with a single quote

b) HEREDOC terminates a block starting at the first character, but NOWDOC allows you to indent the end of the block

c) NOWDOC does not parse for variable interpolation, but HEREDOC does

---


**4 - What function used to create an array from a string?**


---

**5 - Consider the following PHP script:**
````php
<?php
$charlist = array (
'a' => 'one',
'b' => 'two',
);
***************
````

**What statement will you write instead of \*\*\*\*\* to get the output onectwo?**

a) echo strstr ('acb', $charlist);

b) echo strtr ('acb', $charlist);

c) echo strip_tags('acb', $charlist);

d) echo strtok ('acb', $charlist);

----

**6 - Which of the following metacharacters can be used to find a non-word character?**

a) \W

b) **.**

c) \d

d) \w

----

**7 - One way to compare strings in PHP is by using the strcmp() function. This is useful since not only can you determine if two strings are equal, but you can also test if one string is 'greater than' the other (using the corresponding ASCII values in each character comparison).  
What is the output of the following PHP script?**
````php
<?php
$test1 = strcmp('hello', "hello");
$test2 = strcmp("Hello", "hello");
$test3 = strcmp('60', '500');

if ($test1 == 0)     { echo "a"; }
else if ($test1 < 0) { echo "b"; }
else                 { echo "c"; }

if ($test2 == 0)     { echo "d"; }
else if ($test2 < 0) { echo "e"; }
else                 { echo "f"; }

if ($test3 == 0)     { echo "g"; }
else if ($test3 < 0) { echo "h"; }
else                 { echo "i"; }

````

----

**8 - What is the output of the following PHP script?**
````php
<?php
$a = 0.5;
$b = 0.1;
$c = 16;

echo sprintf('%01.2lf %.1lf 0x%x', $a, $b, $c);

````

a) 0.50 .1 0x10

b) 0.50 0.1 0x16

c) 0.50 0.1 0x10

d) 0.5 0.1 0x16


-----  

**9 - What will the following code print out?**
````php
<?php
$string = 'abcda';

$procurar = 'a';

$pos = strpos($string, $procurar);

if (!$pos) {
echo "não encontrei";
}
else {
echo "encontrei " . $pos;
}
````

-----

**10 - **What will the following code print out?**
````php
<?php
$string = "14302";

$string[$string[2]] = "4";

echo $string;
````

----

**11 - What will the following code print?**
````php
<?php
$a = 'héllô wõrd';

echo strlen($a);
````

a) 1, since the space is the only ASCII character in the string

b) 13, since PHP does not natively understand UTF-8 encoding

c) 10, since it only counts the first byte of a UTF-8 encoded character

-----

**12 - What will the following code print?**
````php
<?php
$a = 'ĥéllô wõrd';
$m = array();
preg_match('/./u', $a, $m);

echo $m[0];
````

a) An unprintable character because PHP does not understand UTF-8

b) ĥ , because PCRE can understand UTF-8

c) Nothing, because PHP does not understand UTF-8

-----


# Repostas

 1 - C

 2- B  
Obs.: ^ significa negação. A e D são incorretas pois usam o ^ de forma incorreta. C é incorreta pois busca por resultados que começam com digito. A resposta b busca por um padrão que possui qualquer elemento que não seja um dígito.

3 - C

4 - explode

5 - B  
Obs.: http://www.php.net/manual/en/function.strtr.php

6 - A

7 - aei

8 - C

9 - não encontrei  
Obs.: http://www.php.net/manual/en/function.strpos.php

10 - 14342

11 - B

12 - B
