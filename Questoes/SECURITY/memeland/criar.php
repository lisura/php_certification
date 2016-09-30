<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<?php
session_start();
$usuarioLogado = (array_key_exists('usuario', $_SESSION) ? $_SESSION['usuario'] : null);

$nome = (array_key_exists('nome', $_REQUEST) ? $_REQUEST['nome'] : null);
$descricao = (array_key_exists('descricao', $_REQUEST) ? $_REQUEST['descricao'] : null);
$url = (array_key_exists('url', $_REQUEST) ? $_REQUEST['url'] : null);

if (!is_null($usuarioLogado)) {
	try {
		$db = new PDO('mysql:host=localhost;dbname=memeland', 'root');
	} catch (PDOException $e) {
		print "Erro!: " . $e->getMessage() . "<br/>";
		die();
	}
	
	//COMENTE ABAIXO PARA PROTEGER A TABELA DE SQL INJECTION (Insira "none.jpg'); DROP TABLE tb_memes; --" no campo URL do formulário)
	$sql = "INSERT INTO tb_memes (nome, descricao, url)
			VALUES ('".$nome."', '".$descricao."', '".$url."')";
	$result = $db->query($sql);
	
	echo $sql."<br><br>";
	//FIM BRECHA SQL INJECTION
	
	echo "Registro criado! <a href='memes.php'>[VOLTAR]</a>";
	
	//DESCOMENTE ABAIXO PARA PROTEGER A TABELA DE SQL INJECTION
	/*$sth = $db->prepare("INSERT INTO tb_memes (nome, descricao, url) VALUES (:nome, :descricao, :url);");
	$sth->bindValue(':nome', $nome);
	$sth->bindValue(':descricao', $descricao);
	$sth->bindValue(':url', $url);
	$sth->execute();*/
	//FIM PROTEÇÃO SQL INJECTION
	
} else {
	echo "ACESSO NEGADO!";
	die;
}
?>
</body>
</html>
