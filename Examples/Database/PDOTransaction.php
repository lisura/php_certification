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

  $db->exec("INSERT INTO casa (nome, lema, sede) VALUES ('Tyrell', 'Crescendo Fortes', 'Jardim de Cima')");
  $db->exec("INSERT INTO casa (nome, lema, sede) VALUES ('Greyjoy', 'Nós Não Semeamoss', 'Pyke')");

  $db->commit();

} catch (Exception $e) {
$db->rollBack();
echo "Falhou: " . $e->getMessage();
}
