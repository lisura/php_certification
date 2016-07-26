# Array Associativos (hashtable)

## Declarando um array associativo diretamente:

```PHP
$array = array(
  'FOO' => 'BAR',
  'BAR' => 'TAR',
  'TAR' => 'ZAR'
);

var_dump($array);
```

## Declarando um array associativo indiretamente:

```PHP
$array['FOO'] = 'bar';
$array['BAR'] = 'tar';
$array['TAR'] = 'zar';

var_dump($array);
```

## Acessando elementos de um array associativo;

Elementos do array podem ser acessados utilizando a sintaxe array[chave].

```PHP
$array = array(
  'FOO' => 'A',
  'BAR' => 'B',
  'TAR' => 'C',
  'ZAR' => 'N'
);

echo $array['BAR']
. $array['FOO']
. $array['TAR']
. $array['FOO']
. $array['ZAR']
. $array['FOO'];

```

> **OBS:** Tanto colchetes quanto chaves podem ser utilizados intercambiávelmente para acessar elementos de um array (por exemplo, $array['A'] e $array{'A'} irão fazer a mesma coisa que o exemplo anterior).


```PHP
$array = array(
  'FOO' => 'A',
  'BAR' => 'B',
  'TAR' => 'C',
  'ZAR' => 'N'
);

echo $array['BAR']
. $array{'FOO'}
. $array{'TAR'}
. $array{'FOO'}
. $array{'ZAR'}
. $array{'FOO'};
```

## O que temos de errado?

```PHP
$foo[bar] = 'inimigo';
echo $foo[bar];
```

.

.

.

Isto está errado, mas funciona. A razão é que este código possui uma constante indefinida (bar) em vez de uma string ('bar' - repare nas aspas simples). O PHP, no futuro, pode definir constantes que, infelizmente em algum código, pode ter os mesmos nome. Isto funciona, porque o PHP converte automaticamente uma string base (uma string não delimitada que não corresponde a nenhum símbolo conhecido) em uma string que contém a string base. Por exemplo, se não existir uma constante definida com o nome bar, então o PHP irá substituí-la pela string 'bar' e usá-la.
