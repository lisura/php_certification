<?php
/*
 * REST Exercício 2
 */

$games_array = array(
    'master_system' => array('sonic_the_hedgehog'=>1991,'alex_kidd'=>1986,'jogos_de_verao'=>1988),
    'nes' => array('adventure_island'=>1986,'castlevania'=>1987,'super_mario_bros'=>1985),
    'atari' => array('river_raid'=>1981,'pitfall'=>1982,'enduro'=>1983),
  ); 
 
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Pegando um request em GET<br/>";
    echo $_GET['game']." foi o jogo selecionado<br/>";
    echo "Sistema indicado: ".$_GET['system']."<br/><br/>";
    if (isset($games_array[$_GET['system']][$_GET['game']])){
      echo "Jogo lançado em ".$games_array[$_GET['system']][$_GET['game']]."<br/>";
    }else{
      echo "Jogo não encontrado na base<br/>";
    }
}elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Pegando um request em POST<br/>";
    parse_str(file_get_contents("php://input"),$post_vars);
    echo $post_vars['game']." foi o jogo selecionado<br/>";
    echo "Sistema indicado: ".$post_vars['system']."<br/><br/>";
    if (isset($games_array[$post_vars['system']][$post_vars['game']])){
      echo "Jogo lançado em ".$games_array[$post_vars['system']][$post_vars['game']]."<br/>";
    }else{
      echo "Jogo não encontrado na base<br/>";
    }
}elseif($_SERVER['REQUEST_METHOD'] == 'PUT') {
    echo "Pegando um request em PUT<br/>";
    parse_str(file_get_contents("php://input"),$post_vars);
    echo $post_vars['game']." foi o jogo selecionado<br/>";
    echo "Sistema indicado: ".$post_vars['system']."<br/><br/>";
    if (isset($games_array[$post_vars['system']][$post_vars['game']])){
      echo "Jogo lançado em ".$games_array[$post_vars['system']][$post_vars['game']]."<br/>";
    }else{
      echo "Jogo não encontrado na base<br/>";
    }
}elseif($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    echo "Pegando um request em DELETE<br/>";
    parse_str(file_get_contents("php://input"),$post_vars);
    echo $post_vars['game']." foi o jogo selecionado<br/>";
    echo "Sistema indicado: ".$post_vars['system']."<br/><br/>";
    if (isset($games_array[$post_vars['system']][$post_vars['game']])){
      echo "Jogo lançado em ".$games_array[$post_vars['system']][$post_vars['game']]."<br/>";
    }else{
      echo "Jogo não encontrado na base<br/>";
    }
}