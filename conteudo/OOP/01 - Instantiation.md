## Instantiation

Para criar um novo objeto no PHP, utilize a instrução **new**.

Um objeto sempre será criado a não ser que a classe tenha um construtor definido que dispare uma exceção em caso de erro.

```php
<?php
echo '<pre>';
class Sharknado{
    function doAnotherMovie(){
        echo "Sharknado 4: The 4th Awakens".PHP_EOL;
    }
}
$shark = new Sharknado;
$shark->doAnotherMovie();
$var = (new Sharknado)->doAnotherMovie();
```

Se uma string contendo o nome da classe é utilizado com new, uma nova instância da classe será criada

```php
<?php
$className = 'Sharknado';
$instance = new $className();
var_dump($instance);
```

Ao atribuir uma instância de uma classe já criada, a uma variável nova, a variável nova irá acessar a mesma instância do objeto que foi atribuído. Este comportamento se mantém ao se passar instâncias a uma função. Uma cópia de um objeto criado pode ser feita clonando o mesmo.

> $obj2 = clone $obj;

Criar uma cópia de um objeto com propriedades totalmente replicadas nem sempre é o comportamento desejado. Um exemplo é se seu objeto guarda uma referência a outro objeto, e ao replicar o objeto pai, deseja-se que seja criada uma nova instância desse outro objeto para que a réplica tenha sua própria cópia separada.

Uma cópia de objeto é criada usando a palavra-chave clone (que, se possível, chama o método \_\_clone() do objeto). O método \_\_clone() de um objeto não pode ser chamado diretamente.

>Depois que a clonagem se completa, se um método \_\_clone() estiver definido, o objeto recém criado terá seu método \_\_clone() chamado, permitindo que qualquer propriedade seja alterada.

Se um objeto é convertido para um objeto, ele não é modificado. Se um valor de qualquer outro tipo é convertido para um objeto, uma nova instância da classe interna stdClass é criada. Se o valor for NULL, a nova instância será vazia. Um array é convertido para um objeto com as propriedades nomeadas pelas chaves e os valores correspondentes, com exceção de chaves numéricas que ficarão inacessíveis a menos que sejam iteradas. Para qualquer outro valor, uma propriedade chamada scalar conterá o valor.

```php
<?php
echo '<pre>';
$obj = (object) array('1' => 'sharks', '2' => 'tornados');
var_dump(isset($obj->{'1'}));
var_dump($obj);
foreach ($obj as $proper){
	var_dump($proper);
}
$obj = (object) 'ciao';
echo $obj->scalar;
```

O modo mais simples de se instaciar um objeto generico  e vazio, para que você possa modificar em tempo de execução, é fazendo

> <?php $genericSharknado = new stdClass(); ?>

### Formas curiosas para instanciar objetos.

```php
<?php
echo '<pre>';
class Sharknado {
    static public function getNewMovie()    {
        return new static;
    }
}
class Movies extends Sharknado{}
$obj1 = new Sharknado();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);
$obj3 = Sharknado::getNewMovie();
var_dump($obj3 instanceof Sharknado);
$obj4 = Movies::getNewMovie();
var_dump($obj4 instanceof Movies);
```

### Serialização de Objetos

A função _serialize()_ retorna uma string contendo uma representação byte-stream de qualquer valor que pode ser armazenado pelo PHP. A função _unserialize()_ pode utilizar essa string para recriar os valores originais da variável. Utilizar a serialização para salvar um objeto, salvará todas as variáveis de um objeto. Os métodos de um objeto não serão salvos, apenas o nome da classe.

```php
//sharknado.inc
<?php
class BestMovie {
    public $one = 'Sharknado' . PHP_EOL;
    public function show_best_movie_ever() {
        echo $this->one;
    }
}
//page1.php
<?php
include("sharknado.inc");
$bestMovie = new BestMovie;
$s_bestMovie = serialize($bestMovie);
// store $s somewhere where page2.php can find it.
file_put_contents('storeBestMovie', $s_bestMovie);
//page2.php
<?php
include("sharknado.inc");
$s_bestMovie = file_get_contents('storeBestMovie');
$bestMovie = unserialize($s_bestMovie);
// now use the function show_one() of the $a object.
$bestMovie->show_best_movie_ever();

```

>pode-se capturar os eventos de serialização e deserialização de um objeto usando os métodos \_\_sleep() e \_\_wakeup(). Usar o método \_\_sleep() também lhe permitirá serializar somente subconjuntos de propriedades de um objeto.
