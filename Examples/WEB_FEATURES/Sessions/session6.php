<?php

//String aleatoria
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//Alternar ente 0 e 1
ini_set('session.use_strict_mode', 1);

$sid = md5(generateRandomString(32));
session_id($sid);

session_start();

echo '<pre>';
var_dump($sid);
echo PHP_EOL;
var_dump(session_id());
echo PHP_EOL;
var_dump(session_id() === $sid);
echo PHP_EOL;

session_destroy();

?>
