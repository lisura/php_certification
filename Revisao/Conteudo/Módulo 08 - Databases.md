# Databases

## Introdução

Definição básica de base de dados é uma forma eficiente de armazenar e recuperar dados.

Um banco de dados relacional modela os dados de uma forma que eles sejam percebidos pelo usuário como tabelas, ou relações. A linguagem padrão dos Bancos de Dados Relacionais é a Structured Query Language (SQL).

## Structured Query Language (SQL)

*Structured Query Language* (Linguagem de Consulta Estruturada) ou **SQL**, é uma linguagem de pesquisa declarativa padrão para banco de dados relacional.  
Possui muitas variações e extensões produzidos pelos diferentes fabricantes de sistemas gerenciadores de bases de dados. Tipicamente a linguagem pode ser migrada de plataforma para plataforma sem mudanças estruturais principais.

### Tabelas

Nos modelos de bases de dados relacionais, a tabela é um conjunto de dados dispostos em *n* colunas e *m* linhas.  
As colunas são os campos da tabela, e caracterizam os tipos de dados que deverão constar na tabela (numéricos, alfa-numéricos, datas, etc). O número de linhas pode ser interpretado como o número de combinações de valores dos campos da tabela. A forma de identificar uma linha única é através de uma chave primária.

---

## Instruções Preparadas

Instruções Preparadas (*Prepared Statements*) são uma forma de executar um mesmo (ou similar) comando
SQL repetidamente de forma eficiente.  
Com uma instrução preparada, a query só é passada uma vez, mas pode ser executada repetidamente com os mesmos ou diferentes parâmentros. Os parâmentros não precisam ser colocados entre aspas, diminuindo a chance de sofrer *SQL injection*.

Exemplo:
````PHP
<?php
$sql = "INSERT INTO casa (nome, lema, sede) VALUES (?, ?, ?)";
````

---

## Transaction

*Transaction* permite executar um conjunto de operações SQL para garantir que o banco de dados nunca execute operações parciais. Num conjunto de operações, se um deles falhar, a reversão (*rollback*) ocorre para restaurar a base de dados. Se não houve erro, todo o conjunto de instruções é 'commitado'.

Exemplo:
````SQL
START TRANSACTION;

INSERT INTO casa (nome, lema, sede) VALUES ('Stark', 'O Inverno está chegando', 'Winterfell');
INSERT INTO casa (nome, lema, sede) VALUES ('Targaryen', 'Fogo e Sangue', 'Fortaleza Vermelha');

COMMIT;
````

---

## PDO

A extensão *PHP Data Objects* (**PDO**) é uma interface de acesso a banco de dados pelo PHP. Cada drive que implementa a interface **PDO** pode utilizar funções de extensão regulares para manipular recursos específicos de banco de dados.  
Com **PDO**, utiliza-se as mesmas funções de manipulação de dados independente do tipo do banco. Porém, não abstrai o banco de dados, nem emula SQL.

No *php.ini*, podemos configurar um *alias* do DNS do PDO, na opção *pdo.dsn.**.

### Gerenciando Conexões

#### Conectando
Para criar uma conexão com um banco de dados utilizando o PDO, basta instanciarmos a Classe.  

O construtor da Classe PDO aceita como parâmetros a especificação da origem do banco de dados (conhecido como DNS), e de forma opcional, usuário e senha para conexão.  

Exemplo de conexão com uma base do MYSQL:

```php
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root');
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
```

Se a conexão retornar algum erro, uma PDOException será lançada.

> **Aviso:** Se nenhum tratamento de excessão for utilizado no código, o script será encerrado e um back trace contendo toda informação da conexão será exibida, incluindo informações como senha e usuário de conexão.

#### Desconectando

A conexão com o banco só e desfeita quanto a instâncias da Classe PDO deixa de existir. Isso ocorre quando o script é finalizado, ou quando definimos a variável do objeto como **NULL**.  

Exemplo:

```php
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root');
    //fechando a conexão
    $db = null;
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
```

> **Nota:** se existirem outras instâncias referênciando a instância PDO que abriu a conexão, elas também devem ser removidas para fechar a conexão.

```php
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
```

#### Conexão permanente

