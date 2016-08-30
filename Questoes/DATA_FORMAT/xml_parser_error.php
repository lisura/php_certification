<?php
//xml inválido
$xmlfile = 'xml_zureta.xml';

$xmlparser = xml_parser_create();

// abre um arquivo e lê os dados
$fp = fopen($xmlfile, 'r');
while ($xmldata = fread($fp, 4096))
  {
  // analisa a porção de dados
  if (!xml_parse($xmlparser,$xmldata,feof($fp)))
    {
    die( print "ERRO: "
    . xml_error_string(xml_get_error_code($xmlparser))
    . "<br />"
    . "Linha: "
    . xml_get_current_line_number($xmlparser)
    . "<br />"
    . "Coluna: "
    . xml_get_current_column_number($xmlparser)
    . "<br />");
    }
  }

xml_parser_free($xmlparser);