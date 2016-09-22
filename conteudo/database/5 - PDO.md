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

Para alterar uma configuração de como o PDO interaje com o banco de dados, existe o método PDO::setAttribute().

````php
<?php
public bool PDO::setAttribute ( int $attribute , mixed $value )
````

Alguns atributos genéricos que podem ser definidos:

* *PDO::ATTR_CASE* - Força os nomes das colunas para uma forma específica:
  * *PDO::CASE_LOWER*: Força para letra minúscula.
  * *PDO::CASE_NATURAL*: Mantém da forma que é retornado pelo drive do banco.
  * *PDO::CASE_UPPER*: Força para letra maiúscula.

Exemplo:
````php
<?php
$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
````

* *PDO::ATTR_ERRMODE* - Relatando erros:
  * *PDO::ERRMODE_SILENT*: Retorna apenas código dos erros.
  * *PDO::ERRMODE_WARNING*: Retorna um E_WARNING.
  * *PDO::ERRMODE_EXCEPTION*: Gera excessão.

* *PDO::ATTR_ORACLE_NULLS* - Conversão de NULL e strings vazias:
  * *PDO::NULL_NATURAL*: Sem conversão
  * *PDO::NULL_EMPTY_STRING*: Strings vazias são convertidas para NULL.
  * *PDO::NULL_TO_STRING*: NULL é convertido para string vazia.

>**Nota:** este atributo está disponível para todos os drivers, não apenas para Oracle.

* *PDO::ATTR_STRINGIFY_FETCHES* - Converte valores numéricos para string. Booleano.

* *PDO::ATTR_STATEMENT_CLASS* - Define classe customizada para declarações que deriva de **PDOStatement** (classe padão de declaração).
Não pode ser utilizado com instâncias persistentes do PDO. É informada no formato: array(string classname, array(mixed constructor_args)).

* *PDO::ATTR_TIMEOUT* - Especifica o tempo de duração do timeout em segundos. Nem todos os drives suportam essa opção.

Drives diferentes podem possuir mais atributos específicos.

## Executando declarações SQL

Para executar uma declaração SQL com o PDO, utilizamos o método *PDO::query*. Esse método recebe como parâmetro uma string com a query a ser executada e retorna um objeto do tipo **PDOStatement** ou **FALSE** no caso de falha (por padrão).  
Exemplo:
````php
<?php
$result = $pdo->query('SELECT nome, lema FROM casa');
````

O PDO permite iterar o resultado de um SELECT.  
Exemplo:
````php
<?php
$sql = 'SELECT nome, lema FROM casa';
$result = $pdo->query($sql);

if($result){
  foreach ($result as $row) {
      echo $row['nome'] . "\t";
      echo $row['lema'] . PHP_EOL;
  }
}
````
[Exemplo usando PDO::query e PDO::setAttribute()]()

## Busca de dados

O PDOStatement possui outros métodos para lidar com os dados de uma consulta.

* **fetch** - Retorna a próxima linha do resultado. Se não encontrar, retorna false.  
Exemplo:

````php
<?php
$result = $pdo->query('SELECT nome, lema FROM casa');
while($row = $result->fetch()){
      echo $row['nome'] . "\t";
      echo $row['lema'] . PHP_EOL;
}
````
* **fetchColumn** - Retorna o valor de uma coluna da próxima linha do resultado. Se não encontrar, retorna false.  
Exemplo:

````php
<?php
$result = $pdo->query('SELECT * FROM casa')->fetchColumn(1);
echo $result;
````
fetchColumn aceita um parâmetro com o número da coluna a ser buscado, se não for informado, busca a coluna na posição 0.
>**Nota**: fetchColumn não deve ser usado com colunas que possuam dados FALSE, já que irá interpretar que não há mais dados.

* **fetchAll** - Retorna todos os dados restantes da busca em formato de array. Se não encontrar, retorna um array vazio, e false no caso de falha.  
Exemplo:

````php
<?php
$result = $pdo->query('SELECT * FROM casa')->fetchAll();
var_dump($result);
````
fetchAll não deve ser utilizado para retornar muitos dados, já que isto pode demandar muito da rede e/ou do sistema.

### Modos de Busca de Dados

