# Cross-Site Scripting

Cross-Site Scripting, ou XSS, ocorre quando um código de Javascript, ou de qualquer linguagem executável no lado do cliente, é injetado no sistema, fazendo com que o código retorne dados que podem ser usados em ataques ao sistema.

Esse tipo de ataque ocorre quando o sistema aceita o envio de dados sem validar de fato o conteúdo do mesmo.

[Exemplo para ataque](https://github.com/lisura/php_certification/blob/master/Questoes/SECURITY/xss.php)

O ataque acima não funciona no Google Chrome pois o mesmo possui uma proteção contra esse tipo de ataque.

Para evitar esse tipo de ataque, podemos usar a função htmlentities, que faz com que o navegador não interprete o valor como HTML. Assim alterando o exemplo dessa aula com as linhas abaixo faz com que o ataque de XSS não funcione mais:

```php
$usuario = htmlentities(filter_input(INPUT_POST, 'cpf'));
$senha = htmlentities(filter_input(INPUT_POST, 'senha'));
$codigoAcesso = htmlentities(filter_input(INPUT_POST, 'cod_acesso'));
```