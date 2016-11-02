# Revisão sobre Arrays

Um array no PHP é na verdade um mapa ordenado. Um mapa é um tipo que relaciona valores a chaves. Este tipo é otimizado para várias usos diferentes: ele pode ser tratado como um array, uma lista (vetor), hashtable (que é uma implementação de mapa), dicionário, coleção, pilha, fila, etc. Também existe a possibilidade dos valores do array serem outros arrays, árvores e arrays multidimensionais.

## Construindo arrays

Padrão:
```php
array(
   chave0  => valor0,
   chave1  => valor1,
   chave2  => valor2
);
```

PHP 5.4 ou acima:
```php
[
   chave0  => valor0,
   chave1  => valor1,
   chave2  => valor2
];
```

Sobre as chaves de arrays PHP:
* A chave deve ser do tipo inteiro ou string. O valor pode ser de qualquer tipo.
* Strings contendo inteiros válidos, serão convertidos para o tipo inteiro. Por exemplo, a chave"8" será, na verdade, armazenada como 8. Entretanto, "08" não será convertido, por não ser um inteiro decimal válido.
* Floats também são convertidos para inteiros, isso significa que a parte fracionada será removida. Por exemplo, a chave 8.7 será na verdade armazenada como 8.
* Booleanos são convertidos para inteiros, igualmente, por exemplo, a chave true, será na verdade armazenada como 1 e a chave false como 0.
* Null será convertido para uma string vazia, por exemplo, a chave null na verdade será armazenada como "".
* Arrays e objetos não podem ser usados como chaves. Fazer isso resultará em um aviso: Illegal offset type.
* Se vários elementos na declaração do array utilizam a mesma chave, apenas o último será utilizado, enquanto todos os outros serão sobrescritos. Ex: 1, "1", 1.5 e true são a mesma chave (inteiro 1)

## Array Enumerados (Indexados)

```PHP
//Declarando um array indexado diretamente(\#1):
$array = array(
  0 => 'A',
  1 => 'B',
  2 => 'C'
);

//Declarando um array indexado diretamente(\#2):
$array = array('A','B','C');

//Declarando um array indexado indiretamente:
$array[] = 'A';
$array[] = 'B';
$array[] = 'C';
```

Elementos do array podem ser acessados utilizando a sintaxe array[chave] ou array{chave}.

```PHP
$array = array('A','B','C');
echo $array[1].$array[0].$array[1].$array[0].$array[2].$array[0];
echo "<br>";
echo $array{1}.$array{0}.$array{1}.$array{0}.$array{2}.$array{0};
```

## Array Associativos (hashtable)

```PHP
//Declarando um array associativo diretamente:
$array = array(
  'FOO' => 'BAR',
  'BAR' => 'TAR',
  'TAR' => 'ZAR'
);

//Declarando um array associativo indiretamente:
$array['FOO'] = 'bar';
$array['BAR'] = 'tar';
$array['TAR'] = 'zar';

echo $array['BAR']. $array['FOO']. $array['TAR'];
echo "<br>";
echo $array['BAR']. $array{'FOO'}. $array{'TAR'};
```

## Array Multi Dimensional (Matrizes)

```PHP
$matriz = array();
$matriz[0][0] = true;
$matriz[0][1] = true;
$matriz[1][0] = true;
$matriz[1][1] = true;
```

## Interações com Arrays

While:
```php
$i = 0;
$array = array('A', 'B', 'C');
while ($i < count($array)) {
    echo $array{$i} . "|" .PHP_EOL;
    $i++;
}

$array = array('A', 'B', 'C');
reset($array);
while (list($key, $value) = each($array)) {
    echo $value . "|" .PHP_EOL;
}
```

Do-While:
```php
$array = array('A', 'B', 'C');

$i = 0;
do {
    echo $array[$i] . "|" .PHP_EOL;
    $i++;
} while ($i < count($array));
```

For:
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

Foreach:
```php
$array = array('A', 'B', 'C');

foreach($array as $key => $value){
	echo $value . '|' . PHP_EOL;
}
```

