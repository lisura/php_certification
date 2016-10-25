# Questões

#### 1) What is the output of the following code?
```php
$a = 3;
switch ($a) {
  case 1: echo 'one'; break;
  case 2: echo 'two'; break;
  default: echo 'four'; break;
  case 3: echo 'three'; break;
}
```
A. one

B. two

C. three

D. four

---
#### 2) What is "instanceof" an example of?

A. a boolean

B. an operator

C. a function

D. a language construct

E. a class magic

---
#### 3) What is the output of the following code?
```php
$a = 'a'; $b = 'b';
echo isset($c) ? $a.$b.$c : ($c = 'c').'d';
```
A. abc

B. cd

C. 0d

D. ab

E. d

#### 4) Which of the following are valid identifiers? (Choose 3)

A. function 4You() { }

B. function \_4You() { }

C. function object() { }

D. $1 = "Hello";

E. $\_1 = "Hello World";

#### 5) What super-global should be used to access information about uploaded files via a POST
request?

A. $\_SERVER

B. $\_ENV

C. $\_POST

D. $\_FILES

E. $\_GET

#### 6) What is the difference between "print" and "echo"?

A. There is no difference.

B. Print has a return value, echo does not

C. Echo has a return value, print does not

D. Print buffers the output, while echo does not

E. None of the above

#### 7) What is the result of the following bitwise operation in PHP?
```php
1 ^ 2
```
A. 1

B. 3

C. 2

D. 4

E. -1

#### 8) What is the output of the following code?
```php
$first = "second";
$second = "first";
echo $$$first;
```
A. "first"

B. "second"

C. an empty string

D. an error

E. "secondfirstsecond"

#### 9) What is the output of the following line of code:
```php
$a = 4 << 2 + 1;
echo $a;
```
A. 32

B. 16

C. 17

D. 1

E. 9

#### 10) What is the output of the following?
```php
$a = 7;
$b = 4;
function b($a, $b) {
 global $a, $b;
 $a += 7;
 $a++;
 $b += $a;
 return true;
}
echo $b, $a;
```
A. 1419

B. 74

C. 1519

D. 1915

E. 47


---

#### 11)	Qual diretiva você deve usar no php.ini para adicionar a extensão opCache?	Escolha	apenas uma.
a)	extension

b)	zend_extension

c)	dl

d)	extension_ts

e)	zend_extension_ts


#### 12) Quais desses elementos são construtores de	linguagem? Escolha	apenas um.

a)	array()

b)	continue

c)	echo()

d)	print()

e)	eval()

f)	exit()



#### 13) Qual	o	nome da constante	que	o	PHP	utiliza	para	informar que o código	não	funcionará no futuro?

a)	E_NOTICE

b)	\_\_CLASS\_\_

c)	E_WARNING

d)	E_DEPRECATED

e)	E_ALL

#### 14) Which of the following types of errors halts the execution of a script and cannot be trapped?

a) Fatal error

b) Warning

c) Notice

d) Compile-time error


#### 15) Which of the following are the core extensions? Each correct answer represents a complete solution. Choose all that apply.

a) Classes

b) Arrays

c) PECL

d) Objects


#### 16)  You run the following PHP script:

```php
<?php
$a = 'a';
$b = 2;
$c = &$a;
$d = 'b';
$e = $$d;
$f = 0xA;
$g = 010;
$h = false;

echo $c % $b . PHP_EOL;
echo $f - $g . PHP_EOL;
echo $e + (int)$h . PHP_EOL;
echo $a / ($b + (int) 0xB ) . PHP_EOL;
echo $h ? --$b : $b++ . PHP_EOL;
echo $d ? --$b : $b++ . PHP_EOL;

```

a) 0 2 2 0 2 2

b) 2 0 2 2 0 0

c) 2 0 2 0 2 0

d) 0 2 2 2 0 0


#### 17) Which of the following PHP directives will you use to display all errors except notices?

a) display_errors= E_ALL - E_NOTICE

b) display_errors= ~E_NOTICE

c) display_errors= ^E_NOTICE

d) error_reporting= ~E_NOTICE

e) error_reporting= E_ALL & ~E_NOTICE


#### 18) Which of the following is used to set a constant?

a) set

b) const

c) define

d) con


#### 19) Which of the following is a magic constant?

a) $\_SERVER

b) $\_POST

c) $\_GET

d) \_\_LINE\_\_


#### 20) Which of the following is related to APC (Alternative PHP Cache)?

a) variable

b) Byte code Cache

c) constante

d) Namespace

---
## Respostas
1) C

2) B

3) B

4) B,C,E

5) D

6) B

7) B

8) B

9) A

10) E

---

11) B

12) F

13) D

14) A

15) A,B,D

16) A

17) E

18) C

19) D

20) B
