<?php
$dom = new DOMDocument;
$dom->loadXML('<books><book><title>O Hobbit</title></book></books>');

$s = simplexml_import_dom($dom);
echo $s->book[0]->title."<br/>";


$simp = simplexml_load_string('<books><book><title>Crônicas de Nárnia</title></book><book><title>Eragon</title></book></books>');

$d= dom_import_simplexml($simp);
$items = $d->getElementsByTagName('book');

foreach ($items as $item) {
    echo $item->nodeValue . "<br/>";
}