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

Herdar variáveis do escopo pai não é o mesmo que usar variáveis globais. Variáveis globais existem no escopo global, o qual é o mesmo não importa a função sendo executada. O escopo pai de um closure é a função no qual o closure foi declarado (não necessáriamente a função apartir do qual ele foi chamado).

```php
<?php
class RestauranteDonaFlorinda
{
    const PRECO_XICARA_DE_CAFE = 1000.00;
    const PRECO_BISCOITO_DE_ABACAXI = 2000.00;
    const PRECO_SANDUICHE_DE_PRESUNTO = 5900.55;

    protected $products = array();

    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback =
            function ($quantity, $product) use ($tax, &$total)
            {
                $pricePerItem = constant(__CLASS__ . "::PRECO_" .
                    strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
				if($product=='biscoito_de_abacaxi') echo "-NÃO TEM BISCOITO!!!<br>";
            };

        array_walk($this->products, $callback);
        return round($total, 2);
    }
}

$my_cart = new RestauranteDonaFlorinda;

// Add some items to the cart
$my_cart->add('sanduiche_de_presunto', 2);
$my_cart->add('xicara_de_cafe', 3);
$my_cart->add('biscoito_de_abacaxi', 7);

// Print the total with a 5% sales tax.
echo "Total: Cr$ " . $my_cart->getTotal(0.05) . "<br>";
```

Vinculação automática de $this. Do PHP 5.4 ou acima, ao ser declarada no contexto de uma classe, a classe corrente é automaticamente vinculada a ela, tornando $this disponível dentro do escopo da função.

```php
<?php
class SuperSam
{
    public $frase = 'Time is money! Oh yeah...!';
	public function gritoDeGuerra()
    {
        return function() {
            var_dump($this->frase);
        };
    }
}

$heroi = new SuperSam;
$function = $heroi->gritoDeGuerra();
$function();
```