Existem diversos modos de retorno dos dados buscados, o modo padrão é de um array tanto associativo quanto numérico. Para alterar o modo, podemos:

* Alterar no construtor:
````php
<?php
$db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root', '', array(
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_*));
````

* Alterar no método setAttribute:
````php
<?php
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_*);
````

* Alterar no método fetch ou fetchAll:
````php
<?php
$db->query->($sql)->fetch(PDO::FETCH_*);
````

Onde **PDO::FETCH_*** é uma constante do PDO que representa um dos modos.

Alguns dos modos possíveis:

* *PDO::FETCH_BOTH* - É o modo padrão, que retorna um array tanto associativo quanto numérico.

* *PDO::FETCH_NUM* - Retorna um array numérico.  
Exemplo:
````php
<?php
$r = $db->query->('SELECT * from casa LIMIT 1')->fetch(PDO::FETCH_NUM);
var_dump($r);
````

* *PDO::FETCH_ASSOC* - Retorna um array associativo.  
Exemplo:
````php
<?php
$r = $db->query->('SELECT * from casa LIMIT 1')->fetch(PDO::FETCH_ASSOC);
var_dump($r);
````

* *PDO::FETCH_OBJ* - Retorna um objeto da classe stdClass.  
Exemplo:
````php
<?php
$r = $db->query->('SELECT * from casa LIMIT 1')->fetch(PDO::FETCH_OBJ);
//$r = $db->query->('SELECT * from casa LIMIT 1')->fetchObject();
var_dump($r);
````

* *PDO::FETCH_COLUMN* - Retorna um array unidimensional de uma consulta com uma única coluna.  
Exemplo:
````php
<?php
$r = $db->query->('SELECT nome from casa')->fetchAll(PDO::FETCH_COLUMN);
var_dump($r);
````

* *PDO::FETCH_KEY_PAIR* - Similar ao FETCH_COLUMN, mas o array é indexado por um campo único.  
Exemplo:
````php
<?php
$r = $db->query->('SELECT nome, sede from casa')->fetchAll(PDO::FETCH_KEY_PAIR);
var_dump($r);
````
É necessário que tenha apenas duas colunas pra este modo.

* *PDO::FETCH_UNIQUE* - Similar ao FETCH_KEY_PAIR, mas o para mais colunas.  
Exemplo:
````php
<?php
$r = $db->query->('SELECT * from casa')->fetchAll(PDO::FETCH_UNIQUE);
var_dump($r);
````
É necessário a primeira coluna seja única pra este modo.

* *PDO::FETCH_CLASS* - Cria um objeto da classe informada, mapeando as colunas como atributos.
Exemplo:
````php
<?php
class Casa{};
$r = $db->query('SELECT * from casa')->fetchAll(PDO::FETCH_CLASS, 'Casa');
var_dump($r);
````
Não é recomendado utilizar o método fetch para este modo, já que com ele não é possível passar parâmetros para o construtor e por padrão, caso a classe indicada não exista, irá retornar um array vazio, ao invés de retornar um erro. Ao invés disso recomendase utilizar o método fetchObject.  
Exemplo:
````php
<?php
class Casa{};
$r = $db->query('SELECT * from casa LIMIT 1')->fetchObject('Casa');
var_dump($r);
````

As colunas retornadas são atribuidas para as propriedades de mesmo nome, idependente de sua visibilidade. Se a propriedade não existir, o método mágico *__set()* da classe (ou o default se também não existir) será chamado.

Exemplo de como passar parâmetros para o construtor:
````php
<?php
class Casa {
    public function __construct($nome) {
        $this->nome = $nome;
    }
}
$r = $pdo->query('SELECT nome FROM casa LIMIT 1')
            ->fetchAll(PDO::FETCH_CLASS, 'casa', ['Baratheon']);
var_dump($r);
````

Porém, por padrão o PDO primeiro atribui os atributos da classe, depois chama o construtor. Para modificar isto bas acrescentar a flag *PDO::FETCH_PROPS_LATE*.  
Exemplo:
````php
<?php
class Casa {
    public function __construct($nome) {
        $this->nome = $nome;
    }
}
$r = $pdo->query('SELECT nome FROM casa LIMIT 1')
            ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'casa', ['Baratheon']);
var_dump($r);
````

## Transações
