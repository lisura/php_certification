## Instance Methods & Properties

Propriedades e métodos de classe vivem em "namespaces" separados, de forma que é possível ter uma propriedade e método com mesmos nomes. A referência a propriedades e métodos tem a mesma notação, e a decisão de se uma propriedade será acessada ou uma chamada a um método feita, depende somente do contexto, ou seja, se está tentando acessar uma variável ou chamar um método.

```php
echo '<pre>';
class Sharknado {
    public $movies = 'propriedade';
    public function movies() {
        return 'metodo';
    }
}
$obj = new Sharknado();
echo $obj->movies, PHP_EOL;
echo $obj->movies(), PHP_EOL;
```

### Visibilidade

A visibilidade de uma propriedade ou método pode ser definida prefixando a declaração com as palavras-chave:

tipo | descricao
--- | ---
public | podem ser acessados de qualquer lugar
protected | só podem ser acessados na classe declarante e suas classes herdeiras
private | só podem ser acessados na classe que define o membro privado

```php
echo '<pre>';
class Sharknado {
    public $publica = 'Public';
    protected $protegida = 'Protected';
    private $privada = 'Private';
    function imprimePropriedades(){
        echo $this->publica . PHP_EOL;
        echo $this->protegida . PHP_EOL;
        echo $this->privada . PHP_EOL;
    }
}
$obj = new Sharknado();
echo $obj->publica . PHP_EOL;
//echo $obj->protegida . PHP_EOL;
//echo $obj->privada . PHP_EOL;
$obj->imprimePropriedades();
echo PHP_EOL;
class TheSecondOne extends Sharknado{
	protected $protegida = 'Protected2'; //isso pode
    function imprimePropriedades(){
        echo $this->publica . PHP_EOL;
        echo $this->protegida . PHP_EOL;
		//echo $this->privada . PHP_EOL;
    }
}
$obj2 = new TheSecondOne();
echo $obj2->publica . PHP_EOL; // Works
//echo $obj2->privada . PHP_EOL; // Undefined
//echo $obj2->protegida . PHP_EOL; // Fatal Error
$obj2->imprimePropriedades();
```
