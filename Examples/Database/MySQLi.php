<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game_of_thrones";

// Creando conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO casa (nome, lema, sede) VALUES (?, ?, ?)");
//O argumento "sss" lista os tipos de dados que os parâmetros são, no caso, strings
$stmt->bind_param("sss", $nome, $lema, $sede);

// set parameters and execute
$nome = "Stark";
$lema = "O Inverno está chegando";
$sede = "Winterfell";
$stmt->execute();

$nome = "Targaryen";
$lema = "Fogo e Sangue";
$sede = "Fortaleza Vermelha";
$stmt->execute();

$nome = "Martell";
$lema = "Insubmissos, Não Curvados, Não Quebrados";
$sede = "Lançassolar";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
