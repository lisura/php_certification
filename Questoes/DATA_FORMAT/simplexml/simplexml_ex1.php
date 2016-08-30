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
$videogame2 = simplexml_load_string($xmlstr);
$videogame3 = simplexml_load_file('xml_file.xml');

echo "<pre>";
var_dump( $videogame3);

echo "O jogo que mais zerei na minha infância foi o ".$videogame->jogos->jogo[0];
echo "<br/><br/>Curiosidade 1: ".$videogame->curiosidades->{'item-line'}[0];
//echo "<br/><br/>Curiosidade 1: ".$videogame->curiosidades->item-line[0]; //(esta linha dá erro por estar fora da convenção ao usar hífen)

foreach($videogame->jogos->jogo as $jogo){
  echo '<br/><br/><strong>'.$jogo.'</strong>'.
       '<br/>Desenvolvedora: '.$jogo['desenvolvedora'].
       ' Ano de lançamento: '.$jogo['ano'].
       ' Gênero: '.strtoupper($jogo['genero']);
}

//if($videogame->jogos->jogo[2]['desenvolvedora'] === 'Square') { //(se usar este if sem casting, vai dar false e não imprime a frase abaixo)
if((string)$videogame->jogos->jogo[2]['desenvolvedora'] === 'Square') {
  echo "<br/><br/>Além de <i>".$videogame->jogos->jogo[2]."</i>, a Square Soft lançou também clássicos como <i>Chrono Trigger</i><br/><br/>";
}

if($videogame == $videogame){
  echo "VERDADEIRO";
}else{
  echo "FALSO";
}

foreach($videogame->xpath('//jogo') as $jogo){
  echo '<br/><strong>'.$jogo.'</strong>'.
       '<br/>Desenvolvedora: '.$jogo['desenvolvedora'].
       ' Ano de lançamento: '.$jogo['ano'].
       ' Gênero: '.strtoupper($jogo['genero']).'<br/>';
}

foreach($videogame->curiosidades->children() as $item){
  echo '<br/><i>'.$item.'</i><br/>';
}