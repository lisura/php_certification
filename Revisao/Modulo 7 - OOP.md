# OOP

 Classes definem as características abstrata de um objeto, incluindo suas propriedades e métodos.  
 As propriedades e métodos definidos por uma classe são chamados de "membros".  
 O PHP trata objetos da mesma maneira que referencias ou manipuladores, significando que cada variável contém uma referencia a um objeto ao invés de uma cópia de todo o objeto.  


## Definição de Classe
A definição de uma classe começa com a palavra chave class, seguida do nome da classe, seguido de um par de colchetes que englobam as definições de propriedades e métodos pertecentes à classe.

O nome de uma classe tem de ser válido, não pode ser uma palavra reservada do PHP. Um nome de classe válido começa com uma letra ou sublinhado, seguido de qualquer sequência de letras, números e sublinhados.

Uma classe pode conter suas próprias constantes, variáveis (chamadas de propriedades) e funções (chamadas de métodos).

A pseudo-variável $this está disponível quando um método é chamado a partir de um contexto de objeto. $this é uma referência ao objeto chamado (normalmente o objeto ao qual o método pertence, mas possivelmente outro objeto, se o método é chamado estaticamente a partir do contexto de um objeto secundário).

```php
<?php
class FirstMovie {
    function theMovie() {
        if (isset($this)) {
            echo '$this está definida em ( '.get_class($this).' )' . PHP_EOL;
        } else {
            echo "\$this não está definida." . PHP_EOL;
        }
    }
}
class TheSecondOne{
    function thisMovie(){
        FirstMovie::theMovie();
    }
}
$a = new FirstMovie();
$a->theMovie();
FirstMovie::theMovie(); // esta linha pode lançar um warning
$b = new TheSecondOne();
$b->thisMovie();
TheSecondOne::thisMovie(); // esta linha pode lançar um warning
```

## Instanciando  
 Para criar um novo objeto no PHP, utilize a instrução **new**.  
 Um objeto sempre será criado a não ser que a classe tenha um construtor definido que dispare uma exceção em caso de erro.  
 Se uma string contendo o nome da classe é utilizado com new, uma nova instância da classe será criada.
 ```php
 <?php
class Sharknado{
    function doAnotherMovie(){
        echo "Sharknado 4: The 4th Awakens".PHP_EOL;
    }

$className = 'Sharknado';
$instance = new $className();
 ```


 Para criar uma cópia de um objeto instanciado, pode-se utilizar o método **__clone()**. Se apenas atribuir a uma variável um objeto instanciado, a variável apontará para o mesmo objeto.
 ```php
 <?php
 $obj2 = clone $obj;
 ```

O modo mais simples de se instaciar um objeto generico e vazio, para que você possa modificar em tempo de execução, é instanciado a classe stdClass.
```php
<?php
$obj = new stdClass();
```

Se converter um valor de qualquer tipo (menos outro objeto, que neste caso não é modificado) para um objeto, é criadop uma instância da classe genérica stdClass. Se o valor for NULL, a instância será vazia. Se for array associativo, as chaves serão os atributos com seus respectivos valores (arrays com cheves numéricas precisam ser iterados para serem acessados quando convertidos). Qualquer outro tipo/valor, uma propriedade chamada scalar conterá o valor.


```php
<?php
$obj = (object) array('1' => 'sharks', '2' => 'tornados');
var_dump(isset($obj->{'1'}));
var_dump($obj);
foreach ($obj as $proper){
    var_dump($proper);
}
$obj = (object) 'ciao';
echo $obj->scalar;
```

### Serialização de Objetos
A função *serialize()* retorna uma string contendo uma representação byte-stream de qualquer valor que pode ser armazenado. A função *unserialize()* recriar os valores originais da variável. Utilizar a serialização salvará todas as variáveis de um objeto. Os métodos de um objeto não serão salvos, apenas o nome da classe.

O método mágico *\__sleep()* é executado antes da serialização, se disponível. Pode permitir que seja determinado quais proprieades serão serializadas. O método *\__wakeup()* é executado com a desserialização.

## Métodos e Propriedades
 É possível ter uma propriedade e um método com mesmo nome dentro de uma classe.  A referência a propriedades e métodos tem a mesma notação, a chamada a um membro depende somente do contexto.
 ```php
 <?php
 $obj = new Sharknado();
 echo $obj->movies, PHP_EOL;
 echo $obj->movies(), PHP_EOL;
 ```

