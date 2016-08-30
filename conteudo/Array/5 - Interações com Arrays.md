# Interações com Arrays

Para interar um array usamos estruturas de laços como já visto em BASIC->[LOOPS](../BASIC/05%20-%20Estruturas%20de%20Controle.md#loops)

## While

```php
$i = 0;
$array = array('A', 'B', 'C');
while ($i < count($array)) {
    echo $array{$i} . "|" .PHP_EOL;
    $i++;
}
```

```php
$array = array('A', 'B', 'C');
reset($array);
while (list($key, $value) = each($array)) {
    echo $value . "|" .PHP_EOL;
}
```

## Do-While

```php
$array = array('A', 'B', 'C');

$i = 0;
do {
    echo $array[$i] . "|" .PHP_EOL;
    $i++;
} while ($i < count($array));
```

## For

```php
$array = array('A', 'B', 'C');

for ($i = 0; $i < count($array); $i++) {
    echo $array[$i] . "|" .PHP_EOL;
}

echo '<br>' . "|" .PHP_EOL;

for ($i = 0; $i < count($array); $i++) {
    echo $array[$i] . "|" .PHP_EOL;
}

```

## Foreach

```php
$array = array('A', 'B', 'C');

foreach($array as $key => $value){
	echo $value . '|' . PHP_EOL;
}

```
