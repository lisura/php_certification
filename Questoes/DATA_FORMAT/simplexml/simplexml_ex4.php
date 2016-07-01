<?php
$xmlstr = '<videogame nome="SNES" ano_lancamento="1990" fabricante="Nintendo">
  <titulo>Super Nintendo Entertainment System</titulo>
  <jogos>
    <jogo desenvolvedora="Nintendo" ano="1990" genero="plataforma">Super Mario World</jogo>
    <jogo desenvolvedora="Kemco" ano="1991" genero="corrida">Top Gear</jogo>
    <jogo desenvolvedora="Square" ano="1992" genero="rpg">Final Fantasy V</jogo>
    <jogo desenvolvedora="Capcom" ano="1993" genero="acao">Mega Man X</jogo>
  </jogos>
  <curiosidades>
    <item-line>Sucessor do Nintendo Entertainment System (NES).</item-line>
    <item-line>Teve forte concorrência com o Mega Drive nos EUA.</item-line>
    <item-line>Foi lançado no Brasil em 1993 pela Playtronic.</item-line>
    <item-line>O periférico de CD que seria lançado pela Sony se tornou no PlayStation.</item-line>
  </curiosidades>
</videogame >';

$dom = new DOMDocument();
//$dom->load("xml_file.xml");
$dom->loadXML($xmlstr);

//echo $dom->saveXML();

// $elemento = $dom->documentElement;
// foreach ($elemento->childNodes AS $item) {
  // print $item->nodeName . " => " . utf8_decode($item->nodeValue) . "<br>";
// }

$xpath = new DOMXpath($dom);
$elemento = $xpath->query('/videogame/jogos/jogo');

// echo "<pre>";
// var_dump($elemento);
// echo "</pre>";

foreach($elemento as $no){
	//if(( $no instanceof DOMElement )){
	if(( $no->nodeType == XML_ELEMENT_NODE )){
		print $no->attributes->getNamedItem("desenvolvedora")->nodeValue.': ';
	}
	print $no->nodeValue."<br/>";
}
