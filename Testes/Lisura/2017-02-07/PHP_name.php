<?php

$arr = array (
    array(
        'name' => 'John',
        'surname' => 'Smith',
    ),
    array(
        'name' => 'James',
        'surname' => 'Smith',
    ),
    array(
        'name' => 'Jonanthan',
        'surname' => 'Smith',
    ),
);
function printUser($id){
    global $arr;
    foreach ($arr as $key => $user) {
        if($id == $key)
            echo $user['name'];
            echo $user['surname'];
    }
}
printUser(00);
echo PHP_EOL;
