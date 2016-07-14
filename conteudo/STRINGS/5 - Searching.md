## Searching

Procurando informações dentro de uma string.

Tema da aula no [LINK](https://www.youtube.com/watch?v=vLaX8UvVUQw)

funcção | descrição
--- | ---
strpos |  Encontra a posição da primeira ocorrência de uma string
strrpos | Encontra a posição da última ocorrência de um caractere em uma string
strripos | Encontra a posição da última ocorrência de uma string case-insensitive em uma string
strrchr | Encontra a ultima ocorrência de um caractere em uma string
strstr | Encontra a primeira ocorrencia de uma string
stristr | strstr sem diferenciar maiúsculas e minúsculas

### Detalhando os metodos.

**strpos** : Encontra a posição da primeira ocorrência de uma string

> int strpos ( string $haystack , string $needle [, int $offset ] )

Retorna a posição numérica da primeira ocorrência de needle dentro de haystack. Se needle não for encontrado, strpos() irá retornar o boolean FALSE.

```php
$string = "I've had it with these mother fucking snakes on this mother fucking plane";
echo strpos($string, 'snakes'); //38
echo strpos($string, 'fucking'); //30
echo strpos($string, 'fucking', 32); //60
```

**strrpos** : Encontra a posição da última ocorrência de um caractere em uma string

>int strrpos ( string $haystack , string $needle [, int $offset ] )

Retorna a posição numérica da última ocorrência de needle na string haystack. Se needle não é encontrado, retorna FALSE.

>- Se offset for positivo, então strrpos só funciona na parte da cadeia a partir de offset até o fim. Isso geralmente terá os mesmos resultados que não especificando um deslocamento , a não ser as únicas ocorrências de needle são antes de offset ( no caso especificando que o offset não vai encontrar a needle ).
- Se offset for negativo, então strrpos só funciona nos caracteres no final da cadeia. Se needle se encontra mais longe a partir da extremidade da cadeia , não será encontrada.

```php
$string = "I've had it with these mother fucking snakes on this mother fucking plane";
$string = "I've had it with these mother fucking snakes on this mother fucking plane";
echo strrpos($string, 'snakes'). ' - '; //38
echo strrpos($string, 'fucking'). ' - '; //60
echo strrpos($string, 'fucking', 62). ' - '; //
echo strrpos($string, 'fucking', -5). ' - '; //60
echo strrpos($string, 'fucking', -20); //30
```

**strripos** : Encontra a posição da última ocorrência de uma string case-insensitive em uma string

>int strripos ( string $haystack , string $needle [, int $offset ] )

Encontra a posição numérica da última ocorrência de needle na string haystack. Diferente de strrpos(), strripos() é case-insensitive.

Retorna a posição numérica da última ocorrência de needle. Note também que posições da string inicia em 0, e não 1. Se needle não é encontrado, FALSE é retornado.

```php
$haystack = 'every body strap in, I am about to open some fucking windows';
$needle   = 'BoDy';
$pos      = strripos($haystack, $needle);
if ($pos === false) {
    echo "Sinto muito, nós não encontramos ($needle) em ($haystack)";
} else {
    echo "Nós encontramos a última ($needle) na posição ($pos)";
}
```

**strrchr** :  Encontra a ultima ocorrência de um caractere em uma string

> string strrchr ( string $haystack , char $needle )

Esta função retorna a parte de haystack que inicia na última ocorrência de needle e vai até o fim de haystack. Retorna FALSE se needle não for encontrado.

```php
$haystack = 'enuf is enuf, I ve had it with these mother fucking snakes on this mother fucking plane';
echo strrchr($haystack, 'fucking');
```


**strstr** :Encontra a primeira ocorrencia de uma string

> string strstr ( string $haystack , mixed $needle [, bool $before_needle ] )

Retorna parte da string haystack a partir da primeira ocorrência de needle até o final de haystack.

```php
$haystack = 'enuf is enuf, I ve had it with these mother Fucking snakes on this mother fucking plane, every body strap in, I am about to open some fucking windows';
$retorno = strstr($haystack, 'fucking');
echo $retorno;
```

**stristr** : strstr() sem diferenciar maiúsculas e minúsculas

>string stristr ( string $haystack , mixed $needle [, bool $before_needle ] )

Retorna tudo de haystack apartir da primeira ocorrência de needle até o final. Se before_needle == TRUE (o padrão é FALSE), stristr() retorna a parte de haystack antes da primeira ocorrência de needle.

```php
$haystack = 'enuf is enuf, I ve had it with these mother Fucking snakes on this mother fucking plane, every body strap in, I am about to open some fucking windows';
$retorno = strstr($haystack, 'fucking');
echo $retorno . '  || ';
$retorno = strstr($haystack, 'fucking', true);
echo $retorno ;
```
