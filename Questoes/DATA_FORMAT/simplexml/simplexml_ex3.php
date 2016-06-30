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

$videogame = new SimpleXMLElement($xmlstr);

$videogame->jogos->jogo[0] = 'F-Zero';
$videogame->jogos->jogo[0]['genero'] = 'corrida futurista';

$jogo = $videogame->jogos->addChild('jogo','Donkey Kong Country');
$jogo->addAttribute('desenvolvedora', 'Rare');
$jogo->addAttribute('ano', 1994);
$jogo->addAttribute('genero', 'plataforma');

$specs = $videogame->addChild('specs');
$specs->addChild('CPU', 'Ricoh 5A22 a 3,58 MHz');
$specs->addChild('GPU', 'Ricoh 5C77-01(S-PPU1) e 5C78-03(S-PPU2 C)');
$specs->addChild('audio', 'Sony SPC700');

echo $videogame->asXML();