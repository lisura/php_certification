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

### Retorno de Valores

Valores podem ser retornados de uma função através do statement _return_. Qualquer tipo de dado pode ser retornado.

O uso do statement _return_ termina a execução da função, devolvendo o controle para a linha onde a função foi chamada, caso este seja omitido a função retorna NULL.


### Argumentos

A lista de argumentos passados a uma funcção é separada por vírgulas e os argumentos são avaliados da esquerda pra direita.

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

Closures também podem herdar variáveis do escopo pai. Essas variáveis precisam ser referenciadas utilizando a instrução _use_.

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


### Forçando um tipo de valor

Quando definimos o tipo de valor dos parametros da função. No PHP 5.5, podemos definir os seguintes valores

+ Classes e interfaces
+ Array
+ Callable
