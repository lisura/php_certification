## Searching

Procurando informações dentro de uma strig.

funcção | descrição
--- | ---
strpos |  Encontra a posição da primeira ocorrência de uma string
strrpos | Encontra a posição da última ocorrência de um caractere em uma string
strripos | Encontra a posição da última ocorrência de uma string case-insensitive em uma string
strrchr | Encontra a ultima ocorrência de um caractere em uma string
substr | Retorna uma parte de uma string
stristr | strstr sem diferenciar maiúsculas e minúsculas
strstr | Encontra a primeira ocorrencia de uma string


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
