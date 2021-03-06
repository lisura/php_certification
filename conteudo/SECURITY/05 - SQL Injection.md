# SQL Injection

A injeção de SQL nada mais é do que uma forma de se aproveitar do envio de dados de formulário para que, ao serem salvos na base de dados, executem código SQL que pode dar controle da base ao invasor.

Observando o código abaixo:
```php
<?php
// Dados enviados pelo usuário
$parametro = $_GET['dados'];
$campos = array_keys($parametro);
$valores = array_values($parametro);
$sql = 'INSERT INTO tb_livro (' . implode(',', $campos) . ') VALUES (' . implode(',', $valores) . ')';
echo $sql;
```

O invasor poderia enviar dados da seguinte forma:
```php
http://localhost/teste.php?dados[titulo]=php&dados[ano]=2016'); DROP TABLE tb_livro; --
```

E assim temos a seguinte query com instruções de DROP TABLE:
```php
INSERT INTO tb_livro (titulo,ano) VALUES ('php','2016'); DROP TABLE tb_livro; --')
```

Assim é essencial que, ao lidar com envio de dados, seja utilizado um método que analise a instrução e os parâmetros antes de salvá-los na base. No caso do PDO, por exemplo, temos os métodos *prepare* e *bindValue* para evitar a injection.

```php
<?php
// Dados enviados pelo usuário
$parametro = $_GET['dados'];

try {
    $conn = new PDO('mysql:dbname=biblioteca;host=localhost;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$sth = conn->prepare("INSERT INTO tb_livro (titulo,ano) VALUES (:titulo, :ano);");
// Executa a passagem de parâmetro
$sth->bindValue(':titulo', $parametro['titulo']);
$sth->bindValue(':ano', $parametro['ano']);
$sth->execute();

print_r($sth->fetchAll());
```
[Exemplo - sistema Memeland](https://github.com/lisura/php_certification/tree/master/Questoes/SECURITY/memeland)
