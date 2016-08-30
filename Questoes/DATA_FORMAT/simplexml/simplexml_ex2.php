<?php
libxml_use_internal_errors(true);
$sxe = simplexml_load_string("<?xml version='1.0'><broken><xml></broken>"
);
if ($sxe === false) {
    echo "Erro ao carregar o XML\n";
    foreach(libxml_get_errors() as $error) {
        echo "\t", $error->message.'<br/>Linha '.$error->line.'<br/>Coluna '.$error->column.'<br/><br/>';
    }
}
