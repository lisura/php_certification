<?php
$xmlstr = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<videogame nome="SNES" ano_lancamento="1990" fabricante="Nintendo">
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
</videogame >
XML;
$videogame = simplexml_load_string($xmlstr);
if (!$videogame) {
    echo 'Erro ao analisar o XML';
    exit;
}
$dom_videogame = dom_import_simplexml($videogame);
if (!$dom_videogame) {
    echo 'Erro ao converter o XML';
    exit;
}
$dom = new DOMDocument('1.0','UTF-8');
$dom_videogame = $dom->importNode($dom_videogame, true); //importei o DOM gerado ao documento
$dom_videogame = $dom->appendChild($dom_videogame); //adiciono o DOM importado, sem esse comando ele não vai incluí-lo no XML gerado
//$dom_videogame = $dom->insertBefore($dom_videogame[,DOMNode]); //Esta função aceita um segundo parâmetro, indicando que este novo nó deve ser inserido antes do nó referenciado no segundo parâmetro
echo $dom->saveXML();
