## Instantiation

Para criar um novo objeto no PHP, utilize a instrução **new**.

Um objeto sempre será criado a não ser que a classe tenha um construtor definido que dispare uma exceção em caso de erro.

```php
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
$className = 'Sharknado';
$instance = new $className();
var_dump($instance);
```

Ao atribuir uma instância de uma classe já criada, a uma variável nova, a variável nova irá acessar a mesma instância do objeto que foi atribuído. Este comportamento se mantém ao se passar instâncias a uma função. Uma cópia de um objeto criado pode ser feita clonando o mesmo.

> $obj2 = clone $obj;

Se um objeto é convertido para um objeto, ele não é modificado. Se um valor de qualquer outro tipo é convertido para um objeto, uma nova instância da classe interna stdClass é criada. Se o valor for NULL, a nova instância será vazia. Um array é convertido para um objeto com as propriedades nomeadas pelas chaves e os valores correspondentes, com exceção de chaves numéricas que ficarão inacessíveis a menos que sejam iteradas. Para qualquer outro valor, uma propriedade chamada scalar conterá o valor.

```php
// http://phpfiddle.org/
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
