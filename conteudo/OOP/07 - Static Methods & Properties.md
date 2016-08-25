## Static Methods & Properties

Declarar propriedades ou métodos de uma classe como estáticos faz deles acessíveis sem a necessidade de instanciar a classe. Um membro declarados como estático não pode ser acessado com um objeto instanciado da classe (embora métodos estáticos podem).

>Por compatibilidade com o PHP 4, se nenhuma declaração de visibilidade for utilizada, a propriedade ou método será tratado como se declarado como public.

### Métodos estáticos

Como métodos estáticos podem ser chamados sem uma instancia do objeto criada, a pseudo-variável _$this_ não está disponível dentro de um método declarado como estático.

>No PHP 5, chamar métodos não estáticos estaticamente gerará um alerta de nível E_STRICT.

```php
echo '<pre>';
class Sharknado {
    public static function theBestMovie() {
        echo ' Oh hell no ' . PHP_EOL;
    }
}
Sharknado::theBestMovie();
$classname = 'Sharknado';
$classname::theBestMovie();
```

### Propriedades estáticas

Propriedades estáticas não podem ser acessadas através do operador _ -> _

Como qualquer outra variável estática do PHP, propriedades estáticas podem ser inicializadas, somente usando um valor literal ou constante; **expressões não são permitidas.**

```php
echo '<pre>';
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
print BestMovie::$bestmovie_estatico . "\n";
$bestMovie = new BestMovie();
print $bestMovie->staticNado() . "\n";
print $bestMovie->$bestmovie_estatico . "\n";    
print $bestMovie::$bestmovie_estatico . "\n";
$classname = 'BestMovie';
print $classname::$bestmovie_estatico . "\n"; 
print Sharknado::$bestmovie_estatico . "\n";
$sharknado = new Sharknado();
print $sharknado->staticBestMovie() . "\n";
```

#### Curiosidade

Não podemos usar _static_ em uma string _HEREDOC_. Note o exemplo a seguir

```php
// Mantido original 
class A{
  public static $BLAH = "user";
  function __construct() {
    echo <<<EOD
<h1>Hello {self::$BLAH}</h1>
EOD;
  }
}
$blah = new A();
```

Este codigo vai gerar a saida:  \<h1\>Hello \{self\:\:\}\</h1\>

Para solucionar este problema temos que atribuir a variavel antes de usar.

```php
//Mantido original
class B{
  public static $BLAH = "user";
  function __construct() {
    $blah = self::$BLAH;
    echo <<<EOD
<h1>Hello {$blah}</h1>
EOD;
  }
}
```

Neste caso a saida vai ser: \<h1\>Hello user\</h1\>