### Visibilidade  
 
 tipo | descricao
 --- | ---
 public | podem ser acessados de qualquer lugar
 protected | só podem ser acessados na classe declarante e suas classes herdeiras
 private | só podem ser acessados na classe que define o membro privado

Classes filho não vêem os métodos privados da classe pai, e vice-versa. Ou seja, métodos privados são visíveis apenas para a classe em que foram definidas.

## Modifiers \ Inheritance Abstracts
Uma classe pode herdar métodos e propriedades de outra classe usando a palavra-chave extends na declaração da classe. Não é possível herdar múltiplas classes. PHP suporta herança Multi-level.

A subclasse herda todos os métodos públicos e protegidos da classe pai. A não ser que uma classe sobrescreva estes métodos, eles manterão sua funcionalidade original. Propriedades e métodos substituídos não pode ter visibilidade diferente. Métodos definidos na classe base (pai) como *final* não podem ser sobrescritos.  Se a própria classe estiver definida como final, ela não pode ser estendida.

A palavra-chave class também pode ser utilizada para resolução de nome de classes.
```php
<?php
namespace SN {
    class Sharnado{}
    echo Sharnado::class;
}
```

### Abstracts
Classes definidas como abstratas não podem ser instanciadas, e qualquer classe que contenha ao menos um método abstrato também deve ser abstrata. Métodos são definidos como abstratos declarando a intenção em sua assinatura - não podem definir a implementação.  
Ao herdar uma classe abstrata, todos os métodos marcados como abstratos na declaração da classe pai devem ser implementados na classe filha, métodos devem ser definidos com a mesma (ou menos restrita) visibilidade e  a assinatura dos métodos devem coincidir.

Classes abstratas são usadas para criar uma generalização e após isso, especializar comportamentos especificos em outras classes.

```php
<?php
abstract class Sharknado{
    // Força a classe que estende ClasseAbstrata a definir esse método
    abstract protected function movieName();
    abstract protected function movieKills( $prefixo );
    // Método comum
    public function imprimirMovieName() {
        print $this->movieName();
    }
}
```

## Interfaces
Permitem a criação de códigos que especificam quais métodos uma classe deve implementar, sem definir como esses métodos serão tratados. Todos os métodos declarados em uma interface devem ser públicos. Para implementar uma interface, o operador implements é utilizado. Todos os métodos na interface devem ser implementados na classe.
```php
<?php
interface movie {
    public function watch($name, $number);
    public function watchAgain($number);
}
class Sharknado implements movie{
    private $vars;
    public function watch($name, $number){
        if($name != 'Sharkando'){
            return 'Your movie Sux';
        }
        $this->vars = 'Lets watch '.$name . ' '.$number;
        return $this->vars;
    }
    public function watchAgain($number){
        return 'Sharknado '.$number;
    }
}
```

É possível ter constantes em interfaces, que não poderem ser sobrescritas por uma classe/interface herdeira.
```php
<?php
interface movie {
    const best = 'Sharknado franchise';
}
```

Uma interface é fornecida para que você possa descrever um conjunto de funções e, em seguida, ocultar a implementação final dessas funções em uma classe de implementação. Isso permite que você altere a implementação dessas funções sem alterar como você usá-lo.

### Interface vs Abstract
Use uma interface quando você quer forçar os desenvolvedores que trabalham em seu sistema para implementar um número definido de métodos sobre as classes que estará construindo.  
Use uma classe abstrata quando você quer forçar os desenvolvedores que trabalham em seu sistema para implementar um número conjunto de métodos **E** pretende fornecer alguns métodos básicos que irão ajudá-los a desenvolver suas classes filhas.

## Exceptions
Uma exceção pode ser lançada (throw) e capturada (catch). Código pode ser envolvido por um bloco try para facilitar a captura de exceções potenciais. Cada bloco try precisa ter ao menos um bloco catch ou finally correspondente.

O objeto lançado precisa ser uma instância da classe Exception ou uma subclasse de Exception.
```php
<?php
$movie = 'O Sol é Para Todos';
try{
    if($movie != 'Sharknado'){
        throw new Exception('Your movie Sux');
    }else{
        echo 'Thas a good movie';
    }
}catch(Exception $e){
    echo $e->getMessage();
}
```

Múltiplos blocos catch podem ser utilizados para capturar exceções diferentes. A execução normal (quando nenhuma exceção é lançada dentro de um try) ira continuar após o último catch definido em sequência. Exceções podem ser lançadas (ou relançadas) dentro um bloco catch.

