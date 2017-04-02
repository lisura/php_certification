# Revisão sobre Funções

## Definição

Pacote de códigos que servem como instruções para executar ações. Qualquer código PHP válido pode aparecer em uma função, inclusive classes e outras funções.

Funções não precisam ser chamadas depois de sua definição, a não ser quando a função for definida dentro de uma cláusula condicional.

>Nota: Todo nome de função deve começar por underline ou letra!

Funções já declaradas não podem ser redefinidas, caso contrário será gerado um erro.

Todas as funções e classes em PHP possuem escopo global, podendo ser definidas dentro de uma função e serem executadas fora dela.

>Nota: Nomes de funções não são case-sensitive, ou seja, você pode chamar sem respeitar as letras Maiusculas e Minisculas.

### Declarando Funções

Ao declarar funções, parâmetros ou retorno de valores são opcionais.

### Argumentos

A lista de argumentos passados a uma função é separada por vírgulas e os argumentos são avaliados da esquerda pra direita.

Argumentos podem ser passados de duas formas: *Por valor* ou *Por referência*

funções nativas PHP para lidar com argumentos.

| função | descrição |
| --- | --- |
| int func_num_args ( void ) | Retorna o número de argumentos passados para a função |
| mixed func_get_arg ( int $arg_num ) | Retorna um item de uma lista de argumentos |
| array func_get_args ( void ) | Retorna um array contendo a lista de argumentos |

#### Argumentos com Valores Padrão

Argumentos podem ter valores padrão, assim caso uma variável não seja passada como parâmetro, uma nova variável é criada, recebendo o valor padrão.

*function corrigeChaves($a,$textocerto,$textoerrado="Massacote") { }*

>Nota: Variaveis com valor padrão, sempre devem ficar a direta dos parametros de uma função.

#### Argumentos Por Referência

Podemos passar diretamente a variável para ser alterada pela função, dispensando a necessidade de um return com o valor. Para isso basta adicionar um & na frente do argumento.

>É importante notar que somente variáveis podem ser passadas por referência, qualquer outra coisa resultará em FATAL ERROR

É possível também retornar um valor de uma determinada função por referência. Para isso, basta inserir um & antes do nome da função, e outro & para quem está chamando a função. No exemplo abaixo, a variável $palavraChave está apontando para a propriedade $anoes->palavraChave. Assim, qualquer alteração em $palavraChave ocorrerá também na propriedade apontada por referência, mesmo que seja uma propriedade privada.

```PHP
<?php
class Anoes {
    private $palavraChave = 'tchuim tchuim tchum clain';
    public function &retornoPorReferencia() {
        return $this->palavraChave;
    }
}
$anoes = new Anoes();
$palavraChave = &$anoes->retornoPorReferencia();
echo "Eis aqui a resposta-chave<br/>Quando alguém perguntar 'Quem sabe?':<br/>$palavraChave";
echo "<br/>".$anoes->retornoPorReferencia();
$palavraChave = "tchuim tchuim, tchuim tchuim tchum clain!";
echo "<br/>".$anoes->retornoPorReferencia();
```

#### Declarações de tipo

Conhecido no PHP 5 como *type hints*, declarações de tipo permitem que funções requiram que parâmetros sejam de certos tipos ao chamá-los. e o valor informado no parâmetro tiver um tipo incorreto, uma excessão [TipeError](http://us3.php.net/manual/pt_BR/class.typeerror.php) é gerada. Anteriormente no PHP 5, o erro era fatal.

Exemplo:  
````php
<?php
class C {}
class D extends C {}

// This doesn't extend C.
class E {}

function f(C $c) {
    echo get_class($c)."\n";
}

f(new C);
f(new D);
f(new E);
````

Para declarar o tipo o seu nome deve ser adicionado antes no nome do parâmetro. A declaração pode ser feita para aceitar **NULL** se o valor default do parâmetro for configurado também para **NULL**.

Exemplo:  
````php
<?php
class C {}

function f(C $c = null) {
    var_dump($c);
}

f(new C);
f(null);
````

No PHP 5, os tipos válidos eram: Classe/Interface, self, array e callabe. O PHP 7 permite, além desses, bool, float, int e string.

> Aviso:   
Apelidos para os tipos escalares acima não são suportados. Apelidos serão tradados como nomes de classe ou interface. Por exemplo, utilizar boolean como parâmetro ou tipo de retorno irá requerer um argumento ou retorno que seja um instanceof de uma classe ou interface boolean, em vez do tipo bool:

````php
<?php
function test(boolean $param) {}
test(true);
````

##### Tipagem estrita

Por padrão, quando possível, o PHP converte um tipo incorreto no tipo escalar esperado. Por exemplo, uma função espera uma string e recebe um inteiro, esse inteiro será convertido para string pelo PHP.  

No modo estrito somente uma variável do exato tipo especificado na declaração será aceito, ou uma exceção TypeError será lançada. A única exceção é o tipo integer que poderá ser entregue a uma função esperando um float. Chamadas a funções de dentro de funções internas não serão afetadas pelas declarações *strict_types*. O modo estrito é habilitado por arquivo.  

Para habilitar o modo estrito, utilize a instrução declare com a definição strict_types:

````php
<?php
declare(strict_types=1);

function sum(int $a, int $b) {
    return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1.5, 2.5));