## Funções de Array
| Função                | Descrição                                                    |
|-----------------------|--------------------------------------------------------------|
| array_change_key_case | Modifica a caixa de todas as chaves em um array |
| array_chunk           | Divide um array em pedaços |
| array_column          | Retorna os valores de uma coluna do array informado |
| array_combine         | Cria um array usando um array para chaves e outro para valores |
| array_count_values    | Conta todos os valores de um array |
| array_diff_assoc      | Computa a diferença entre arrays com checagem adicional de índice |
| array_diff_key        | Computa a diferença entre arrays usando as chaves na comparação |
| array_diff_uassoc     | Computa a diferença entre arrays com checagem adicional de índice que feita por uma função de callback fornecida pelo usuário |
| array_diff_ukey       | Computa a diferença entre arrays usando uma função callback na comparação de chaves |
| array_diff            | Computa as diferenças entre arrays |
| array_fill_keys       | Preenche um array com valores, especificando chaves |
| array_fill            | Preenche um array com valores |
| array_filter          | Filtra elementos de um array utilizando uma função callback |
| array_flip            | Permuta todas as chaves e seus valores associados em um array |
| array_intersect_assoc | Computa a interseção de arrays com uma adicional verificação de índice |
| array_intersect_key   | Computa a interseção de array comparando pelas chaves |
| array_intersect_uassoc | Computa a interseção de arrays com checagem de índice adicional, compara índices por uma função de callback |
| array_intersect_ukey  | Computa a interseção de arrays usando uma função de callback nas chaves para comparação |
| array_intersect       | Calcula a interseção entre arrays |
| array_key_exists      | Checa se uma chave ou índice existe em um array |
| array_keys            | Retorna todas as chaves ou uma parte das chaves de um array |
| array_map             | Aplica uma função em todos os elementos dos arrays dados |
| array_merge_recursive | Funde dois ou mais arrays recursivamente |
| array_merge           | Combina um ou mais arrays |
| array_multisort       | Ordena múltiplos arrays ou arrays multidimensionais |
| array_pad             | Expande um array para um certo comprimento utilizando um determinado valor |
| array_pop             | Extrai um elemento do final do array |
| array_product         | Calcula o produto dos valores de um array |
| array_push            | Adiciona um ou mais elementos no final de um array |
| array_rand            | Retorna um ou mais elementos aleatórios de um array |
| array_reduce          | Reduz um array para um único valor através de um processo iterativo utilizando uma função |
| array_replace_recursive | Replaces elements from passed arrays into the first array recursively |
| array_replace         | Replaces elements from passed arrays into the first array |
| array_reverse         | Retorna um array com os elementos na ordem inversa |
| array_search          | Procura por um valor em um array e retorna sua chave correspondente caso seja encontrado |
| array_shift           | Retira o primeiro elemento de um array |
| array_slice           | Extrai uma parcela de um array |
| array_splice          | Remove uma parcela do array e substitui com outros elementos |
| array_sum             | Calcula a soma dos elementos de um array |
| array_udiff_assoc     | Computa a diferença entre arrays com checagem adicional de índice, compara dados por uma função de callback |
| array_udiff_uassoc    | Computa a diferença entre arrays com checagem adicional de índice, compara dados e índices por uma função de callback |
| array_udiff           | Computa a diferença de arrays usando uma função de callback para comparação dos dados |
| array_uintersect_assoc | Computa a interseção de arrays com checagem adicional de índice, compara os dados utilizando uma função de callback |
| array_uintersect_uassoc | Computa a interseção de arrays com checagem adicional de índice, compara os dados e os índices utilizando funções de callback separadas |
| array_uintersect      | Computa a interseção de array, comparando dados com uma função callback |
| array_unique          | Remove o valores duplicados de um array |
| array_unshift         | Adiciona um ou mais elementos no início de um array |
| array_values          | Retorna todos os valores de um array |
| array_walk_recursive  | Aplica um função do usuário recursivamente para cada membro de um array |
| array_walk            | Aplica uma determinada funcão em cada elemento de um array |
| array                 | Cria um array |
| arsort                | Ordena um array em ordem descrescente mantendo a associação entre índices e valores |
| asort                 | Ordena um array mantendo a associação entre índices e valores |
| compact               | Cria um array contendo variáveis e seus valores |
| count                 | Conta o número de elementos de uma variável, ou propriedades de um objeto |
| current               | Retorna o elemento corrente em um array |
| each                  | Retorna o par chave/valor corrente de um array e avança o seu cursor |
| end                   | Faz o ponteiro interno de um array apontar para o seu último elemento |
| extract               | Importa variáveis para a tabela de símbolos a partir de um array |
| in_array              | Checa se um valor existe em um array |
| key_exists            | Sinônimo de array_key_exists |
| key                   | Retorna uma chave de um array |
| krsort                | Ordena um array pelas chaves em ordem descrescente |
| ksort                 | Ordena um array pelas chaves |
| list                  | Cria variáveis como se fossem arrays |
| natcasesort           | Ordena um array utilizando o algoritmo da "ordem natural" sem diferenciar maiúsculas e minúsculas |
| natsort               | Ordena um array utilizando o algoritmo da "ordem natural" |
| next                  | Avança o ponteiro interno de um array |
| pos                   | Sinônimo de current |
| prev                  | Retrocede o ponteiro interno de um array |
| range                 | Cria um array contendo uma faixa de elementos |
| reset                 | Faz o ponteiro interno de um array apontar para o seu primeiro elemento |
| rsort                 | Ordena um array em ordem descrescente |
| shuffle               | Mistura os elementos de um array |
| sizeof                | Sinônimo de count |
| sort                  | Ordena um array |
| uasort                | Ordena um array utilizando uma função de comparação definida pelo usuário e mantendo as associações entre chaves e valores |
| uksort                | Ordena um array pelas chaves utilizando uma função de comparação definida pelo usuário. |
| usort                 | Ordena um array pelos valores utilizando uma função de comparação definida pelo usuário |

