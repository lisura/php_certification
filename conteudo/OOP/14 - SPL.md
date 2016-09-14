# SPL - Standard PHP Library

SPL é uma coleção de interfaces e classes que servem para resolver problemas padrões.


* Constantes pré-definidas

* Estruturas de Dados
  * SplDoublyLinkedList — The SplDoublyLinkedList class
  * **SplStack** — A classe SplStack fornece as principais funcionalidades de uma pilha
  * **SplQueue** — The SplQueue class
  * SplHeap — The SplHeap class
  * SplMaxHeap — The SplMaxHeap class
  * SplMinHeap — The SplMinHeap class
  * **SplPriorityQueue** — The SplPriorityQueue class
  * SplFixedArray — The SplFixedArray class
  * SplObjectStorage — The SplObjectStorage class

* Iteradores
 * AppendIterator — The AppendIterator class
 * ArrayIterator — A classe ArrayIterator
 * CachingIterator — A classe CachingIterator
 * CallbackFilterIterator — The CallbackFilterIterator class
 * **DirectoryIterator** — A classe DirectoryIterator
 * EmptyIterator — The EmptyIterator class
 * FilesystemIterator — The FilesystemIterator class
 * FilterIterator — A classe FilterIterator
 * GlobIterator — The GlobIterator class
 * InfiniteIterator — The InfiniteIterator class
 * IteratorIterator — The IteratorIterator class
 * LimitIterator — A classe LimitIterator
 * MultipleIterator — The MultipleIterator class
 * NoRewindIterator — The NoRewindIterator class
 * ParentIterator — A classe ParentIterator
 * **RecursiveArrayIterator** — The RecursiveArrayIterator class
 * RecursiveCachingIterator — A classe  RecursiveCachingIterator
 * RecursiveCallbackFilterIterator — The RecursiveCallbackFilterIterator class
 * RecursiveDirectoryIterator — A classe RecursiveDirectoryIterator
 * RecursiveFilterIterator — The RecursiveFilterIterator class
 * RecursiveIteratorIterator — A classe RecursiveIteratorIterator
 * RecursiveRegexIterator — The RecursiveRegexIterator class
 * RecursiveTreeIterator — The RecursiveTreeIterator class
 * RegexIterator — The RegexIterator class


* Interfaces
  * Countable — Interface Countable
  * OuterIterator — The OuterIterator interface
  * RecursiveIterator — The RecursiveIterator interface
  * SeekableIterator — The SeekableIterator interface

* **Exceções**
  * BadFunctionCallException — The BadFunctionCallException   class
  * BadMethodCallException — The BadMethodCallException class
  * DomainException — The DomainException class
  * InvalidArgumentException — The InvalidArgumentException   class
  * LengthException — The LengthException class
  * LogicException — The LogicException class
  * OutOfBoundsException — The OutOfBoundsException class
  * OutOfRangeException — The OutOfRangeException class
  * OverflowException — The OverflowException class
  * RangeException — The RangeException class
  * RuntimeException — The RuntimeException class
  * UnderflowException — The UnderflowException class
  * UnexpectedValueException — The UnexpectedValueException class


* Funções da SPL
  * class_implements — Retorna as interfaces que são implementadas pela classe
  * class_parents — Retorna as classes pai de determinada   classe
  * class_uses — Return the traits used by the given class
  * iterator_apply — Call a function for every element in an iterator
  * iterator_count — Conta o número de elementos do iterador
  * iterator_to_array — Copia o iterador em um array
  * spl_autoload_call — Tenta todas as funções \_\_autoload() registradas para carregar a classe solicitada
  * spl_autoload_extensions — Registra e retorna as extensões de arquivo padrões para o spl_autoload
  * spl_autoload_functions — Retorna todas as funções \_\_autoload() registradas
  * **spl_autoload_register** — Registra a função dada como implementação de \_\_autoload()
  * **spl_autoload_unregister** — Retira a função dada como implementação de \_\_autoload()
  * **spl_autoload** — Implementação padrão de \_\_autoload()
  * spl_classes — Retorna as classes da SPL disponíveis
  * spl_object_hash — Retorna uma identificação hash do objeto dado


