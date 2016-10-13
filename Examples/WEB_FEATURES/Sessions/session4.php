<?php
session_start();

$_SESSION['data'] = [
    'name' => 'Fernando H Correa',
    'date' => '1981-05-05 09:32:00'
];

echo "<pre>";
$data_session = session_encode();
echo '$data_session : '. print_r($data_session, 1) . PHP_EOL;

echo  PHP_EOL;

session_unset();
echo '$_SESSION : '. print_r($_SESSION, 1) . PHP_EOL;

echo  PHP_EOL;

session_decode($data_session);
echo '$_SESSION : '. print_r($_SESSION, 1) . PHP_EOL;

session_destroy();
