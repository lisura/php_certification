<?php
/*
 * REST Exercício 1
 */
$databaseID = 1;

$data = "game=castlevania&system=nes";
$data = "game=river_raid&system=atari";
//$data = "game=super_mario_bros&system=master_system";

// set up the curl resource
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/GitHub/php_certification/Questoes/DATA_FORMAT/soap/rest_server.php?game=sonic_the_hedgehog&system=master_system");
//curl_setopt($ch, CURLOPT_URL, "http://localhost/GitHub/php_certification/Questoes/DATA_FORMAT/soap/rest_server.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data)                                                                       
));       

// execute the request
$output = curl_exec($ch);

// output the profile information - includes the header
echo($output) . PHP_EOL;

// close curl resource to free up system resources
curl_close($ch);