O comportamento padrão do PHP ao se deparar com uma exceção que não é tratada, um erro fatal é exibido, e o script tem sua execução terminada. Por isso usamos o tratamento de exceções através do bloco try e catch.

### exception_handler
É possível definir um tratador de exceção padrão se uma exceção não for pega em um bloco try/catch, utilizando a função **set_exception_handler**. Essa função de tratamento precisa aceitar um parâmetro, que será o objeto da exceção que foi disparado.
```php
<?php
function exception_handler($exception) {
  echo "Uncaught exception: " , $exception->getMessage(), "\n";
}

set_exception_handler('exception_handler');

throw new Exception('Uncaught Exception');
echo "Not Executed\n";
```
A Execução não parará depois que exception_handler é chamada.

### Finally
Um bloco finally pode ser especificado após ou no lugar de blocos catch. Códigos dentro de finally sempre serão executados depois do try ou catch, independente se houve o lançamento de uma exceção, e antes que a execução normal continue.

```php
<?php
$movie = 'O Sol é Para Todos';
try{
    if($movie != 'Sharknado'){
        throw new Exception('Your movie Sux');
    }else{
        echo 'Thas a good movie';
    }
}catch(Exception $e){
    echo $e->getMessage();
}finally {
    echo PHP_EOL . 'I also recommend: SHARKTOPUS';
}
```

### Classes de exceção do usuário
Uma classe de exceção definida pelo usuário pode ser criada herdando a classe Exception.  
Membros e propriedades acessíveis a partir de classe filha que deriva da Exception:
```php
<?php
class Exception {
    protected $message = 'Unknown exception';   // Mensagem da exceção
    private   $string;                          // Cache __toString
    protected $code = 0;                        // Código definido pelo usuário
    protected $file;                            // Nome do arquivo onde a exceção originou
    protected $line;                            // Número da linha onde a exceção originou
    private   $trace;                           // Backtrace
    private   $previous;                        // Exceção anterior (se exceção empilhada)
    public function __construct($message = null, $code = 0, Exception $previous = null);
    final private function __clone();           // Inibe a clonagem de exceções
    final public  function getMessage();        // Mensagem da exceção
    final public  function getCode();           // Código definido pelo usuário
    final public  function getFile();           // Nome do arquivo onde a exceção originou
    final public  function getLine();           // Número da linha onde a exceção originou
    final public  function getTrace();          // Um array do backtrace()
    final public  function getPrevious();       // Exceção anterior
    final public  function getTraceAsString();  // Backtrace formatado como string
    public function __toString();               // String formatada da exceção
}
```

> Nota: Exceções não podem ser clonadas. Tentativas de clonar um Exception resultarão em erros E_ERROR fatais.

## Métodos e Proprieades Estáticas
Declarar propriedades ou métodos de uma classe como estáticos faz deles acessíveis sem a necessidade de instanciar a classe. Um membro declarado como estático não pode ser acessado com um objeto instanciado da classe (embora métodos estáticos podem).  

### Métodos estáticos
Como métodos estáticos podem ser chamados sem uma instancia do objeto criada, a pseudo-variável $this não está disponível dentro de um método declarado como estático.

### Propriedades estáticas
Propriedades estáticas não podem ser acessadas através do operador **->**.

Como qualquer outra variável estática do PHP, propriedades estáticas podem ser inicializadas, somente usando um valor literal ou constante. Expressões não são permitidas.

```php
<?php
class BestMovie{
    public static $bestmovie_estatico = 'nado';
    public function staticNado() {
        return self::$bestmovie_estatico;
    }
}

class Sharknado extends BestMovie{
    public function staticBestMovie() {
        return parent::$bestmovie_estatico;
    }
}
```

## Autoload

** Funções e Constantes para trabalhar com \_\_autoload() **

| Funções                |
|------------------------|
| get_include_path()     |
| include_once()         |
| require_once()         |
| realpath()             |
| dirname()              |
| getcwd()               |
| chdir()               |

| Constantes             |
|------------------------|
| \_\_FILE\_\_           |
| \_\_DIR\_\_            |
| \_\_NAMESPACE\_\_      |
| DIRECTORY_SEPARATOR    |
| PATH_SEPARATOR         |

Caso um função de \_\_autoload esteja definida, ela será executada sempre que uma class não for encontrada na memória do processamento do script.

> **PARAMS:**
> classname : Nome da Classe a ser carregada