````

> Cuidado: Habilitar o modo estrito também afetará as declarações de tipo de retorno.

> Nota: A tipagem estrita se aplica a chamadas feitas a partir do arquivo em que a tipagem estrita foi habilitada, não necessariamente às funções declaradas com tipos. Se um arquivo sem tipagem estrita tentar fazer uma chamada a uma função com tipagem estrita, a preferência do chamador (tipagem fraca) será respeitada, e o valor será possivelmente convertido.  

> Nota Importante : Nota:
A tipagem estrita somente ocorre para declarações de tipo escalar, e portanto requer PHP 7.0.0 ou posterior, dado que declarações escalares foram acrescenadas nessa versão.

 Catching TypeError :

 ````php
 <?php
 declare(strict_types=1);

 function sum(int $a, int $b) {
     return $a + $b;
 }

 try {
     var_dump(sum(1, 2));
     var_dump(sum(1.5, 2.5));
 } catch (TypeError $e) {
     echo 'Error: '.$e->getMessage();
 }
 ````

 #### Número variável de argumentos  

 O PHP tem suporte para um número variável de argumentos nas funções definidas pelo usuário. Isso é implementado usando o token ... no PHP 5.6 e posterior, e usando as funções func_num_args(), func_get_arg(), e func_get_args() no PHP 5.5 e posteriores.

 A partir do PHP 5.6 é possível incluir o indicador de lista de argumentos ... para informar que a função aceita um número variável de argumentos. Os argumentos serão passados na forma de um array.

 ````php
 <?php
 function sum(...$numbers) {
     $acc = 0;
     foreach ($numbers as $n) {
         $acc += $n;
     }
     return $acc;
 }

 echo sum(1, 2, 3, 4);
 ````

 Você também pode utilizar ... quando chamando funções para transformar uma variável array, [Traversable](http://us3.php.net/manual/pt_BR/class.traversable.php) ou literal em uma lista de argumentos.

 ````php
 <?php
 function add($a, $b) {
     return $a + $b;
 }

 echo add(...[1, 2])."\n";

 $a = [1, 2];
 echo add(...$a);
 ````

 Você pode especificar argumentos posicionais antes do indicador. .... Nesse caso comente os argumentos finais, que não pareiem com um argumento posicional, serão adicionados ao array gerado por ....

É também possível adicionar um type hint antes do indicador .... Se presente então todos os argumentos capturados por ... deverão ser objetos da classe informada.

````php
<?php
function total_intervals($unit, DateInterval ...$intervals) {
    $time = 0;
    foreach ($intervals as $interval) {
        $time += $interval->$unit;
    }
    return $time;
}

$a = new DateInterval('P1D');
$b = new DateInterval('P2D');
echo total_intervals('d', $a, $b).' days';

// This will fail, since null isn't a DateInterval object.
echo total_intervals('d', null);
````

Finalmente, você também pode passar argumentos variáveis por referência ao prefixar ... com um &.

### Retorno de Valores

Valores podem ser retornados de uma função através do statement _return_. Qualquer tipo de dado pode ser retornado.

O uso do statement _return_ termina a execução da função, devolvendo o controle para a linha onde a função foi chamada, caso este seja omitido a função retorna NULL.

#### Declaração de tipo de retorno

Adicionado no PHP 7, é possível determinar o tipo do valor retornado de uma função. Os tipos disponíveis são os mesmo que estão disponíveis para declaração de argumentos.

A tipagem estrita também afeta a tipagem de retorno. No modo padrão (tripagem fraca) o valores retornados serão convertidos para o tipo correto caso não enquadrem no tipo informado. No modo de tipagem forte os valores retornados precisam ser o tipo correto ou uma exceção TypeError será lançada.

> Nota: Quando sobrescrevendo um método, o novo método precisa concidir com a tipagem de retorno do método anterior. Se o método sobrescrito não define uma tipagem de tipo, então o novo método precisa espelhar isso.

````php
<?php
function sum($a, $b): float {
    return $a + $b;
}

// Note que um float será retornado.
var_dump(sum(1, 2));
````

Modo estrito :

````php
<?php
declare(strict_types=1);

function sum($a, $b): int {
    return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1, 2.5));
