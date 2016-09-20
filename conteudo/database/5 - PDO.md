# PDO

A extensão *PHP Data Objects* (**PDO**) é uma interface de acesso a banco de dados pelo PHP. Cada drive que implementa a interface **PDO** pode utilizar funções de extensão regulares para manipular recursos específicos de banco de dados.  
Com **PDO**, utiliza-se as mesmas funções de manipulação de dados independente do tipo do banco. Porém, não abstrai o banco de dados, nem emula SQL.

No *php.ini*, podemos configurar um *alias* do DNS do PDO, na opção *pdo.dsn.**.

## Gerenciando Conexões

### Conectando
Para criar uma conexão com um banco de dados utilizando o PDO, basta instanciarmos a Classe.  
Exemplo:
````php
<?php
$dbConnection = new PDO($dsn, $user, $pass);
````
O construtor da Classe PDO aceita como parâmetros a especificação da origem do banco de dados (conhecido como DNS), e de forma opcional, usuário e senha para conexão.  
Exemplo de conexão com uma base do MYSQL:
````php
<?php
$dbConnection = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root');
````

Se a conexão retornar algum erro, uma PDOException será lançada.
````php
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'zé');
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
````
> **Aviso:** Se nenhum tratamento de excessão for utilizado no código, o script será encerrado e um  back trace contendo toda informação da conexão será exibida, incluindo informações como senha e usuário de conexão.

### Desconectando
A conexão com o banco só e desfeita quanto a instâncias da Classe PDO deixa de existir. Isso ocorre quando o script é finalizado, ou quando definimos a variável do objeto como **NULL**.  
Exemplo:
````php
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root');
    //fechando a conexão
    $db = null;
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
````

>**Nota:** se existirem outras instâncias referênciando a instância PDO que abriu a conexão, elas também devem ser removidas para fechar a conexão.

````php
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root');
    $select = $db->query('SELECT * FROM casa');

    //fechando a conexão
    $db = null;
    $select = null;
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
````

### Conexão permanente
Muitas aplicações web se beneficiam de conexões persistentes com servidores de banco de dados. Conexões persistentes não são fechadas no final do script, mas são armazenados em cache e reutilizadas quando outro script solicita uma conexão usando as mesmas credenciais. O cache de conexão persistente  evita sobrecarga de estabelecer uma nova conexão cada vez que um script precisa falar com um banco de dados.  
Exemplo:
````php
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root', '', array(
    PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
````
>**Nota:** para definir a conexão como persistente, deve-se setar **PDO::ATTR_PERSISTENT** no array de opções do contrutor do PDO e nunca utilizando o método **PDO::setAttribute()**.

>**Aviso:** caso esteja utilizando um drive **PDO ODBC** e sua biblioteca suporta *ODBC Connection Pooling*, não é recomendado que se utilize conexão permanente do PDO, deixando que a biblioteca cuide do cache de conexão.

## Definindo Atributos