Muitas aplicações web se beneficiam de conexões persistentes com servidores de banco de dados. Conexões persistentes não são fechadas no final do script, mas são armazenados em cache e reutilizadas quando outro script solicita uma conexão usando as mesmas credenciais. O cache de conexão persistente  evita sobrecarga de estabelecer uma nova conexão cada vez que um script precisa falar com um banco de dados.  

Exemplo:

```php
<?php
try {
    $dsn = 'mysql:host=localhost;dbname=game_of_thrones';
    $db = new PDO($dsn, 'root', '', array( PDO::ATTR_PERSISTENT => true) );
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
```

>**Nota:** para definir a conexão como persistente, deve-se setar **PDO::ATTR_PERSISTENT** no array de opções do contrutor do PDO e nunca utilizando o método **PDO::setAttribute()**.

### Definindo Atributos

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

### Executando declarações SQL

Para executar uma declaração SQL com o PDO, utilizamos o método *PDO::query*. Esse método recebe como parâmetro uma string com a query a ser executada e retorna um objeto do tipo **PDOStatement** ou **FALSE** no caso de falha (por padrão).  

Exemplo:
```php
<?php
$result = $pdo->query('SELECT nome, lema FROM casa');
```

O PDO permite iterar o resultado de um SELECT.  

Exemplo:
```php
<?php
$sql = 'SELECT nome, lema FROM casa';
$result = $pdo->query($sql);

if($result){
  foreach ($result as $row) {
      echo $row['nome'] . "\t";
      echo $row['lema'] . PHP_EOL;
  }
}
```

### Busca de dados

O PDOStatement possui outros métodos para lidar com os dados de uma consulta.

* **fetch** - Retorna a próxima linha do resultado. Se não encontrar, retorna false.  

Exemplo:
```php
<?php
$result = $pdo->query('SELECT nome, lema FROM casa');
while($row = $result->fetch()){
      echo $row['nome'] . "\t";
      echo $row['lema'] . PHP_EOL;
}
```


* **fetchColumn** - Retorna o valor de uma coluna da próxima linha do resultado. Se não encontrar, retorna false.  

Exemplo:
```php
<?php
$result = $pdo->query('SELECT * FROM casa')->fetchColumn(1);
echo $result;
```

O **fetchColumn** aceita um parâmetro com o número da coluna a ser buscado, se não for informado, busca a coluna na posição 0.

>**Nota**: fetchColumn não deve ser usado com colunas que possuam dados FALSE, já que irá interpretar que não há mais dados.

* **fetchAll** - Retorna todos os dados restantes da busca em formato de array. Se não encontrar, retorna um array vazio, e false no caso de falha.  

Exemplo:
```php
<?php
$result = $pdo->query('SELECT * FROM casa')->fetchAll();
var_dump($result);
```
O **fetchAll**  não deve ser utilizado para retornar muitos dados, já que isto pode demandar muito da rede e/ou do sistema.














#### Modos de Busca de Dados

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

* *PDO::FETCH_ASSOC* - Retorna um array associativo.  

* *PDO::FETCH_OBJ* - Retorna um objeto da classe stdClass.  

* *PDO::FETCH_COLUMN* - Retorna um array unidimensional de uma consulta com uma única coluna.  

* *PDO::FETCH_KEY_PAIR* - Similar ao FETCH_COLUMN, mas o array é indexado por um campo único. É necessário que tenha apenas duas colunas pra este modo.

* *PDO::FETCH_UNIQUE* - Similar ao FETCH_KEY_PAIR, mas o para mais colunas. É necessário a primeira coluna seja única pra este modo.

* *PDO::FETCH_CLASS* - Cria um objeto da classe informada, mapeando as colunas como atributos. Não é recomendado utilizar o método fetch para este modo, já que com ele não é possível passar parâmetros para o construtor e por padrão, caso a classe indicada não exista, irá retornar um array vazio, ao invés de retornar um erro. Ao invés disso recomendase utilizar o método fetchObject. As colunas retornadas são atribuidas para as propriedades de mesmo nome, idependente de sua visibilidade. Se a propriedade não existir, o método mágico *__set()* da classe (ou o default se também não existir) será chamado. Porém, por padrão o PDO primeiro atribui os atributos da classe, depois chama o construtor. Para modificar isto bas acrescentar a flag *PDO::FETCH_PROPS_LATE*.


