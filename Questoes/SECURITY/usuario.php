<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<?php
session_start();
$usuario = (array_key_exists('cpf', $_REQUEST) ? $_REQUEST['cpf'] : null);
$senha = (array_key_exists('senha', $_REQUEST) ? $_REQUEST['senha'] : null);
$codigoAcesso = (array_key_exists('cod_acesso', $_REQUEST) ? $_REQUEST['cod_acesso'] : null);
$usuarioLogado = (array_key_exists('usuario', $_SESSION) ? $_SESSION['usuario'] : null);
if (is_null($usuarioLogado)) {
  echo "Não está logado...";
  if ($usuario && $senha) {
    $usuarioPadrao = '24228124577';
    $senhaPadrao = md5('123');
    if ($usuarioPadrao == $usuario) {
      if (md5($senha) == $senhaPadrao) {
        $_SESSION['usuario'] = $usuario;
        echo "Olá: {$usuario}";
      } else {
        echo 'OPS';
      }
    }
  }
} else {
  echo "Olá, seja bem vindo: $usuarioLogado seu código de acesso é: $codigoAcesso";
  session_destroy();
}
?>
</body>
</html>