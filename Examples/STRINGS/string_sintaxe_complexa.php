<?php
class Dance {
    var $justDo = 'Do the Harlem Shake';
}
$crazy = new Dance();
$simple_string = 'justDo';
$simple_Array = array('just', 'justDo', 'dance', 'harlem');
echo "{$crazy->$simple_string}\n";
echo "{$crazy->{$simple_Array[1]}}\n"; 
