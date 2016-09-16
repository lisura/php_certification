# Métodos Mágicos

Os nomes de função \_\_construct(), \_\_destruct(), \_\_call(), \_\_callStatic(), \_\_get(), \_\_set(), \_\_isset(), \_\_unset(), \_\_sleep(), \_\_wakeup(), \_\_toString(), \_\_invoke(), \_\_set_state(), \_\_clone() e \_\_debugInfo() são mágicos nas classes do PHP. Não deve-se ter funções com esses nomes em nenhuma de suas classes a não ser que queira a funcionalidade mágica associada a eles.

> **Cuidado:** O PHP reserva todas as funções com nomes iniciadas com \_\_ como mágicas. É recomendado que não se utilize funções com nomes com \_\_ no PHP, a não ser que deseje-se alguma funcionalidade mágica documentada.



## \_\_construct()

O PHP 5 permite aos desenvolvedores declararem métodos construtores para as classes. Classes que tem um método construtor, chamam o método a cada objeto recém criado, sendo apropriado para qualquer inicialização que o objeto necessite antes de ser utilizado.

> **Nota:**  Construtores pais não são chamados implicitamente se a classe filha define um construtor. Para executar o construtor da classe pai, uma chamada a parent::\_\_construct() dentro do construtor da classe filha é necessária. Se a classe filha não definir um construtor, será herdado da classe pai como um método normal (se não foi declarado como privado).

```php
<?php
echo "<pre>";

class Chatinho {
   function __construct() {
       print "Eu tenho Classe base de Chatinho" . PHP_EOL;
   }
}

class SubChatinho extends Chatinho {
   function __construct() {
       parent::__construct();
       print "E Filho de Chatinho, chatinho é" . PHP_EOL;
   }
}

class SubChato extends Chatinho {

}

$obj = new Chatinho();

$obj = new SubChatinho();

$obj = new SubChato();

```
> **Nota:** Para retrocompatibilidade com as versões do PHP 3 e 4, se o PHP não encontrar um \_\_construct() para uma determinada classe, e a classe não herda um da classe, ele procurará pela função construtora à moda-antiga, que tenha o mesmo nome da classe.

```php
<?php

namespace Foo;

class Bar {
    public function Bar() {
        // tratado como construtor no PHP 5.3.0-5.3.2
        // tratado como método comum a partir do PHP 5.3.3
    }
}
?>

```

## \_\_toString()

O método \_\_toString() permite que uma classe decida como se comportar quando convertida para uma string. Por exemplo, o que echo $obj; irá imprimir. Este método precisa retornar uma string, senão um erro nível E_RECOVERABLE_ERROR é gerado.

```php
<?php
echo "<pre>";

class Chatinho {

	private $nome;

	private $level_chatinho;

    public function __construct($nome , $level_chatinho)
	{
    	$this->nome = $nome;
		$this->level_chatinho = $level_chatinho * array_rand(range(1,10,1), 1);
    }

	public function __toString()
	{
		return "Nome: {$this->nome} é chatinho level:{$this->level_chatinho}".PHP_EOL;
	}

}

echo $obj = new Chatinho("Fernando", 10);
echo $obj = new Chatinho("Leandro", 8);
echo $obj = new Chatinho("Ivan", 9);
echo $obj = new Chatinho("Adinan", 4);

```

## \_\_clone()

Depois que a clonagem se completa, se um método \_\_clone() estiver definido, o objeto recém criado terá seu método \_\_clone() chamado, permitindo que qualquer propriedade seja alterada.


```php
<?php
echo "<pre>";

class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print("Original Object:\n");
print_r($obj);

print("Cloned Object:\n");
print_r($obj2);
```

## \_\_get(), \_\_set() , \_\_isset() & \_\_unset()
### Sobrecarga de propriedades

**\_\_set()** é executado ao escrever dados em propriedades inacessíveis.

**\_\_get()** é utilizado para ler dados de propriedades inacessíveis.

**\_\_isset()** é disparado ao chamar a função isset() ou empty() em propriedades inacessíveis.

**\_\_unset()** é invocado ao usar o construtor unset() em propriedades inacessíveis.

O argumento $name é o nome da propriedade com o qual se está interagindo. O argumento $value do método \_\_set() especifica o valor para o qual a propriedade $name deveria ser definida.

A sobrecarga de propriedades funciona somente no contexto de objeto. Estes métodos mágicos não são disparados em contexto estático. Portanto estes métodos não podem ser declarados como static. A partir do PHP 5.3.0, um aviso é emitido se algum método mágico de sobrecarga é declarado como static.

> **Nota:** O valor de retorno de \_\_set() é ignorado por causa da forma que o PHP processa o operador de atribuição. Similarmente, o método \_\_get() nunca é chamado em atribuições encadeadas como essa: ** $a = $obj->b = 8;**

```php
<?php
echo "<pre>";

class PropertyTest
{
    /**  Local para overloaded data.  */
    private $data = array();

    /**  Overloading Não é usada para propriedades declaradas.  */
    public $declared = 1;

  	/**  Overloading usa este somente quando acessado fora da classe  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Definido '$name' para '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Obtendo '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Propriedade indefinida via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function __isset($name)
    {
        echo "'$name' isset?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Removendo '$name'\n";
        unset($this->data[$name]);
    }

    public function getHidden()
    {
        return $this->hidden;
    }
}


echo "<pre>\n";

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "\n";

echo $obj->declared . "\n\n";

echo $obj->getHidden() . "\n";

echo $obj->hidden . "\n";

```


