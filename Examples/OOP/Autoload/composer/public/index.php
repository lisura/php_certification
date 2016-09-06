<?php
require_once dirname(__FILE__). '/../vendor/autoload.php';

echo '<pre>';

$include_path = realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
set_include_path(get_include_path() . ':' . $include_path);

$pf = new PhpCertification\Pessoa\Fisica();
$pj = new PhpCertification\Pessoa\Juridica();

print_r([
   $pf->getQueSouEu(),
   $pj->getQueSouEu()
]);
