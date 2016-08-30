<?php
$parser=xml_parser_create();
//$parser=xml_parser_create("ISO-8859-1");

function start($parser,$element_name,$element_attrs)
{
  //Lembrando que o Parser está com o case_folded ativado
  echo "<pre>";
  var_dump($element_name);
  var_dump($element_attrs);
}

function stop($parser,$element_name)
{
  echo "<br />";
}

function char($parser,$data)
{
  echo $data;
}

xml_set_element_handler($parser,"start","stop");
xml_set_character_data_handler($parser,"char");

//xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
//xml_parser_set_option($parser, XML_OPTION_SKIP_TAGSTART, 2);
//xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, 'ISO-8859-1');

$fp=fopen("xml_utf.xml","r");
//$fp=fopen("xml_iso.xml","r");

while ($data=fread($fp,4096))
  {
  xml_parse($parser,$data,feof($fp)) or 
  die (sprintf("XML Error: %s at line %d", 
  xml_error_string(xml_get_error_code($parser)),
  xml_get_current_line_number($parser)));
  }

xml_parser_free($parser);