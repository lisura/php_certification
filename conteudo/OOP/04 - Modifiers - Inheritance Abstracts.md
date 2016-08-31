## Modifiers \ Inheritance Abstracts

Uma classe pode herdar métodos e propriedades de outra classe usando a palavra-chave _extends_ na declaração da classe. Não é possível herdar múltiplas classes; uma classe só pode herdar uma classe base.

Ao se estender uma classe, a subclasse herda todos os métodos públicos e protegidos da classe pai. A não ser que uma classe sobrescreva estes métodos, eles manterão sua funcionalidade original.

Sempre que uma subclasse substitui o método da classe pai, o método dos pais não será chamado. Da mesma forma para construtores / destruidores, sobrecarga e métodos magicos.

Isto é útil para definir uma funcionalidade abstrata, e permitir a implementação de uma funcionalidade adicional em objetos similares sem a necessidade de reimplementar todas as funcionalidades compartilhadas.

```php
<?php
echo "<pre>";
class Nado{
    public function dangerLevel($string){
        echo 'LEVEL: ' . $string . PHP_EOL;
    }
    public function dangerName(){
        echo 'Just a Nado!!!' . PHP_EOL;
    }
}
class Shark extends Nado{
    public function dangerLevel($string){
        echo 'LEVEL: ' . $string . PHP_EOL;
    }
}
$nado = new Nado();
$shark = new Shark();
$nado->dangerLevel('5');
$nado->dangerName();       
$shark->dangerLevel('10');
$shark->dangerName();     
```

>Propriedades e métodos substituído não pode ter uma menor visibilidade. Ou seja, um metodo _public_ da classe **pai**  não pode ser sobrescrito por um metodo _private_ da classe **filho**

Os métodos e propriedades herdados podem ser sobrescritos redeclarando-os com o mesmo nome definido na classe base. Entretanto, se o método foi definido na classe base (pai) for como _final_ esse método não poderá ser sobrescrito. É possível acessar os métodos sobrescritos ou propriedades estáticas referenciado-os com parent::.

```php
<?php
echo "<pre>";
class Sharnado{
    // Redefine o método pai
    function thisMovie(){
        echo "Original \n";
    }
}
class OhHellNo extends Sharnado{
    // Redefine o método pai
    function thisMovie(){
        echo "O terceiro \n";
        parent::thisMovie();
    }
}
$extended = new OhHellNo();
$extended->thisMovie();
```

**Nota**:

Aqui está alguns esclarecimentos sobre a herança PHP - há um monte de má informação na rede. PHP suporta herança Multi-level. Ele não suporta herança múltipla.

Isso significa que você não pode ter uma classe estendendo 2 outras classes. No entanto, você pode ter uma classe estendendo outra, que se estende devoutra, e assim por diante.

```php
<?php
//o codigo abaixo não apresenta erros
class Sharknado {
	public function printMovie(){
		echo 'This is SharkNado';
	}
}
class TheSecondOne extends Sharknado {}
class OhHellNo extends TheSecondOne {}
$someObj = new Sharknado();  // no problems
$someOtherObj = new TheSecondOne(); // no problems
$lastObj = new OhHellNo(); // still no problems
$lastObj->printMovie();
```

### final

A palavra chave **final**, previne que classes filhas sobrescrevam um método que esteja prefixado sua definição. Se a própria classe estiver definida como final, ela não pode ser estendida.

```php
<?php
class Sharnado{
    final function thisMovie(){}
}
class OhHellNo extends Sharnado{
    function thisMovie(){}
}
$extended = new OhHellNo();
$extended->thisMovie();
//E_COMPILE_ERROR : type 64 -- Cannot override final method Sharnado::thisMovie()
```

```php
<?php
echo '<pre>';
final class Sharknado {}
class TheSecondOne extends Sharknado {}
$someObj = new TheSecondOne();  
//E_COMPILE_ERROR : type 64 -- Class TheSecondOne may not inherit from final class
```

>Se você alguma vez se deparar com uma classe finalizada ou método que você desejar estender, escrever um **Decorator**.
```php
<?php
class Sharnado{
    final function thisMovie(){
		return 'First';
	}
}
class OhHellNo {
	private $sharknado;
	public function __construct(){
		$this->sharknado = new Sharnado();
	}
    function thisMovie(){
		echo $this->sharknado->thisMovie();
	}
}
$extended = new OhHellNo();
$extended->thisMovie();
```

**Nota**:

Desde o PHP 5.5, a palavra-chave **class** também pode ser utilizada para resolução de nome de classes. Pode-se obter uma string contendo o nome completo e qualificado da classe utilizando ClassName::class. Isso é particularmente útil em classes com namespaces.

```php
namespace SN {
    class Sharnado{}
    echo Sharnado::class;
}
//SN\Sharnado
```

### Abstracts

Classes definidas como abstratas não podem ser instanciadas, e qualquer classe que contenha ao menos um método abstrato também deve ser abstrata. Métodos são definidos como abstratos declarando a intenção em sua assinatura - não podem definir a implementação.

Ao herdar uma classe abstrata, todos os métodos marcados como abstratos na declaração da classe pai devem ser implementados na classe filha; adicionalmente, estes métodos devem ser definidos com a mesma (ou menos restrita) visibilidade. Por exemplo, se um método abstrato for definido como protected, a implementação da função deve ser definida como protected ou public, mas não private.

Além disso, a assinatura dos métodos devem coincidir, isso é, as instruções de tipo e o número de argumentos exigidos devem ser os mesmos.

```php
<?php
echo '<pre>';
abstract class Sharknado{
    // Força a classe que estende ClasseAbstrata a definir esse método
    abstract protected function movieName();
    abstract protected function movieKills( $prefixo );
    // Método comum
    public function imprimirMovieName() {
        print $this->movieName();
    }
}
class First extends Sharknado{
    public function movieName() {
        return "Shaknado 1 | ";
    }

    public function movieKills( $prefixo ) {
        return "Total de {$prefixo}";
    }
}
class TheSecondOne extends Sharknado{
    public function movieName() {
        return "Shaknado 2 - The Second One | ";
    }
    public function movieKills( $prefixo ) {
        return "Total de {$prefixo}";
    }
}
$classe1 = new First();
echo $classe1->movieName();
echo $classe1->movieKills('200') ."\n";
$classe2 = new TheSecondOne();
echo $classe2->movieName();
echo $classe2->movieKills('9000') ."\n";
echo $classe2->imprimirMovieName() ."\n";
```

Classes abstratas são usadas para criar uma generalização e após isso, especializar comportamentos especificos em outras classes. No exemplo acima o comportamento geral é "movieName";

Caso exista um metodo abstrato e ele nao for sobrescrito na classe filha, o PHP exibirá um FATAL ERROR.

```php
<?php
echo '<pre>';
abstract class Shaknado{
    abstract protected function movieName();
}
class First extends Shaknado{}
$classe1 = new First();
//E_ERROR......
```
