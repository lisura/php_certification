<?php session_start(); session_destroy(); ?>
<html>
	<head>
		<meta charset="utf-8"/>
	</head>
	<body>
		<form method="post" action="memes.php">
		<table>
			<tr>
				<td>Login:</td><td><input type="text" value="" name="user" /></td>
			</tr>
			<tr>
				<td>Senha:</td><td><input type="password" value="" name="pass" /></td>
			</tr>
			<tr>
				<td rowspan="2"><input type="submit" value="Enviar" /></td>
			</tr>
		</table>
		</form>
	</body>
</html>
