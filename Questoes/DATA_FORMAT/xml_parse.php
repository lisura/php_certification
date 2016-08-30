<?php
$parser=xml_parser_create();
//$parser=xml_parser_create("ISO-8859-1");

function start($parser,$element_name,$element_attrs)
{
  //Lembrando que o Parser está com o case_folded ativado
  switch($element_name)
  {
    case "VIDEOGAME":
    echo "<h1>-- VIDEOGAME --</h1>";
    break;
    case "TITULO":
    echo "<b>Nome: </b>";
    break;
    case "JOGOS":
    echo "<h2>-- JOGOS --</h2>";
    break;
    case "JOGO":
    echo "=> ";
    break;
    case "ITEM":
    echo "<b>Obs: </b>";
    break;
  }
  if(count($element_attrs) > 0){
    foreach($element_attrs as $k => $v){
      echo '<b>'.$k.': </b>'.$v.' | ';
    }
  }
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