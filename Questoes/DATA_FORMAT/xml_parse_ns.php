<?php
function startElement($parser, $data, $attrs) {
  print "Tag Name: $data<br>";
  foreach ($attrs AS $name=>$value) {
    print " Att Name: $name<br>";
    print " Att Value: $value<br>";
  }
}
function endElement($parser, $data) { }

$xmldata = "<a:root xmlns:a='http://www.example.com/a'>
            <a:e1 a:att1='1' /></a:root>";
$xml_parser = xml_parser_create();
//$xml_parser = xml_parser_create_ns();
//$xml_parser = xml_parser_create_ns(null,"@");

xml_set_element_handler($xml_parser, "startElement", "endElement");
xml_parse($xml_parser, $xmldata, true);
?>