array_filter flags:

|FLAG                   |Decrição                                                   |
|-----------------------|-----------------------------------------------------------|
|ARRAY_FILTER_USE_KEY   | Passa chaves como argumentos para callback em vez de valor |
|ARRAY_FILTER_USE_BOTH  | Passa tanto valor quanto chave como argumento para callback   em vez do valor |
 
array_multisort/sort flags (array1_sort_flags):

| Flag               | Descrição                                          |
|--------------------|----------------------------------------------------|
| SORT_REGULAR       | compara os itens normalmente (não modifica o tipo) |
| SORT_NUMERIC       | compara os items numericamente                     |
| SORT_STRING        | compara os itens como strings                      |
| SORT_LOCALE_STRING | compara os itens como strings, utilizando o locale atual. Utiliza o locale que pode ser modificado com setlocale() |
| SORT_NATURAL       | compara os itens como strings utilizando "ordenação natural" tipo natsort() |
| SORT_FLAG_CASE     | pode ser combinado (bitwise OR) com SORT_STRING ou SORT_NATURAL para ordenar strings sem considerar maiúsculas e minúsculas |

extract flags:

| Flag                  | Descrição                                                |
|-----------------------|----------------------------------------------------------|
| EXTR_OVERWRITE        | Se houver uma colisão, sobrescreve a variável existente. |
| EXTR_SKIP             | Se houver uma colisão, não sobrescreve a variável existente.|
| EXTR_PREFIX_SAME      | Se houver uma colisão, adiciona um prefixo ao nome da variável definido pelo argumento prefix. |
| EXTR_PREFIX_ALL       | Adiciona um prefixo ao nome de todas as variáveis definido por prefix. |
| EXTR_PREFIX_INVALID   | Adiciona um prefixo definido por prefix apenas para variáveis como nomes inválidos ou numéricos.|
| EXTR_IF_EXISTS        | Só sobrescreve a variável se ela já existe na tabela de símbolos corrente, caso contrário, não faz nada. Isso é útil quando se quer definir uma lista de variáveis válidas e então extrair só as que foram definidas em $_REQUEST, por exemplo.|
| EXTR_PREFIX_IF_EXISTS | Só cria nomes de variáveis usando o prefixo se na tabela de símbolos já existe uma variável com o nome sem esse prefixo. |
| EXTR_REFS             | Extrai variáveis como referências, ou seja, os valores das variáveis importadas ainda estarão referenciando os valores do parâmetro var_array. Essa opção pode ser usada sozinha ou em conjunto com as outras usando o operador 'ou' em extract_type. |

## SPL - Objetos Como Array

SPL é coleção de classes e interfaces que servem para resolver problemas padrões no mundo PHP, seu principal objetivo é prover interfaces que permita os desenvolvedores fazer um uso completo das vantagens da programação orientado a objetos.
Os recursos abaixo são formas de se lidar com arrays de forma orientada a objetos:
* **ArrayObject**: objeto que funciona como um array (porém as funções nativas PHP de array não funcionam)
* **ArrayIterator**: remove e modifica valores e chaves quando itera arrays e objetos
* **RecursiveArrayIterator**: igual o anterior mas itera sub-níveis da iteração
* **iterator_to_array**: Copia o iterador em um array PHP
* **SplFixedArray**: objeto com funcionalidades de array mas com tamanho fixo e chaves integer dentro do limite. Mais rápido que array PHP
