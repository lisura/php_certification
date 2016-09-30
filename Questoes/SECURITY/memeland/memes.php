<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<?php
session_start();
$usuario = (array_key_exists('user', $_REQUEST) ? $_REQUEST['user'] : null);
$senha = (array_key_exists('pass', $_REQUEST) ? $_REQUEST['pass'] : null);
$usuarioLogado = (array_key_exists('usuario', $_SESSION) ? $_SESSION['usuario'] : null);

$logado = false;
if (is_null($usuarioLogado)) {
  if ($usuario && $senha) {
    $usuarioPadrao = 'coolface';
    $senhaPadrao = md5('123456');
    if ($usuarioPadrao == $usuario) {
      if (md5($senha) == $senhaPadrao) {
        $_SESSION['usuario'] = $usuario;
        echo "Olá, {$usuario}, seja bem vindo!";
		$logado = true;
      } else {
        echo 'Senha incorreta';
      }
    }else{
		echo "Usuário incorreto";
	}
  }else{
	  echo "ACESSO NEGADO!";
  }
} else {
  echo "Olá novamente, $usuarioLogado";
  $logado = true;
}
if ($logado == true) {
	try {
		$db = new PDO('mysql:host=localhost;dbname=memeland', 'root');

		$sql = 'SELECT nome, descricao, url FROM tb_memes';
		$result = $db->query($sql);

		echo "<table border='1'>";
		if($result){
		  foreach ($result as $row) {
			  echo '<tr><td>'.$row['nome']."</td>";
			  echo '<td>'.$row['descricao']."</td>";
			  echo '<td><img src="'.$row['url'].'" width="64" height="64"/></td></tr>';
		  }
		}
		echo "</tr></table>";
	} catch (PDOException $e) {
		print "Erro!: " . $e->getMessage() . "<br/>";
		die();
	}
	
//Insira "none.jpg'); DROP TABLE tb_memes; --" no campo URL do formulário para causar SQL Injection
?>
	<form method="post" action="criar.php">
	<table>
		<tr>
			<td>Nome:</td><td><input type="text" value="" name="nome" /></td>
		</tr>
		<tr>
			<td>Descrição:</td><td><input type="text" value="" name="descricao" /></td>
		</tr>
		<tr>
			<td>URL:</td><td><input type="text" value="" name="url" /></td>
		</tr>
		<tr>
			<td rowspan="2"><input type="submit" value="Enviar" /></td>
		</tr>
	</table>
	</form>
<?php 
	echo "<a href='index.php'>[SAIR]</a>";
}
?>
</body>
</html>