```php
<?php
function __autoload($classname)
{
    $filename = "./". $classname .".php";
    include_once($filename);
}

$objeto = new ObjetoNaoDeclarado(); //o arquivo ObjetoNaoDeclarado.php tem que existir na pasta indicada no autoload
```

## spl_autoload

Esta funçao é para ser usada como implementação padrão para \_\_autoload(). Se nenhuma outra função for especificada e a autoload_register() for chamada sem argumentos, esta função será usada para qualquer chamada posterior ao \_\_autoload(). Por padrão, ela verifica todos os caminhos de inclusão por arquivos formados pelo nome da classe em minúsculo acrescido das extensões de arquivo .inc e .php.

```php
<?php

define('CLASS_DIR', 'Classes/')
set_include_path(get_include_path() . DIRECTORY_SEPARATOR. CLASS_DIR);
spl_autoload_extensions('.class.php');

// Usa autoload implementação padrão do spl_autoload
spl_autoload_register();

```

## Reflection

O PHP 5 vem com uma API completa de reflexão que acrescenta a capacidade de realizar engenharia reversa em classes, interfaces, funções, métodos e extensões. Além disso, a API de reflexão oferece maneiras de recuperar comentários de documentação para as funções, classes e métodos.

### Principais Classes usadas para Reflections

**Reflector — Interface**

* **ReflectionClass** — ReflectionClass Trata de Classes
* **ReflectionObject** — ReflectionObject Trata de Objetos
* **ReflectionProperty** — ReflectionProperty Trata de Propriedade de uma classe
* **ReflectionMethod** — ReflectionMethod Trata de Métodos
* **ReflectionParameter** — ReflectionParameter Trata de Parâmetros de Métodos
* ReflectionType — ReflectionType Trata de tipos de Retorno
* ReflectionZendExtension — ReflectionZendExtension Trata de Extensões Zend
* ReflectionExtension — ReflectionExtension Trata de Extensões
* ReflectionFunctionAbstract — ReflectionFunctionAbstract classes Abstratas
* **ReflectionFunction** — ReflectionFunction Trata de Funções
* ReflectionGenerator — ReflectionGenerator Trata de Geradores
* ReflectionException — ReflectionException Trata de Exceptions

|Métodos|Descrição|
|-------|---------|
|ReflectionClass::export()|Obter Estrutura total da Classe em String|
|ReflectionClass::getDocComment()|Obter Estrutura total da Classe em String|
|ReflectionClass::getInterfaceNames()|Obter Nomes Interfaces da Classe em Array()|
|ReflectionClass::getInterfaces()|Obter Interfaces da Classe em ReflectionClass()|
|ReflectionClass::hasMethod()|Checar Method da Classe em ReflectionProperty()|
|ReflectionClass::getProperties()|Obter Propriedades da Classe em ReflectionProperty()|
|ReflectionClass::getMethods()|Obter Methods da Classe em ReflectionMethod()|
|ReflectionClass::getName()|Obter nome da Classe em String|
|ReflectionClass::getShortName()|Obter nome da Classe em String|
|ReflectionClass::getNamespaceName()|Obter Namespace da Classe em String|
|ReflectionClass::isFinal()|Obter se Classe é Final em Boolean|
|ReflectionClass::isSubclassOf()|Obter se Classe é SubliClasse de (?)|

### ReflectionObject

O ReflectionObject possui todos os métodos de ReflectionClass. Recebe como entrada um objeto instanciado.

### ReflectionProperty

|Métodos|Descrição|
|-------|---------|
|ReflectionProperty::getName ()|Obter Nome da Propriedade String|
|ReflectionProperty::export()|Obter Estrutura total da Propriedade em String|
|ReflectionProperty::getDocComment ()|Obter Documentação da Propriedade em String|
|ReflectionProperty::isPublic ()|Checa Visibilidade Public da Propriedade em Boolean|
|ReflectionProperty::isProtected ()|Checa Visibilidade Protected da Propriedade em Boolean|
|ReflectionProperty::isPrivate ()|Checa Visibilidade Private da Propriedade em Boolean|
|ReflectionProperty::isStatic ()|Checa acesso Static da Propriedade em Boolean|

### ReflectionMethod

