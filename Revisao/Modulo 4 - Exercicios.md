# Questões

#### 1) How many parameters does array_merge() accept?

A. As many as you want

B. 3

C. 2

D. 1

E. 0

---
#### 2) Which SPL class implements fixed-size storage?

---
#### 3) What is the output of the following code?
```php
<?php
$a = "a, b,c, d, e f, g";
$b = array_merge(explode(', ', $a), array("a", "b"));
echo count($b);
```
A. 9

B. 7

C. 5

D. 3

E. An error, because $a is not an array

---
#### 4) What is the output of the following code?
```php
<?php
$a = ["a" => "n",
"o" => "t",
"h" => "e"];
array_unshift($a, "f");
$a = extract($a);
echo $a;
```
A. f

B. Array

C. n

D. 3

E. 4

---
#### 5) What is the output of this code:
```php
<?php
function c($a, $b = 1, $c) {
return array($c, $a, $b);
}
list($a, $b, $c) = c(0,0,0);
echo $b;
```

---
#### 6) What is the output of this code?
```php
<?php
$wish_list = array(1 => "Romeo and Juliet",
4 => "Bad Science",
2 => "To Kill A Mockingbird");
print_r(sort($wish_list));
```
A.
Array ( [1] => Romeo and Juliet [4] => Bad Science [2] => To Kill A
Mockingbird )

B.
Array ( [1] => Romeo and Juliet [2] => To Kill A Mockingbird [4] => Bad
Science )

C. 1

D.
Array ( [0] => Bad Science [1] => Romeo and Juliet [2] => To Kill A
Mockingbird

E. 3

---
#### 7)Consider the following PHP script:
```PHP
<?php
$a = array(
         1 => 'php',
          'Hypertext',
          'Preprocessor',
           'widely used' => 
            array(
                           'general' => 'purpose',
                            'scripting' => 'language',
                            'that' => 'was',
                            'originally' => 
                             array(
                                            5 => 'designed',
                                            9 => 'for',
                                            'Web development',
                                             4 => 'purpose',
                                     )
                    )
            );
 
//write code here  
?>
```
What should you write here to print the value 'Web development'?

A. print $a[widely used][originally][3];

B. print $a[2][3][3];

C. print $a['widely used']['originally'][0];

D. print $a['widely used']['originally'][10];

---
#### 8) What is the output of the following code?
```php
<?php
$g = range(5,8);
$h = array("a", "b", "c", "e");
for($i = 0; $i < count($g); $i++) {
  foreach ($h as $j) {
    echo $i.$j;
    break;
  }
}
```
A. 0a1a2a3a

B. 5a6a7a8a

C. 5a6b7c8e

D. 0a1b2c3e

E. 5a5b5c5e6a6b6c6e7a7b7c7e8a8b8c8e

---
#### 9) What is the output of this code?
```php
<?php
$array1 = array ('a' => 20, 30, 35);
$array2 = array ('b' => 20, 35, 30);
$array = array_intersect_assoc ($array1, $array2);
var_dump ($array);
?>
```
A. array(1) { ["'a'"]=> int(20)}

B. array(3) { ["'a'"]=> int(20) [0]=> int(30) [1]=> int(35) }

C. array(0) { }

D. The script will throw an error message.

---
#### 10) What is the output of this code?
```php 
<?php
$array = array ('1', '2', '3');
foreach ($array as $key => $value) {
      $value = 4;
}
print_r($array);
?>
```
A. The script will throw an error message.

B. Array ( [0] => 1 [1] => 2 [2] => 3 )

C. Array ( [0] => 4 [1] => 8 [2] => 12 )

D. Array ( [0] => 1 [4] => 2 [8] => 3 )

---
## Respostas
1) A

2) SplFixedArray

3) B

4) D (Extract ignora chaves numéricas e retorna a quantidade de variáveis geradas com sucesso. Unshift insere o elemento na posição 0)

5) 0

6) C (true)

7) D

8) A

9) C

10) B
