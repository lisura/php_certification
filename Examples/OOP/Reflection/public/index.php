<?php
require_once dirname(__FILE__). '/../vendor/autoload.php';
header('Content-Type: text/html; charset=utf-8');

echo '<pre>';

$include_path = realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
set_include_path(get_include_path() . ':' . $include_path);


use PhpCertification\Pessoa;
use PhpCertification\Banco;

/**
 * Para Inteiro teste de ReflectionFuntion
 */
function toInteiro($param = null){
    return (int) $param;
}


// try{

// 	$pf = new Pessoa\Fisica();
// 	$pf->setCPF('150.399.127-06')
// 		->setAg('0393')
// 		->setCc('49142-8');


// 	$pj = new Pessoa\Juridica();
// 	$pj->setCNPJ('46.860.716/0001-60')
// 		->setAg('0393')
// 		->setCc('49142-9');


// 	$bancoItau = new Banco\BancoItau();
// 	$bancoItau->setCorrentista($pf);

// 	print_r([
// 		$bancoItau->obterSaldo(),
// 		$pf
// 	]);

// }catch(\Exception $e){
// 	print_r($e);
// }


/*************************************
 * Descobrindo Coisas com Reflection
 *************************************/




//=================================
// ReflectionClass
//=================================
$reflBancoClass = new \ReflectionClass('PhpCertification\Banco\BancoItau');


//
// ReflectionClass::export()
// Obter Estrutura total da Classe em String
//print_r($reflBancoClass->export('PhpCertification\Banco\BancoItau'));


//
// ReflectionClass::getDocComment()
// Obter Documentação total da Classe em String
//print_r($reflBancoClass->getDocComment());


//
// ReflectionClass::getInterfaceNames()
// Obter Nomes Interfaces da Classe em Array()
//print_r($reflBancoClass->getInterfaceNames ());


//
// ReflectionClass::getInterfaces()
// Obter Interfaces da Classe em ReflectionClass()
//print_r($reflBancoClass->getInterfaces());


//
// ReflectionClass::hasMethod()
// Checar Method da Classe em ReflectionProperty()
//print_r($reflBancoClass->hasMethod('setCorrentista'));



//
// ReflectionClass::getProperties()
// Obter Propriedades da Classe em ReflectionProperty()
$properties = $reflBancoClass->getProperties();
//print_r($properties);


//
// ReflectionClass::getMethods()
// Obter Methods da Classe em ReflectionMethod()
$methods = $reflBancoClass->getMethods();
//print_r($methods);


//
// ReflectionClass::getName()
// Obter nome da Classe em String
//print_r($reflBancoClass->getName());


//
// ReflectionClass::getShortName()
// Obter nome da Classe em String
//print_r($reflBancoClass->getShortName());


//
// ReflectionClass::getNamespaceName()
// Obter Namespace da Classe em String
//print_r($reflBancoClass->getNamespaceName());


//
// ReflectionClass::isFinal()
// Obter se Classe é Final em Boolean
//print_r($reflBancoClass->isFinal());


//
// ReflectionClass::isSubclassOf()
// Obter se Classe é SubliClasse de (?)
//print_r($reflBancoClass->isSubclassOf('PhpCertification\Banco\BancoBase'));

//
// ReflectionClass::newInstance()
// Obter Instância nova da Classe
$object = $reflBancoClass->newInstance();
//print_r($object);

//================================/




//=================================
// ReflectionObject
//=================================
$reflBancoObject = new \ReflectionObject($object);

//
// Com ReflectionObject é possível fazer tudo que um ReflectionClass faz,
// pois ele herda todos os Métodos. E trada um Objeto Instânciado.
//print_r($reflBancoObject);

//================================/




//=================================
// ReflectionProperty
//=================================
$properties = $reflBancoClass->getProperties();


foreach($properties as $reflProperty ) :

//
// ReflectionProperty::getName ()
// Obter Nome da Propriedade String
//print_r($reflProperty->getName()); echo PHP_EOL;


//
// ReflectionProperty::export()
// Obter Estrutura total da Propriedade em String
// print_r(
// 	$reflProperty::export($reflBancoClass->getName(), $reflProperty->getName())
// );


//
// ReflectionProperty::getDocComment ()
// Obter Documentação da Propriedade em String
//print_r($reflProperty->getDocComment());


//
// ReflectionProperty::isPublic ()
// Checa Visibilidade Public da Propriedade em Boolean
//print_r($reflProperty->isPublic());


//
// ReflectionProperty::isProtected ()
// Checa Visibilidade Protected da Propriedade em Boolean
//print_r($reflProperty->isProtected());


//
// ReflectionProperty::isPrivate ()
// Checa Visibilidade Private da Propriedade em Boolean
//print_r($reflProperty->isPrivate());


//
// ReflectionProperty::isStatic ()
// Checa acesso Static da Propriedade em Boolean
//print_r($reflProperty->isStatic());


//echo PHP_EOL;
endforeach;

//================================/







//=================================
// ReflectionMethod
//=================================
$methods = $reflBancoClass->getMethods();


foreach($methods as $reflMethod ) :

//
// ReflectionMethod::getName ()
// Obter Nome da Propriedade String
//print_r($reflMethod->getName()); echo PHP_EOL;


//
// ReflectionMethod::export()
// Obter Estrutura total do Method em String
// print_r(
// 	$reflMethod::export($reflBancoClass->getName(), $reflMethod->getName())
// );


//
// ReflectionMethod::getDocComment ()
// Obter Documentação do Método em String
//print_r($reflMethod->getDocComment());


//
// ReflectionMethod::isPublic ()
// Checa Visibilidade Public do Método em Boolean
//print_r($reflMethod->isPublic());


//
// ReflectionMethod::isProtected ()
// Checa Visibilidade Protected do Método em Boolean
//print_r($reflMethod->isProtected());


//
// ReflectionMethod::isPrivate ()
// Checa Visibilidade Private do Método em Boolean
//print_r($reflMethod->isPrivate());


//
// ReflectionMethod::isStatic ()
// Checa acesso Static do Método em Boolean
//print_r($reflMethod->isStatic());


//echo PHP_EOL;
endforeach;

//================================/





//=================================
// ReflectionParameter
//=================================
$parameters = $reflMethod->getParameters();


foreach($parameters as $reflParameter ) :


//
// ReflectionParameter::getName()
// Obter Nome do Parâmetro
//print_r($reflParameter->getName());


//
// ReflectionParameter::getPosition()
// Obter Posição do Parâmetro
//print_r($reflParameter->getPosition());


//
// ReflectionParameter::isOptional()
// Checar se é Optional
//print_r($reflParameter->isOptional());


// echo PHP_EOL;
endforeach;

//================================/




//=================================
// ReflectionFunction
//=================================

$reflFunction = new \ReflectionFunction('toInteiro');

//
// ReflectionFunction::getDocComment()
// Obter Documentação da Função
//print_r($reflFunction->getDocComment());


//
// ReflectionFunction::getNumberOfParameters()
// Obter Número de parametros da Função
//print_r($reflFunction->getNumberOfParameters());

//================================/

//*/
