<?php
/*
 * SOAP Exercício 2
 */
class MyAPI {
    function hello() {
        return "Hello, SOAP World!<br>";
    }

    public function addNumbers($num1,$num2)
    {
      return $num1+$num2;
    }
}
//when in non-wsdl mode the uri option must be specified
$options=array('uri'=>'http://localhost/soap');
//create a new SOAP server
$server = new SoapServer(NULL,$options);
//attach the API class to the SOAP Server
$server->setClass('MyAPI');
//start the SOAP requests handler
$server->handle();