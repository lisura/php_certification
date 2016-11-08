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