## \_\_call() & \_\_callStatic()
### Sobrecarga de Método

\_\_call() é disparado ao invocar métodos inacessíveis em um contexto de objeto.

\_\_callStatic() é disparado quando invocando métodos inacessíveis em um contexto estático.

O argumento $name é o nome do método sendo chamado. O argumento $arguments é um array enumerado contendo os parâmetros passados para o método $name.


```php
<?php
echo '<pre>';

class MethodTest
{
    public function __call($name, $arguments)
    {
		echo "Chamada ao objeto para o método: '$name' "
             . implode(', ', $arguments). "\n";
    }

    public static function __callStatic($name, $arguments)
    {

        echo "Chamada ao objeto para o método estático: '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('Param1');

MethodTest::runTest('Param2');  
```

# \_\_debugInfo()

Este método é chamado pela função var_dump() ao despejar um objeto para obter as propriedades que devem ser exibidas. Se este método não for definido em um objeto, todos as propriedades públicas, protegidas e privadas serão exibidas.

> **NOTA:** Este recurso foi adicionado no 5.6.0.

```php
<?php
echo '<pre>';
class C {
    private $prop;

    public function __construct($val) {
        $this->prop = $val;
    }

    public function __debugInfo() {
        return [
            'propSquared' => $this->prop ** 2,
        ];
    }
}

var_dump(new C(42));
```

## \_\_invoke()

O método \_\_invoke() é chamado quando um script tenta chamar um objeto como uma função.

```php
<?php
echo '<pre>';

class CallableClass
{
    public function __invoke($x)
    {
        var_dump($x);
    }
}
$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));


```

## \_\_set_state(),

Esse método estático é chamado em classes exportadas por var_export() desde PHP 5.1.0.

O único parâmetro deste método é um array contendo propriedades exportadas no formato array('property' => value, ...).

```php
<?php
echo '<pre>';
class A
{
    public $var1;
    public $var2;

    public static function __set_state($an_array) // As of PHP 5.1.0
    {
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
$a->var1 = 5;
$a->var2 = 'foo';

eval('$b = ' . var_export($a, true) . ';');
var_dump($b);

```
> Nota: Quando exportando um objeto, var_export() não verifica se \_\_set_state() está implementado na classe do objeto, de forma que re-importar esses objetos falham na ausência de \_\_set_state(). Isto afeta particularmente algumas classes internas. É responsabilidade do programador verificar se todos os objetos podem ser re-importados, ou seja, que todas as classes implementem \_\_set_state().



## \_\_sleep() & \_\_wakeup()

serialize() checa se sua classe tem uma função com o nome mágico \_\_sleep(). Se houver, a função é executa antes de qualquer serialização. Ela pode limpar o objeto e deve retornar um array com os nomes de todas as variáveis do objeto que devem ser serializadas. Se o método não retornar nada, então NULL é serializado e um E_NOTICE disparado.

> **Nota:** Não é possível que \_\_sleep() retorne nomes de propriedades privadas da classe pai. Fazer isso causará um erro de nível E_NOTICE. Ao invés disso, pode-se utilizar a interface Serializable.
O intuito do método \_\_sleep() é enviar dados pendentes ou realizar tarefas de limpeza. Além disso, a função é útil se tiver objetos muito grandes que não precisem ser completamente salvos.

Ao mesmo tempo, unserialize() checa pela presença da função com o nome mágico \_\_wakeup(). Se presente, essa função pode reconstruir qualquer recurso que o objeto possa ter.

O intuito do método \_\_wakeup() é reestabelecer qualquer conexão com banco de dados que podem ter sido perdidas durante a serialização, e realizar outras tarefas de reinicialização.

```php
<?php

class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }

    public function __wakeup()
    {
        $this->connect();
    }
}

```

## \_\_destruct()

O PHP 5 introduz um conceito de destrutor similar ao de outras linguagens orientadas a objeto, como C++. O método destrutor será chamado assim que todas as referências a um objeto particular forem removidas ou quando o objeto for explicitamente destruído ou qualquer ordem na sequência de encerramento



```php
<?php

echo '<pre>';
class MinhaClasseDestruivel {
   function __construct() {
       print "No construtor\n";
       $this->name = "MinhaClasseDestruivel";
   }

   function __destruct() {
       print "Destruindo " . $this->name . "\n";
   }
}

$obj = new MinhaClasseDestruivel();
```


Como os construtores, destrutores da classe pai não serão chamados implicitamente pelo motor. Para executar o destrutor pai, deve-se fazer uma chamada explicita a parent::\_\_destruct() no corpo do destrutor. Assim como construtores, uma classe filha pode herdar o destrutor pai caso não implemente um.

O destrutor será chamado mesmo se o script for terminado utilizando-se exit(). Chamar exit() em um destrutor irá impedir que as demais rotinas de encerramento executem.

> **Nota:** Destrutores chamados durante o encerramento da execução do script tem os cabeçalhos HTTP enviados. O diretório atual na fase de encerramento do script pode ser diferente em alguns SAPIs (e.g. Apache).
> **Nota:** Tentar disparar uma exceção em um destrutor (chamado no término do script), causará um erro fatal.
