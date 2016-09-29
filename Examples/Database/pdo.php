<?php
try {
    //conectando
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root', '123mudar');
    echo "Conectado".PHP_EOL;
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}

try {
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->beginTransaction();

  $sql = "INSERT INTO casa (nome, lema, sede) VALUES (?, ?, ?)";

  $ps->execute(array('Tully', 'Família, Dever, Honra', 'Correrrio');
  $pdos = $ps->fetchAll();
  //print_r($pdos);
  $ps->closeCursor();

  $ps->execute(array('Arryn', 'Tão Alto Como a Honra', 'Ninho da Águia');
  $pdos = $ps->fetchAll();  
  //print_r($pdos);
  $ps->closeCursor();

  $db->commit();

} catch (Exception $e) {
$db->rollBack();
echo "Falhou: " . $e->getMessage();
}
