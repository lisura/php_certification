<?php
session_start();

/*
session_set_cookie_params params:
lifetime
Tempo de vida do cookie de sessão, definido em segundos.

path
Caminho no domínio onde o cookie vai funcionar. Use uma única barra ('/') para que funcione em todos os caminhos do domínio.

domain
Domínio do cookie, por exemplo 'www.php.net'. Para tornar os cookies visíveis em todos os subdomínios, o domínio deve ser prefixado com um ponto, como '.php.net'.

secure
Se TRUE, o cookie só será enviado em conexões seguras.

httponly
Se TRUE, então o PHP tentará enviar a flag httponly ao definir o cookie de sessão.
*/
session_set_cookie_params ( 300 , '/' , null, null,  true );


echo "<pre>";
$array_session_cookie = session_get_cookie_params();
echo '$array_session_cookie : '. print_r($array_session_cookie, 1) . PHP_EOL;

session_destroy();
?>
