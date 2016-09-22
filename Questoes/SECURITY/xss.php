<?php
/**
 * INSTRUÇÕES: Execute o seguinte script no campo código de acesso: <script>alert(document.cookie)</script>
 * Este ataque não será executado no Chrome
 */

session_start();
// Valida as informações enviadas pelo formulário
$usuario = filter_input(INPUT_POST, 'cpf');
$senha = filter_input(INPUT_POST, 'senha');
$codigoAcesso = filter_input(INPUT_POST, 'cod_acesso');
if (!array_key_exists('usuario', $_SESSION)) {
  if ($usuario && $senha) {
    $usuarioPadrao = '24228124577';
    $senhaPadrao = md5('123');
    if ($usuarioPadrao == $usuario) {
      if (md5($senha) == $senhaPadrao) {
        $_SESSION['usuario'] = $usuario;
        echo "Olá: $usuario seu código de acesso é: $codigoAcesso";
      } else {
        echo 'OPS';
      }
    }
  }
?>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<form method="POST">
<body>
CPF:
<input type="text" value="" name="cpf"/>
Senha:
<input type="password" value="" name="senha"/>
Código de Acesso:
<input type="text" value="" name="cod_acesso"/>
<input type="submit" value="::: TESTE :::"/>
</form>
</body>
</html>
<?php } else { ?>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
Olá, seja bem vindo: <?php echo $_SESSION['usuario'] ?> seu código de acesso é: <?php echo $codigoAcesso ?>
</body>
</html>
<?php 
session_destroy();
} ?>