|Métodos|Descrição|
|-------|---------|
|ReflectionMethod::getName ()|Obter Nome da Propriedade String|
|ReflectionMethod::export()|Obter Estrutura total do Method em String|
|ReflectionMethod::getDocComment ()|Obter Documentação do Método em String|
|ReflectionMethod::isPublic ()|Checa Visibilidade Public do Método em Boolean|
|ReflectionMethod::isProtected ()|Checa Visibilidade Protected do Método em Boolean|
|ReflectionMethod::isPrivate ()|Checa Visibilidade Private do Método em Boolean|
|ReflectionMethod::isStatic ()|Checa acesso Static do Método em Boolean|

### ReflectionParameter

|Métodos|Descrição|
|-------|---------|
|ReflectionParameter::getName()|Obter Nome do Parâmetro|
|ReflectionParameter::getPosition()|Obter Posição do Parâmetro|
|ReflectionParameter::isOptional()|Checar se é Optional|

### ReflectionFunction

|Métodos|Descrição|
|-------|---------|
|ReflectionFunction::getDocComment()|Obter Documentação da Função|
|ReflectionFunction::getNumberOfParameters()|Obter Número de parametros da Função|

# Type Hinting

Declarações de tipo permitem que funções obriguem que parâmetros sejam de determinados tipos ao chamá-los. Se o valor informado no parâmetro tiver um tipo incorreto então um erro é gerado, no PHP 5 será um erro fatal recuperável.

Para declarar o tipo o seu nome deve ser adicionado antes no nome do parâmetro. A declaração pode ser feita para aceitar NULL se o valor default do parâmetro for configurado também para NULL.

## Tipos Válidos

| Tipo |	Descrição |	Versão PHP Mínima |
|------|------------|-------------------|
| Classe/interface |	O parametro precisa ser um instanceof da classe ou interface informada. |	PHP 5.0.0 |
| self | O parâmetro precisa ser um instanceof da mesma classe do métrodo onde a função está definida. Somente pode ser utilizado em métodos de classe e instância. |	PHP 5.0.0 |
| array |	O parametro precisa ser um array. |	PHP 5.1.0 |
| callable |	O parâmetro precisa ser um callable válido.	| PHP 5.4.0|

### Declaração de Tipos em Classes

```php
<?php
class Chatinho {}

function affmaria(Chatinho $c) {
    echo get_class($c).PHP_EOL;
}

affmaria(new Chatinho());
```

### Declaração de Tipos por Interface

```php
<?php
interface MinionI {
	public function pigmeu();
}

class Ivan implements MinionI {
	public function pigmeu() {
		//..
	}
}

function MinionTeste(MinionI $i) {
    echo get_class($i).PHP_EOL;
}

MinionTeste(new Ivan());
```

## Class Constantes

É possível definir valores constantes em cada classe permanecendo a mesma e imutável. Constantes diferem de variáveis normais, ao não usar o símbolo $ para declará-las ou usá-las. A visibilidade padrão de constantes de classe é public.

O valor deve ser uma expressão constante, não podendo ser (por exemplo) uma variável, uma propriedade, ou uma chamada a uma função.

Também é possível que interfaces tenham constantes.

A partir do PHP 5.3.0, é possível referenciar a classe usando uma variável. O valor da variável não pode ser uma palavra-chave (e.g. self, parent e static).

Constantes de classe são alocadas por classe, e não em cada instância da classe.

```php
<?php
echo '<pre>';

class MinhaClasse
{
    const CONSTANTE = 'valor constante';

    function mostrarConstante() {
        echo  self::CONSTANTE . "\n";
    }
}
```

**O suporte para inicialização de constantes com Heredoc e Nowdoc foi adicionado no PHP 5.3.0.**

## Late Static Bindings

A partir do PHP 5.3.0, o PHP implementa um recurso chamado late static bindings que pode ser usado para referenciar a classe chamada no contexto de herança estática. Realizada pelos prefixos **self::**, **parent::**, **static::**. Pode ser utilizado em (mas não limitado a) chamadas de métodos estáticos.

É importante notar que **self::** ou **__CLASS__** são resolvidas usando a classe na qual o método pertence, ou seja, self pode se referir a uma classe pai caso ao invés da classe atual caso o método em questão esteja na classe pai. Nesses casos é interessante usar **static::** para manter a referência no escopo da classe atual.

```php
<?php
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
	//static::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test(); //Printa na tela "A" caso test() use self::, mas printa B se for usado static::
```

> **Nota:** Em contextos não estáticos a classe chamada será a classe da instância do objeto. Assim como **$this->** chamará métodos privados do mesmo escopo, utilizar static:: pode ter resultados diferentes. Outra diferença é que **static::** só pode referenciar propriedades estáticas.