* Manipulação de arquivos
  * SplFileInfo — The SplFileInfo class
  * SplFileObject — The SplFileObject class
  * SplTempFileObject — The SplTempFileObject class


* Classes e interfaces genéricas
 * ArrayObject — A classe ArrayObject
 * SplObserver — The SplObserver interface
 * SplSubject — The SplSubject interface

---

## SplDoublyLinkedList

**Métodos**

* public void SplDoublyLinkedList::add ( mixed $index , mixed $newval )
* public mixed SplDoublyLinkedList::bottom ( void )
* public int SplDoublyLinkedList::count ( void )
* public mixed SplDoublyLinkedList::current ( void )
* public int SplDoublyLinkedList::getIteratorMode ( void )
* public bool SplDoublyLinkedList::isEmpty ( void )
* public mixed SplDoublyLinkedList::key ( void )
* public void SplDoublyLinkedList::next ( void )
* public bool SplDoublyLinkedList::offsetExists ( mixed $index )
* public mixed SplDoublyLinkedList::offsetGet ( mixed $index )
* public void SplDoublyLinkedList::offsetSet ( mixed $index , mixed $newval )
* public void SplDoublyLinkedList::offsetUnset ( mixed $index )
* public mixed SplDoublyLinkedList::pop ( void )
* public void SplDoublyLinkedList::prev ( void )
* public void SplDoublyLinkedList::push ( mixed $value )
* public void SplDoublyLinkedList::rewind ( void )
* public string SplDoublyLinkedList::serialize ( void )
* public void SplDoublyLinkedList::setIteratorMode ( int $mode )
* public mixed SplDoublyLinkedList::shift ( void )
* public mixed SplDoublyLinkedList::top ( void )
* public void SplDoublyLinkedList::unserialize ( string $serialized )
* public void SplDoublyLinkedList::unshift ( mixed $value )
* public bool SplDoublyLinkedList::valid ( void )


### SplStack

A classe SplStack fornece as principais funcionalidades de uma **pilha** implementado SplDoublyLinkedList.


```php
<?php

class Stack {

    private $splstack;

    function __construct(\SplStack $splstack)
    {
        $this->splstack = $splstack;
    }

    public function calculateSomme()
    {
        if ($this->splstack->count() > 1){
            $val1 = $this->splstack->pop();
            $val2 = $this->splstack->pop();
            $val = $val1 + $val2;
            $this->splstack->push($val);
            $this->calculateSomme();
        }
    }

    public function displaySomme()
    {
        $result = $this->splstack->pop();
        return $result;
    }

}

$splstack = new \SplStack();

$splstack->push(10);
$splstack->push(10);
$splstack->push(10);
$splstack->push(10);
$splstack->push(10);


$stack = new Stack($splstack);
$stack->calculateSomme();

var_dump($stack->displaySomme());

```


### SplQueue

A classe SplQueue fornece as principais funcionalidades de uma fila implementando SplDoublyLinkedList.

```php
<?php

function processSendQueue($socket, $sendQueue) {
    while (!$sendQueue->isEmpty()) {
                            //shift() || dequeue()
        $senditem = $sendQueue->shift();

        $rtn = socket_write($socket, $senditem);
        if ($rtn === false) {
            $sendQueue->unshift($senditem);
            throw new exception("send error: " . socket_last_error($socket));
            return;
        }
        if ($rtn < strlen($senditem) {
            $sendQueue->unshift(substr($senditem, $rtn);
            break;
        }
    }
}

```


### SplHeap

A classe SplHeap fornece as principais funcionalidades de um Heap.

