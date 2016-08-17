# Função

## Funções Anônimas

Funções anônimas, closures ou funções lambda, permitem a criação de funções que não tem o nome especificado. Elas são mais úteis como o valor de parâmetros callback, mas podem tem vários outros usos como por exemplo valores de variáveis. São implementadas utilizando a classe Closure.

```php
<?php
echo preg_replace_callback('~_([a-z])([a-z])~', function ($match) {
    return " - ".strtoupper($match[1].$match[2]);
}, '-Com o que se fabrica o colar de_pe_ro_las?<br><br>');

$resposta = function($name)
{
    printf("-Com as %s!!\r\n", $name);
};

$resposta('pérolas');
```

Closures também podem herdar variáveis do escopo pai. Essas variáveis precisam ser referenciadas utilizando a instrução *use*.

```php
$message = '[Chiquinha solta um grito de horror ao ver seu pai nas mãos da bruxa do 71]<br>-Quem está aí?!<br>-Miau!<br>';

// Sem "use"
$example = function () {
    echo($message);
};
$example();

// Inherit $message
$example = function () use ($message) {
    echo($message);
};
$example();

// Herdando valor da variável quando a função é definida,
// não quando é chamada
$message = '-É você Satanás? Fora daqui! hehehehe...<br><br>';
echo $message;
$example(); //repete o uso da mensagem anterior

// Reseta mensagem
$message = '<br>[Chaves, fazendo sinal da cruz, acaba derrubando os pratos]<br>-E agora, quem está aí?!<br>';

// Herdando por referência
$example = function () use (&$message) {
    echo($message);
};
$example();

// O valor modificado no escopo pai
// reflete quando a função é chamada
$message = '-...';
$example();

// Closures também aceitam argumentos normais
$message = '!!!';
$example = function ($arg) use ($message) {
    echo($arg . ' ' . $message);
};
$example("Outro gato");
```