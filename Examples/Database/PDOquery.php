<?php

try {
    //conectando
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root', '123mudar');

    //alterando a exibição de erros
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //realiza a consulta
    $select = $db->query('SELECT * FROM casa');

    //itera os resultados
    foreach ($select as $row) {
        echo $row['nome'] . "\t";
        echo $row['lema'] . "\t";
        echo $row['sede'] . PHP_EOL;
    }

    //fechando a conexão
    $db = null;
    $select = null;

} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
