# Array Enumerados (Indexados)

## Declarando um array indexado diretamente(\#1):

```PHP
$array = array(
  0 => 'A',
  1 => 'B',
  2 => 'C'
);

var_dump($array);
```

## Declarando um array indexado diretamente(\#2):

```PHP
$array = array('A','B','C');
var_dump($array);
```

## Declarando um array indexado indiretamente:

```PHP
$array[] = 'A';
$array[] = 'B';
$array[] = 'C';

var_dump($array);
```

## Acessando elementos de um array indexado;

Elementos do array podem ser acessados utilizando a sintaxe array[chave].

```PHP
$array = array('A','B','C');
echo $array[1].$array[0].$array[1].$array[0].$array[2].$array[0];
```

> **OBS:** Tanto colchetes quanto chaves podem ser utilizados intercambiávelmente para acessar elementos de um array (por exemplo, $array[42] e $array{42} irão fazer a mesma coisa que o exemplo anterior).

```PHP
$array = array('A','B','C');
echo $array{1}.$array{0}.$array{1}.$array{0}.$array{2}.$array{0};
```