### Transações

o PDO por padrão, é executado em um modo de 'auto-commit' quando a conexão com a base é iniciada. Isso signifca que todas as queries são executadas em uma transação própria e implícita, ou sem nenhum transação, no caso de bancos de dados que não suportam transações.  
Para inicar uma transação utilizando o PDO, usamos o método  *PDO::beginTransaction()*. Se o drive do banco utilizado não suporta esse recurso, uma PDOException será lançada (independete do nível de erro configurado, assim como ocorre ao tentar iniciar uma conexão com o banco usando o PDO e ocorre falha).  

>**Nota**: O PDO só verifica a possibilidade se utilizar transações no nível do drive. Se ocorrer algum problema no banco de dados que imposibilide o uso, o PDO::beginTransaction() ainda retorná **TRUE**, desde que o banco não rejeite o comando para iniciar uma transaction.  
Um exemplo disso seria ao iniciar um transaction em uma tabela MyISAM em um banco MySQL.

Para finalizar uma transação, existem os métodos *PDO::commit()* e *PDO::rollBack()*, que devem ser utilizados dependendo do resultado das queries executadas. Isso porque *PDO::commit()* efetua o 'commit' das mesmas, enquanto *PDO::rollBack()* desfaz as mesmas.


Exemplo:
```php
<?php
try {  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->beginTransaction();

  //query a ser executada

  $db->commit();

} catch (Exception $e) {
  $db->rollBack();
  echo "Falhou: " . $e->getMessage();
}
```

Por segurança, se a conexão for finalizada antes da transação, o PDO irá executar o roll back automaticamente. Se um commit não for explicitado, o PDO assume que algo deu errado e desfaz o processo para evitar inconsistências.  

>**Aviso**: Se a transação não for iniciada com o método, mas manualmente com uma query, näo há como o PDO saber disso e em caso de falha, não irá executar o roll back por padrão.

### Instruções Preparadas

*Prepared statements* são tão úteis que esta é a única funcionalidade que o PDO emula para drives que náo a possuem. Isso para garantir que a aplicação possa utilizar o mesmo código independente do banco de dados.

O método *PDO::prepare* é usado para preparar uma declaração SQL que será executada pelo método *PDOStatement::execute()*. A query pode possuir nenhum ou mais parâmetros que serão substituidos por valores reais ao serem executadas. Esses parâmetros podem ser nomeados (:name) ou indefinidos (?), mas não é possível usar ambas as formas.

Exemplo usando parâmetros nomeados:
```php
<?php
$sql = "SELECT * from casa where nome = :nome OR lema = :lema";
$ps = $db->prepare($sql);

$ps->execute(array(':nome'=>'Stark', ':lema'=> 'O Inverno está chegando');
$stark = $ps->fetchAll();  

$ps->execute(array(':nome'=>'Targaryen', ':lema'=>'Fogo e Sangue');
$targaryen = $ps->fetchAll();  
```

Exemplo usando parâmetros '?':
```php
<?php
$sql = "SELECT * from casa where nome = ? OR lema = ?";
$ps = $db->prepare($sql);

$ps->execute(array('Stark', 'O Inverno está chegando');
$stark = $ps->fetchAll();  

$ps->execute(array('Targaryen', 'Fogo e Sangue');
$targaryen = $ps->fetchAll();  
```

>**Nota**: Parâmetros representam um dado literal inteiro. Pedaços de um dado literal, chave, identificador, ou qualquer parte de um query não podem ser utilizados como parâmetro. Por exemplo, não é possível utilizar mais de um valor para um único parâmetro em uma cláusula **IN()** do SQL.

### Cursor(CURSOR_FWDONLY ou CURSOR_SCROLL)

