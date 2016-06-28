<?php
$xml_parser=xml_parser_create();
$xmldata = "<root>Content: &amp; &apos; End Content</root>";
xml_parser_set_option ($xml_parser, XML_OPTION_CASE_FOLDING, 0);
xml_parser_set_option ($xml_parser, XML_OPTION_SKIP_WHITE, 1);
xml_parser_set_option ($xml_parser, XML_OPTION_SKIP_TAGSTART , 1);
xml_parse_into_struct($xml_parser, $xmldata, $values, $index);
echo "<pre>";
var_dump($values);