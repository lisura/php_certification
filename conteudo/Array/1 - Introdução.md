
# Introdução

Um array no PHP é na verdade um mapa ordenado. Um mapa é um tipo que relaciona valores a chaves. Este tipo é otimizado para várias usos diferentes: ele pode ser tratado como um array, uma lista (vetor), hashtable (que é uma implementação de mapa), dicionário, coleção, pilha, fila e provavelmente mais. Também existe a possibilidade dos valores do array serem outros arrays, árvores e arrays multidimensionais.

> **Atenção:** Diferentimente de outras linguagens de programação como o 'C', o PHP cria seus arrays de forma dinâmica, alocando espaço comporme a demanda.

## Construtor do array

Um array pode ser criado com o construtor de linguagem array(). Ele leva qualquer quantidade de pares separados por vírgula chave => valor como argumentos.

```php
array(
   chave0  => valor0,
   chave1  => valor1,
   chave2  => valor2
);
```

> **OBS:** A partir do PHP 5.4 você também pode utilizar a sintaxe contraída de array, que troca array() por [].

```php
[
   chave0  => valor0,
   chave1  => valor1,
   chave2  => valor2
];
```

A chave pode e deve ser um inteiro ou uma string. O valor pode ser de qualquer tipo.

Adicionalmente, as seguites coerções ocorrerão a chave:

* Strings contendo inteiros válidos, serão convertidos para o tipo inteiro. Por exemplo, a chave"8" será, na verdade, armazenada como 8. Entretanto, "08" não será convertido, por não ser um inteiro decimal válido.

* Floats também são convertidos para inteiros, isso significa que a parte fracionada será removida. Por exemplo, a chave 8.7 será na verdade armazenada como 8.

* Booleanos são convertidos para inteiros, igualmente, por exemplo, a chave true, será na verdade armazenada como 1 e a chave false como 0.

* Null será convertido para uma string vazia, por exemplo, a chave null na verdade será armazenada como "".

* Arrays e objetos não podem ser usados como chaves. Fazer isso resultará em um aviso: Illegal offset type.

* Se vários elementos na declaração do array utilizam a mesma chave, apenas o último será utilizado, enquanto todos os outros serão sobrescritos.

Exemplo de sobrescrito:

```PHP
$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);

var_dump($array);

```

Resultando em :

```PHP
array(1) {
  [1]=>
  string(1) "d"
}
```