O método *PDO::prepare* aceita um array como segundo parâmetro opcional com opções do drive (que podem variar de drive para drive).  
Uma opção comum aos drives é a **PDO::ATTR_CURSOR**, que determina o tipo do cursor usado na declaração. Um cursor de banco de dados é uma estrutura de controle que permite percorrer os registros, equivalente a um iterador na programação. O valor padrão de **PDO::ATTR_CURSOR** é **PDO::CURSOR_FWDONLY**, o que signifca que a cada chamada de *PDOStatement::fetch()*, por exemplo, será retornado a próxima linha do resultado. Se alterado para **PDO::CURSOR_SCROLL** (quando suportado pelo drive), podemos controlar a direção em que o cursor se move.  


### Parêamtros do prepare

*PDO::prepare()* retorna um objeto de *PDOStatement* ou falso (por padrão) no caso de ocorrer alguma falha na preparação da declaração. Em casos em que o PDO emula a funcionalidade de declarações preparadas, ele não verifica com o banco de dados a valdiade da declaração gerada.

Quando o método *PDOStatement::execute* é chamado, ele espera que os parâmetros da declaração preparada já tenham sido atribuídos, em uma dessas formas:

* Passando um array com os valores dos parâmetros.  

Exemplo:
```php
<?php
$ps = $db->prepare($sql);
$ps->execute(array('Stark', 'O Inverno está chegando');
$stark = $ps->fetchAll();  
```

* Chamando o método *PDOStatement::bindValue*. Esse método atribui um valor do PHP a um parâmetro nomeado ou indefinido.  

Exemplo:  
```php
<?php
$ps = $db->prepare("SELECT * from casa where nome = :nome OR lema = :lema");
$sth->bindValue(':nome', $nome);
$sth->bindValue(':lema', $lema);
$ps->execute();
```

Diferente do array passado no *PDOStatement::execute* (que define o tipo para string), podemos definir o tipo do parâmetro.  

Exemplo:
```php
<?php
$ps = $db->prepare("SELECT * from casa where id = ? AND nome = ?");
$sth->bindValue(1, $id, PDO::PARAM_INT);
$sth->bindValue(2, $nome, PDO::PARAM_STR);
$ps->execute();
```

* Chamando o método *PDOStatement::bindParam*. Esse método atribui uma varável do PHP a um parâmetro nomeado ou indefinido. Diferente de bindValue, os parâmetros são passados por referência, e só serão validados na chamada de *PDOStatement::execute*, onde as variáveis dos parâmentros receberão o valor do output. Isso permite que em alguns drives possamos invocar procedures para retornar os valores dos parâmentros e atualizar os dados.

Exemplo:  
```php
<?php
$ps = $db->prepare("SELECT * from casa where nome = :nome OR lema = :lema");
$sth->bindParam(':nome', $nome);
$sth->bindParam(':lema', $lema);
$ps->execute();
```

Diferente do array passado no *PDOStatement::execute* (que define o tipo para string), podemos definir o tipo e o tamanho do valor do parâmetro.  

Exemplo:
```php
<?php
$ps = $db->prepare("SELECT * from casa where id = ? AND nome = ?");
$sth->bindParam(1, $id, PDO::PARAM_INT);
$sth->bindParam(2, $nome, PDO::PARAM_STR, 30);
$ps->execute();
```

Exemplo de chamada de procedure com um parâmentro de *INOUT*:
```php
<?php
$status = 'vivo';
$st = $db->prepare('CALL cria_personagem(?)');
$sth->bindParam(1, $status, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 12);
$sth->execute();
print("Depois que o George R.R. Martin criou outro personagem ele está: $status");
```

Depois de executar uma declaração preparada, pode-se resetar o cursor, liberando para que faça uma nova execução, utilizando o métdo *PDOStatement::closeCursor()*.  

Exemplo:
```php
<?php
$sql = "SELECT * from casa where nome = ? OR lema = ?";
$ps = $db->prepare($sql);

$ps->execute(array('Stark', 'O Inverno está chegando');
$stark = $ps->fetchAll();  
$ps->closeCursor();
$ps->execute(array('Targaryen', 'Fogo e Sangue');
$targaryen = $ps->fetchAll();  
```

Esse método é particularmente útil para drives de bancos de dados que não permitem a execução de um objeto PDOStatement quando o mesmo ainda possui linas não-buscadas(*unfetched*). Adicionar esse método garante a compatibilidade do código com mais bancos.
