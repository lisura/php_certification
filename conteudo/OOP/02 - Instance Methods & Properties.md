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

>Nota: O uso da declaração de variável com a palavra-chave var ainda é suportada por razões de compatibilidade (como um sinônimo para a palavra-chave public). Em versões do PHP anteriores ao 5.1.3, isso gerará um aviso do tipo E_STRICT.
```php
echo '<pre>';
class Sharknado{
    private $movie;
    public function __construct($name){
        $this->movie = $name;
    }

    private function privateSharknado(){
        echo 'Acessou o método privado.';
    }
    public function publicSharknado(Sharknado $another){
        // Pode-se alterar a propriedade privada:
        $another->movie = 'FirstOne';
        var_dump($another->movie);
        // Pode-se chamar método privado:
        $another->privateSharknado();
    }
}
$test = new Sharknado('SecondOne');
$test->publicSharknado(new Sharknado('OhHellNo'));
```

**recomendação**: não criar o seu metodo da classe iniciando com  \_\_  como \_\_call. Porque a função que começa com \_\_ parece ser função mágica em php.

O manual diz que "metodos privados limitam a visibilidade somente para a classe que define o item". Isso significa que as classes filho não vê os métodos privados de classe pai, e vice-versa.

Como resultado, os pais e os filhos podem ter diferentes implementações do "mesmo" método privado, dependendo de onde você chamá-los.

Por quê? Porque métodos privados são visíveis apenas para a classe em que foram definidas, logo a classe filha não vê métodos privados do pai, mas pode reescreve-los. Em outras palavras - cada classe tem um conjunto particular de variáveis privadas que mais ninguém tem acesso.

```php
echo '<pre>';
class Sharknado {
    public function shark() {
        $this->justNados();
    }
    private function justNados() {
        echo 'Just Sharknado'.PHP_EOL;
    }
}
class FireNado extends Sharknado {
	public function fire() {
        $this->justNados();
    }
    private function justNados() {
        echo 'FireSharkNado'.PHP_EOL;
    }
}
$test = new FireNado();
$test->shark();
$test->fire();
```
