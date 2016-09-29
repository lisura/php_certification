<?php
function readForwards($db) {
  $sql = 'SELECT nome, lema, sede FROM casa ORDER BY nome';
  try {
    $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      $data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . PHP_EOL;
      echo $data;
    }
    $stmt = null;
  }
  catch (PDOException $e) {
    echo $e->getMessage();
  }
}

function readBackwards($db) {
  $sql = 'SELECT nome, lema, sede FROM casa ORDER BY nome';
  try {
    $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    do {
      $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST))
      $data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . PHP_EOL;
      echo $data;
    } while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));
    $stmt = null;
  }
  catch (PDOException $e) {
    echo $e->getMessage();
  }
}

try {
    //conectando
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root', '123mudar');
    echo "Conectado".PHP_EOL;
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}

echo "Forwards:\n";
readForwards($db);

echo "Backwards:\n";
readBackwards($db);
