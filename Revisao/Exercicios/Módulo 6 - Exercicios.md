# Questões

1 - Which of the following is the correct naming convention of user defined functions?

A) &sum($var1, $var2)

B) 123_sum($var1,$var2)

C) ^^\_sum($var1, $var2)

D) \_sum($var1, $var2)
___
2 - Which of the following options about return statement is true?

A) You can return any type of value including arrays and objects.

B) The return statement does not halt the functions execution and passes control back to the line from which the function was called.

C) The return statement does not return string values and Boolean values.

D) The return statement does not work with anonymous functions.
___

3) You want to create an anonymous function in the middle of a script that will return the square of a given number. Which of the following PHP scripts can you use to accomplish the task?

Each correct answer represents a complete solution. Choose two.

A)
```PHP
<?php
$foo = create_function('$x', 'return $x*$x;');
echo $foo(10);
?>
```
B)
```PHP
<?php
$foo = create_function("\$x", "return \$x*\$x;");
echo $foo(10);
?>
```
C)
```PHP
<?php
$foo = create_function("$x", "return $x*$x;");
echo $foo(10);
?>
```
D)
```PHP
<?php
$foo = create_function("$x", "$x*$x;");
echo $foo(10);
?>
```
___

4 - Which of the following statements will return the second parameter passed to a function?

A) func_get_arg(1);

B) func_get_args(2);

C) func_num_args(2);

D) func_num_args(1);

___

5 - What is the output of the following code? (Choose 2)

```php
<?php
function addValues(){
    $sum = 0;
    for ($i = 1; $i <= func_num_args(); $i++){
      $sum += func_get_arg($i);
    }
    return $sum;
}
echo addValues(1,2,3);
```
A) 5  

B) 6  

C) A parse error  

D) A warning  
___

6 - Take a look at the following code...

```php
<?php
function myFunction($a){
    $a++;
}
$b = 1;
myFunction($b);
```
What code do you need to replace so that $b has the value 2 at the end of the script?

A) Line 02: Replace $a with &$a  

B) Line 03: Replace $a++ with $a +=2;  

C) Line 03: Replace $a++ with $a \*=2;  

D) Line 06: Replace $b with &$b  
___

7 - What is the output of the following code?

```php
<?php
function increment ($val){
  return ++$val;
}
echo increment(1);
 ?>
```
___

8 - What is the best way to test if $param is an anonymous function in a method?

A) Use method_exists($this, $param)  

B) Use is_callable($param)  

C) Use the type-hint Closure on the signature  

D) Use is_executable($param)  

___

9 - What is the output of the following code?

```php
<?php
$x = function func ($a, $b, $c){
  print "$c|$b|$a\n";
};
print $x(1,2,3);
```
A) Syntax error  

B) 3|2|1  

C) 1|2|3  

___

10 - What is the output of the following code (ignoring any PHP notices and
error messages)?

```php
<?php
$v1 = 1;
$v2 = 2;
$v3 = 3;
function myFunction(){
  $GLOBALS['v1'] *= 2;
  $v2 *=2;
  global $v3; $v3 *= 2;
}
myFunction();
echo "$v1$v2$v3";
 ?>
```
A) 123  

B) 246  

C) 226  

D) 126  

___
___
RESPOSTAS
___
___

1 - D |
Function name can be started only by letters and underscore( _ )

___

2 - A |
You can return any type including arrays and objects. The return statement ends the functions execution and passes control back to the line from which the function was called.
___

3 - A e B |
Argument list and function body must be in single quotes. Otherwise PHP will assume "$x" means the variable $x and will substitute it into the string (despite possibly not existing) instead of leaving "$x" in the string.
___
4 - A |
Other functions does not recive parameters: func_num_args(void) and func_get_args(void)
___
5 - A: 5 and D: a warning
___
6 - A: Line 02: Replace $a with &$a
___
7 - 2
___
8 - B: Use is_callable($param)
___
9 - A: Syntax error |  
Message : syntax error, unexpected 'func' (T_STRING), expecting '('
___
10 - C: 226 |
E_NOTICE : type 8 -- Undefined variable: v2 --