````

Retornando um objeto :

````php
<?php
class C {}

function getC(): C {
    return new C;
}

var_dump(getC());
````

### Escopo de Variáveis

Variáveis declaradas nas funções não são visíveis fora das mesmas funções, enquanto que variáveis declaradas fora de funções são visíveis em qualquer lugar fora dessas funções.

>Nota: para não ter este comportamento se faz uso do array $GLOBALS ou da palavra chave global.

### Funções Variáveis

Se uma variável possui um conjunto de parenteses, PHP vai procurar por uma função com o mesmo nome do valor da variável e assim executar a função encontrada.

```PHP
<?php
function foo() { }
$func = 'foo';
$func();
```

É um recurso muito usado na implementação de callbacks e tabelas de funções

>Nota: Não funciona com constructs do PHP como o echo, unset(), print, empty(), etc...

A partir do PHP 7, 'ClassName::methodName' é permitido como função variável.

### Funções Anônimas

Funções anônimas, closures ou funções lambda, permitem a criação de funções que não tem o nome especificado. Elas são mais úteis como o valor de parâmetros callback.

>Nota: São implementadas utilizando a classe Closure.

Funções anônimas podem ser criadas pelo metodo

```PHP
<?php
string create_function ( string $args , string $codigo )
//exemplo
$newfunc = create_function('$target', 'return "Estou caçando " . $target ."!";');
echo $newfunc('lagartixas') . "<br/>";
```

Para verificar se o conteúdo da variável pode ser chamado como função usamos o metodo:

```php
bool is_callable ( mixed $var [, bool $syntax_only [, string &$callable_name ]] )
```

Isto pode verificar se uma simples variável contêm o nome de uma função válida, ou que um array contêm uma propriedade de um objeto e nome de função.

Closures também podem herdar variáveis do escopo pai. Essas variáveis precisam ser referenciadas utilizando a instrução _use_. A partir do PHP 7.1, essas variáveis podem não incluir superglobals, $this, ou variáveis com o mesmo nome como um parâmetro.

```PHP
<?php
echo "<pre>";
$message = '-Quem está aí?!<br>-Miau!<br>';
$example = function () {  // Sem "use"
    echo($message); echo PHP_EOL;
};
$example();
$example = function () use ($message) {  // => Inherit $message
    echo($message); echo PHP_EOL;
};
$example();
$message = '-É você Satanás? Fora daqui! hehehehe...<br><br>';
echo $message; echo PHP_EOL;
$example(); //repete o uso da mensagem anterior
```

>Herdar variáveis do escopo pai não é o mesmo que usar variáveis globais. Variáveis globais existem no escopo global, não importando a função sendo executada.

Vinculação automática de _$this_. (PHP 5.4 +), ao ser declarada no contexto de uma classe, a classe corrente é automaticamente vinculada a ela, tornando _$this_ disponível dentro do escopo da função.

```PHP
<?php
class SuperSam {
    public $frase = 'Time is money! Oh yeah...!';
    public function gritoDeGuerra()    {
        return function() {
            var_dump($this->frase);
        };
    }
}
$heroi = new SuperSam;
$function = $heroi->gritoDeGuerra();
$function();
```
