<?php

try {
$db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root', '123mudar');
  echo "Conectado".PHP_EOL;
} catch (Exception $e) {
  die("Incapaz de conectar: " . $e->getMessage());
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try{
$status = 'Stark';
$st = $db->prepare('select * from casa where nome = ?');
$st->bindValue(1, $status, PDO::PARAM_STR);
$status = 'Bolton';
$st->execute();
print_r($st->fetchAll());
} catch (Exception $e) {
  die("Erro: " . $e->getMessage());
}
echo PHP_EOL;
