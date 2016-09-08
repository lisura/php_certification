<?php
//phpinfo(); //obter include_path
echo '<pre>';
/****************************************************
 * Configurações iniciais de include_path
 * Usada en todos os Exemplos
 ****************************************************/
define('DS', DIRECTORY_SEPARATOR);
$include_path = realpath(dirname(__FILE__).DS);
set_include_path(get_include_path() . ':' . $include_path);

// print_r([
//   'get_include_path' => get_include_path(),
//   'getcwd' => getcwd()
// ]);

/*=================================================*/


function __autoload($classname)
{
   //echo $classname; die(); // parada provocada
   $file_path = '.' .DS . 'Classes' . DS . str_replace('_', DS, $classname).'.php';
   //echo $file_path; die;
   include_once($file_path);
}

$pf = new Pessoa_Fisica();
$pj = new Pessoa_Juridica();
//$pg = new Pessoa_Gov(); // Erro provocado

print_r([
   $pf->getQueSouEu(),
   $pj->getQueSouEu()
]);
