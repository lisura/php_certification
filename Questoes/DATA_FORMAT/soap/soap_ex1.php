 <?php
/*
 * SOAP Exercício 1
 */
$options = array('soap_version' => SOAP_1_1,
                  'exceptions' => 0,
                  'trace' => true);
                  
$client = new SoapClient('http://localhost/GitHub/php_certification/Questoes/DATA_FORMAT/soap/php-wsdl/demo.php?WSDL', $options);
echo "<pre>";
  var_dump($client->__getFunctions());
echo "</pre>";

$result = $client->SayHello("Adinan"); //Não esqueça de liberar a pasta cache no server ou aqui vai dar erro
echo $result;

$options = array('location' => 'http://localhost/GitHub/php_certification/Questoes/DATA_FORMAT/soap/server.php', //digitar o local onde se encontra o arquivo no seu servidor
                  'uri' => 'http://localhost/soap',
                  'exceptions' => 0);

$client = new SoapClient(NULL, $options);
echo "<pre>";
  var_dump($client->__getFunctions()); //Só funciona no WSDL mode
echo "</pre>";
$result = $client->hello();
if (is_soap_fault($result)) {
    //trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);
    echo "<pre>Fault message: ".$result->getMessage()."\n";
    echo "Fault code: ".$result->getCode()."\n";
    echo "Fault trace: ".var_dump($result->getTrace())."\n";
    echo "Fault line: ".$result->getLine()."\n";
    echo "Bad SOAP request\n";
    echo "REQUEST:\n".$client->__getLastRequest()."\n";
    echo "RESPONSE:\n".$client->__getLastResponse()."\n";
    echo "</pre>";
}else{
  echo $result;
}
$result = $client->addNumbers(4,5);
echo $result;