```php
<?php

echo '<pre>';

class PHPClass extends SplHeap
{
    /**
     * Modifica método abstrato de compara
     */
    public function compare($array1, $array2)
    {
        $values1 = array_values($array1);
        $values2 = array_values($array2);
        if ($values1[0] === $values2[0]) return 0;
        return $values1[0] < $values2[0] ? -1 : 1;
    }
}

$heap = new PHPClass();

$heap->insert(array ('Adinan' => 31));
$heap->insert(array ('Ivan' => 24));
$heap->insert(array ('Leandro' =>  29));
$heap->insert(array ('Fernando' => 35));

$heap->top();

while ($heap->valid()) {
  list ($team, $score) = each ($heap->current());
  echo $team . ': ' . $score . PHP_EOL;
  $heap->next();
}

```

### SplPriorityQueue

A classe SplPriorityQueue fornece as principais funcionalidades de uma fila priorizada, implementada usando Heap.

```php
<?php

echo '<pre>';


class PQtest extends SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) return 0;
        return $priority1 < $priority2 ? -1 : 1;
    }
}

$objPQ = new PQtest();

$objPQ->insert('Fernando',3);
$objPQ->insert('Ivan',6);
$objPQ->insert('Leandro',1);
$objPQ->insert('Adinan',2);

echo "COUNT->".$objPQ->count()."<BR>";


$objPQ->setExtractFlags(PQtest::EXTR_BOTH);
$objPQ->top();

while($objPQ->valid()){
    print_r($objPQ->current());
    echo "<BR>";
    $objPQ->next();
}

```

### SplObjectStorage

A classe SplObjectStorage fornece um mapa de objetos para dados ou, ao ignorar os dados, um conjunto de objetos. Este duplo efeito pode ser útil em muitos casos que envolvem a necessidade de identificar exclusivamente objectos.


```php
<?php

echo '<pre>';

$s = new SplObjectStorage();

$o1 = new StdClass;
$o2 = new StdClass;
$o3 = new StdClass;

$s->attach($o1);
$s->attach($o2);

var_dump($s->contains($o1));
var_dump($s->contains($o2));
var_dump($s->contains($o3));

$s->detach($o2);

var_dump($s->contains($o1));
var_dump($s->contains($o2));
var_dump($s->contains($o3));

```

---

## Iteradores

### DirectoryIterator

A classe DirectoryIterator fornece uma interface simples para visualização de conteúdo de diretórios de arquivos.

```php
<?php

foreach (new DirectoryIterator('../path') as $fileInfo) {
    if($fileInfo->isDot()) continue;
    echo $fileInfo->getFilename() . "<br>\n";
}

```

### RecursiveArrayIterator

Este iterator permite trabalhar com os valores e chaves, deletar e modificar durante a iteração sobre as matrizes e objetos da mesma forma como o ArrayIterator. Além disso, é possível interagir sobre a entrada do iterador atual.

```php
<?php

echo '<pre>';

$myArray = array(
    0 => 'a',
    1 => array(
		'subA',
		'subB',
		array(
			0 => 'subsubA',
			1 => 'subsubB',
			2 => array(
				0 => 'deepA',
				1 => 'deepB'
			)
		)
	),
    2 => 'b',
    3 => array(
		'subA',
		'subB',
		'subC'
	),
    4 => 'c'
);

$iterator = new RecursiveArrayIterator($myArray);
iterator_apply($iterator, 'traverseStructure', array($iterator));

function traverseStructure($iterator) {

    while ( $iterator -> valid() ) {

        if ( $iterator -> hasChildren() ) {

            traverseStructure($iterator -> getChildren());

        }
        else {
            echo $iterator -> key() . ' : ' . $iterator -> current() .PHP_EOL;    
        }

        $iterator -> next();
    }
}

```

---

## Exceções

* LogicException (extends Exception)
 * BadFunctionCallException
  * BadMethodCallException
* DomainException
* InvalidArgumentException
* LengthException
* OutOfRangeException

* RuntimeException (extends Exception)
 * OutOfBoundsException
 * OverflowException
 * RangeException
 * UnderflowException
 * UnexpectedValueException


### LogicException

Exception that represents error in the program logic. This kind of exception should lead directly to a fix in your code.

### RuntimeException

Exceção lançada se um erro que só pode ser encontrada em tempo de execução ocorre.
