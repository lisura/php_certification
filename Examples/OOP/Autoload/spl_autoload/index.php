<?php
//phpinfo(); //obter include_path
echo '<pre>';
/****************************************************
 * Configurações iniciais de include_path
 * Usada en todos os Exemplos
 ****************************************************/
define('DS', DIRECTORY_SEPARATOR);
$include_path = realpath(dirname(__FILE__).DS);
define('CLASS_DIR', $include_path . DS . 'Classes' . DS );

set_include_path(get_include_path() . PATH_SEPARATOR  . CLASS_DIR);

// print_r([
//   'get_include_path' => get_include_path(),
//   'getcwd' => getcwd(),
// ]); 

/*=================================================*/

// Define Extensions
spl_autoload_extensions('.php,.class.php');

// Usa default spl_autoload
spl_autoload_register();

$pf = new Pessoa\Fisica();
$pj = new Pessoa\Juridica();
//$pg = new Pessoa\Gov(); // Erro provocado

// print_r([
//    $pf->getQueSouEu(),
//    $pj->getQueSouEu()
// ]);

/****************************************************
 * Configurações Libs de terceiros e include_path
 ****************************************************/

define('CLASS_DIR_LIB_TERCEIROS', $include_path . DS . 'LibTerceiros' );
define('CLASS_TERCEIRO', CLASS_DIR_LIB_TERCEIROS . DS . 'Terceiro/Classes');
set_include_path(get_include_path() . PATH_SEPARATOR  . CLASS_TERCEIRO );

function Terceiro($class_name){
  $file = CLASS_TERCEIRO . DS . $class_name .'.php';
  include_once $file;
}
spl_autoload_register('Terceiro');

// print_r([
//   'get_include_path' => get_include_path(),
//   'spl_autoload_functions' => spl_autoload_functions()
// ]); die;


$banco = new Banco();
$banco->setAg('0393')
      ->setCc('49172-8');

echo $banco;

/****************************************************/
