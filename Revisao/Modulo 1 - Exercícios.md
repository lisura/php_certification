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

B. function _4You() { }

C. function object() { }

D. $1 = "Hello";

E. $_1 = "Hello World"; 

#### 5) What super-global should be used to access information about uploaded files via a POST
request?

A. $_SERVER

B. $_ENV

C. $_POST

D. $_FILES

E. $_GET 

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
