# Funções de Array

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

---


## array_change_key_case

Modifica a caixa de todas as chaves em um array

```php
$array = array("primeiRo" => 1, "segunDo" => 4);
print_r(array_change_key_case($array, CASE_UPPER));
```

## array_chunk

Divide um array em pedaços.

**Params:**

* Array:  array
* Size: Tamanho dos pedaços
* preserve_keys: Quando definido para TRUE, chaves serão preservadas. O padrão é FALSE que reindexará os pedaços numericamente


```php
$array = array('a', 'b', 'c', 'd', 'e');
echo "<pre>";
var_dump(array_chunk($array, 2));
echo "<hr>";
var_dump(array_chunk($array, 2, true));
echo "</pre>";
```

## array_column

Retorna os valores de uma coluna do array informado


**Params:**

* input : Um array multidimensional ou um array de objetos que se deseja extrair os valores da coluna. Se um array de objetos for fornecido, propriedades públicas podem ser extraídas diretamente. Para extrair propriedades protegidas e privadas, a classe deve implementar ambos os métodos mágicos \_\_get() e \_\_set().

* column_key : A coluna de valores a ser retornada. Este valor pode ser uma chave inteira da coluna que se deseja recuperar, ou uma uma string com o nome da chave de um array associativo ou nome de propriedade. Também pode ser NULL para retornar arrays completos ou objetos (isso é útil com o parâmetro index_key, para reindexar o array).

* index_key : A coluna a ser utilizada como índices/chaves do array retornado. Este valor pode ser uma chave inteira da coluna, ou uma uma string com o nome da chave.


```php
$array = array(
    array(
        'id' => 2135,
        'nome' => 'Fernando',
        'sobrenome' => 'Corrêa',
    ),
    array(
        'id' => 3246,
        'nome' => 'Leandro',
        'sobrenome' => 'Lisura',
    ),
    array(
        'id' => 3247,
        'nome' => 'Adinan',
        'sobrenome' => 'Baptista',
    ),
    array(
        'id' => 3248,
        'nome' => 'Ivan',
        'sobrenome' => 'O Terrível',
    )
);

$nomes = array_column($array, 'nome');
echo "<pre>";
print_r($nomes);
echo "</pre>";
```

## array_combine

Cria um array usando um array para chaves e outro para valores

**Params**


* keys : Array a ser usado como chaves. Valores ilegais para chave serão convertidos para string.
* values : Array a ser usado como valores


```php
$a = array('Leandro', 'Ivan', 'Fernando', 'Adinan');
$b = array('taveira', 'OTerrível', 'Chatinho', 'O Cara');
$c = array_combine($a, $b);

echo "<pre>";
print_r($c);
echo "</pre>";
```

## array_count_values

Conta todos os valores de um array

**Params:**

* Array : Array

```php
$array = array(1, "ola", 1, "mundo", "ola");
$res = array_count_values($array);

echo "<pre>";
print_r($res);
echo "</pre>";
```

## array_diff_assoc

Computa a diferença entre arrays com checagem adicional de índice

**Params:**

* Array : Array 1
* Array : array 2
* Array : Array N

Neste exemplo veja que o par "a" => "verde" está presente em ambos os arrays e por isso não está na saída da função. Por outro lado, o par 0 => "vermelho" está na saída porque no segundo argumento, "vermelho", tem a chave 1.

```php
$array1 = array("a" => "verde", "b" => "marrom", "c" => "azul", "vermelho");
$array2 = array("a" => "verde", "amarelo", "vermelho");
$result = array_diff_assoc($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_diff_key

Computa a diferença entre arrays usando as chaves na comparação.

**Params:**

* Array : Array 1
* Array : array 2
* Array : Array N

```php
$array1 = array('azul'  => 1, 'vermelho'  => 2, 'verde'  => 3, 'roxo' => 4);
$array2 = array('verde' => 5, 'azul' => 6, 'amarelo' => 7, 'rosa'   => 8);
$result = array_diff_key($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_diff_uassoc

Computa a diferença entre arrays com checagem adicional de índice que feita por uma função de callback fornecida pelo usuário

**Params:**

* Array : Array 1
* Array : array 2
* Array : Array ..N
* Callback : Função de comparação

```php
function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b)? 1:-1;
}

$array1 = array("a" => "verde", "b" => "marrom", "c" => "azul", "vermelho");
$array2 = array("a" => "verde", "amarelo", "vermelho");
$result = array_diff_uassoc($array1, $array2, "key_compare_func");

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_diff_ukey

Compara as chaves de array1 com as chaves de array2 e retorna a diferença. Esta função é similar a array_diff(), com exceção que a comparação é feita nas chaves ao invés dos valores.

Diferente de array_diff_key() uma função callback é fornecida e usada para comparação de índices, não função interna.

**Params:**

* Array : Array 1
* Array : array 2
* Array : Array ..N
* Callback : Função de comparação

```php
function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 > $key2)
        return 1;
    else
        return -1;
}

$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

$result = array_diff_ukey($array1, $array2, 'key_compare_func');

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_diff

Computa as diferenças entre arrays

**Params:**

* Array : Array 1
* Array : array 2
* Array : Array ..N

```php
$array1 = array("a" => "verde", "vermelho", "azul", "vermelho");
$array2 = array("b" => "verde", "amarelo", "vermelho");

$result = array_diff($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";

```

## array_fill_keys

Preenche um array com valores, especificando chaves

**Params:**

* Array : Array
* mixed : valor

```php
$array = array('foo', 5, 10, 'bar');
$result = array_fill_keys($array, 'banana');

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_fill

Preenche um array com valores

**Params:**

* Int : Início de IDX
* int : Quantidade de itens
* Mixed : Valor

```php
$result =  array_fill(-2, 4, 'Pera');

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_filter

Filtra elementos de um array utilizando uma função callback

**Params:**

* Array :  Array
* callback: Função usada para filtrar
* FLAG : Determina quais argumentos são passados para o callback

 |FLAG                   |Decrição                                                   |
 |-----------------------|-----------------------------------------------------------|
 |ARRAY_FILTER_USE_KEY   | Passa chaves como argumentos para callback em vez de valor |
 |ARRAY_FILTER_USE_BOTH  | Passa tanto valor quanto chave como argumento para callback   em vez do valor |


```php
function impar($var){
    // retorna se o inteiro informado é impar
    return($var & 1);
}

function par($var){
    // retorna se o inteiro informado é par
    return(!($var & 1));
}

$array1 = array("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5);
$array2 = array(6, 7, 8, 9, 10, 11, 12);

echo "<pre>";
print_r(array_filter($array1, "impar"));
print_r(array_filter($array2, "par"));
echo "</pre>";
```

## array_flip

Permuta todas as chaves e seus valores associados em um array

**Params:**

* Array :  Array

```php
$array = array("Laranja", "maça", "peara");
$result = array_flip($array);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_intersect_assoc

Computa a interseção de arrays com uma adicional verificação de índice

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N

```php
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "b" => "yellow", "blue", "red");
$result = array_intersect_assoc($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_intersect_key

Computa a interseção de array comparando pelas chaves

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N


Em nosso exemplo você pode ver que somente as chaves 'blue' e 'green' estão presentes em ambos array e assim retornado. Também note que os valores das chaves 'blue' e 'green' diferem nos dois arrays. A combinação ocorre porque somente as chaves são verificadas. Os valores retornados são do array1.

```php
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

$result = array_intersect_key($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_intersect_uassoc

Computa a interseção de arrays com checagem de índice adicional, compara índices por uma função de callback

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N
* callback: Função usada para Comparação


```php
$array1 = array("a" => "verde", "b" => "marrom", "c" => "azul", "vermelho");
$array2 = array("a" => "VERDE", "B" => "marrom", "amarelo", "vermelho");

$result = array_intersect_uassoc($array1, $array2, "strcasecmp");
echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_intersect_ukey

Computa a interseção de arrays usando uma função de callback nas chaves para comparação

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N
* callback: Função usada para Comparação. A função de comparação precisa retornar um inteiro menor, igual, ou maior que zero caso o primeiro argumento seja considerado respectivamente maior, igual ou maior que o segundo.


```php
function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 > $key2)
        return 1;
    else
        return -1;
}

$array1 = array('azul'  => 1, 'vermelho'  => 2, 'verde'  => 3, 'roxo' => 4);
$array2 = array('verde' => 5, 'azul' => 6, 'amarelo' => 7, 'rosa'  => 8);

$result = array_intersect_ukey($array1, $array2, 'key_compare_func');

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_intersect

Calcula a interseção entre arrays

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N

Dois elementos são considerados iguais se, e somente se, (string) $elem1 === (string) $elem2. Em palavras: quando a representação em string é a mesma.

```php
$array1 = array("a" => "verde", "vermelho", "azul");
$array2 = array("b" => "verde", "amarelo", "vermelho");
$result = array_intersect($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_key_exists

Checa se uma chave ou índice existe em um array

## key_exists
Sinônimo de array_key_exists

**Params:**

* Key : Nome da key a ser buscada no array.
* Array :  Array 1

```php
$busca_array = array("primeiro" => 1, "segundo" => 4);
if (array_key_exists("primeiro", $busca_array)) {
    echo "O elemento 'primeiro' está no array!";
}

```

### isset() X array_key_exists()

```php
$search_array = array('A' => null, 'B' => 'C');

// Resulta em false
$result = isset($search_array['A']);
echo "<pre>";
var_dump($result);
echo "</pre>";

// Resulta em true
$result = array_key_exists('A', $search_array);$search_array = array('A' => null, 'B' => 4);
echo "<pre>";
var_dump($result);
echo "</pre>";

```

## array_keys

Retorna todas as chaves ou uma parte das chaves de um array

**Params:**

* Array :  Array 1
* Mixed : Se especificado, então somente chaves contendo estes valores são retornado.
* boolean: Determina se a comparação é rígida (===) deve ser utilizada durante a busca.


```php
$array = array(0 => 100, "cor" => "vermelho");
$result = array_keys($array);

echo "<pre>";
var_dump($result);
echo "</pre>";
```

```php
$array = array("azul", "vermelho", "verde", "azul", "azul");
$result = array_keys($array, "azul");

echo "<pre>";
var_dump($result);
echo "</pre>";
```

```php
$array = array("cor"     => array("azul", "vermelho", "verde"),
               "tamanho" => array("pequeno", "medio", "grande"));
$result = array_keys($array);
echo "<pre>";
var_dump($result);
echo "</pre>";
```

## array_map

Aplica uma função em todos os elementos dos arrays dados

**Params:**

* Callback: Função usada para Manipulação
* Array :  Array 1
* Array :  Array 2


```php
function cube($n)
{
    return($n * $n * $n);
}

$a = array(1, 2, 3, 4, 5);
$result = array_map("cube", $a);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_merge_recursive

Funde dois ou mais arrays recursivamente

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N

```php
$ar1 = array("cor" => array ("favorita" => "vermelho"), 5);
$ar2 = array(10, "cor" => array ("favorita" => "verde", "azul"));
$result = array_merge_recursive($ar1, $ar2);

echo "<pre>";
print_r($result);
echo "</pre>";

```

## array_merge

Combina um ou mais arrays

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N

```php
$array1 = array("cor" => "vermelho", 2, 4);
$array2 = array("a", "b", "cor" => "verde", "forma" => "trapezoide", 4);
$result = array_merge($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_multisort

Ordena múltiplos arrays ou arrays multidimensionais


**Params:**

* Array :  Array a ser ordenado
* Array :  A ordenação para ser utilizada no argumento array anterior. Pode ser SORT_ASC para ordenar na ascendente (crescente) SORT_DESC para ordernar na descendente (decrescente). Este argumento pode ser trocado com array1_sort_flags ou ser omitido completamente, e nesse caso é utilizado SORT_ASC.
* FLAG : (array1_sort_flags) Opções de ordenamento para o argumento array anterior

array1_sort_flags:


| SORT_REGULAR  |  comparar itens normalmente (não modidifica tipos)  |
|---------------|-----------------------------------------------------|
| SORT_NUMERIC  | compare itens numericamente                         |
| SORT_STRING   | compare itens como strings                        |
| SORT_LOCALE_STRING | compare itens como strings, utilizando o locate atual. Utiliza o locale, que pode ser modificado com setlocale()|
| SORT_NATURAL  | compare itens como strings utilizando a "ordenação natural" de natsort() |
| SORT_FLAG_CASE| pode ser combinado (bitwise OR) com SORT_STRING ou SORT_NATURAL para ordenar as strings sem considerar maiúsculas e minúsculas |


```php
$ar1 = array(10, 100, 100, 0);
$ar2 = array(1,  3,   2,   4);
array_multisort($ar1, $ar2);


echo "<pre>";
print_r($ar1);
echo "</pre>";

echo "<pre>";
print_r($ar2);
echo "</pre>";
```

## array_pad

Expande um array para um certo comprimento utilizando um determinado valor

**Params:**

* Array :  Array 1
* Int :  Tamanho
* Mixed :  Valor de preenchimento


```php
$input = array(12, 10, 9);

$result = array_pad($input, 5, 0);
echo "<pre>";
print_r($result);
echo "</pre>";

$result = array_pad($input, -7, -1);
echo "<pre>";
print_r($result);
echo "</pre>";

$result = array_pad($input, 2, "noop");
//	Não Preenche
echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_pop

Extrai um elemento do final do array

**Params:**

* Array :  Array 1

```php
$cesta = array("laranja", "banana", "melancia", "morango");
$pop = array_pop($cesta);
echo "<pre>";
print_r($pop);
echo "</pre>";
```

## array_product

Calcula o produto dos valores de um array

**Params:**

* Array :  Array

```php
$a = array(2, 4, 6, 8);
echo "Produto(*) = " . array_product($a) . "\n";
```

## array_push

Adiciona um ou mais elementos no final de um array

**Params:**

* Array :  Array
* Mixed :  Entrada de Valor

> **Nota** Se você usar array_push() para adicionar um elemento na array, é melhor usar $array[] = porque deste jeito não há uma chamada a uma função.

> **Nota:** array_push() irá emitir um aviso se o primeiro argumento não for um array. isto é diferente do funcionamento de $var[] aonde uma nova matriz é criada.

```php
$cesta = array("laranja", "morango");
array_push($cesta, "melancia", "batata");

echo "<pre>";
print_r($cesta);
echo "</pre>";

```

## array_rand

Retorna um ou mais elementos aleatórios de um array

**Params:**

* Array :  Array
* Integer :  Número de chaves de retornos


```php
$input = array("Fernando", "Lisura", "Ivan", "Adinan", "Minion");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";
```

## array_reduce

Reduz um array para um único valor através de um processo iterativo utilizando uma função

**Params:**

* Array :  Array
* Callback: Função usada para Manipulação
* Initial: Se o argumento opcional initial for passado, ele será utilizado no início do processo, ou como um resultado final se o array estiver vazio.


```php
function soma($v, $w)
{
  $v += $w;
  return $v;
}

function multiplicacao($v, $w)
{
  $v *= $w;
  return $v;
}

$a = array(1, 2, 3, 4, 5);
$x = array();

$b = array_reduce($a, "soma");
echo "<pre>";
print_r($b);
echo "</pre>";

$c = array_reduce($a, "multiplicacao", 10);
echo "<pre>";
print_r($c);
echo "</pre>";

$d = array_reduce($x, "soma", 1);
echo "<pre>";
print_r($d);
echo "</pre>";
```

## array_replace_recursive

Substitui elementos do array passado para o primeiro array de forma recurciva.

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N

```php
$base = array('citrus' => array( "orange") , 'berries' => array("blackberry", "raspberry"), );
$replacements = array('citrus' => array('pineapple'), 'berries' => array('blueberry'));

$basket = array_replace_recursive($base, $replacements);
echo "<pre>";
print_r($basket);
echo "</pre>";
```

## array_replace

Substitui elementos do array passado para o primeiro array.

**Params:**

* Array :  Array 1
* Array :  Array 2
* Array :  Array ... N

```php
$base = array('citrus' => array( "orange") , 'berries' => array("blackberry", "raspberry"), );
$replacements = array('citrus' => array('pineapple'), 'berries' => array('blueberry'));

$basket = array_replace($base, $replacements);
echo "<pre>";
print_r($basket);
echo "</pre>";
```

## array_reverse

Retorna um array com os elementos na ordem inversa.

**Params:**

* Array :  Array 1
* Boolean: Preservar index_key

```php
$input = array("php", 5.5, array ("verde", "vermelho"));
$result = array_reverse($input);

echo "<pre>";
print_r($result);
echo "</pre>";

```

## array_search

Procura por um valor em um array e retorna sua chave correspondente caso seja encontrado

**Params:**

* Mixed: Termo de busca.
* Array :  Array 1
* Boolean :  (strict) Se o terceiro parâmetro opcional strict for passado como TRUE então array_search() também fará uma checagem de tipos de needle em haystack.

> **Nota** Se needle for uma string, a comparação é feita de uma maneira que diferencia maiúsculas e minúsculas.

```php
$array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

$result = array_search('green', $array);
echo "<pre>";
print_r($result);
echo "</pre>";

$result = array_search('red', $array);
echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_shift

Retira o primeiro elemento de um array

**Params:**

* Array :  Array 1

```php
$cesta = array("laranja", "banana", "melancia", "morango");
$result = array_shift($cesta);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_slice

Extrai uma parcela de um array

**Params:**

* Array :  Array 1
* Integer :  Offset
* Integer :  Tamanho
* Boolean: Preservar index_key

```php
$input = array("a", "b", "c", "d", "e");

$result = array_slice($input, 2);      // returns "c", "d", and "e"
echo "<pre>";
print_r($result);
echo "</pre>";

$result = array_slice($input, -2, 1);  // returns "d"
echo "<pre>";
print_r($result);
echo "</pre>";

$result = array_slice($input, 0, 3);   // returns "a", "b", and "c"
echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_splice

Remove uma parcela do array e substitui com outros elementos

**Params:**

* Array :  Array 1
* Integer :  Offset
* Integer :  Tamanho
* Mixed: Se o array replacement for especificado, então os elementos removidos serão substituidos pelo elementos desse array.


```php

$input = array("red", "green", "blue", "yellow");
$result = array_splice($input, 2);
echo "<pre>";
print_r($result);
print_r($input);
echo "</pre>";
echo "<hr />";

$input = array("red", "green", "blue", "yellow");
$result = array_splice($input, 1, -1);
echo "<pre>";
print_r($result);
print_r($input);
echo "</pre>";
echo "<hr />";

$input = array("red", "green", "blue", "yellow");
$result = array_splice($input, 1, count($input), "orange");
echo "<pre>";
print_r($result);
print_r($input);
echo "</pre>";
echo "<hr />";

$input = array("red", "green", "blue", "yellow");
$result = array_splice($input, -1, 1, array("black", "maroon"));
echo "<pre>";
print_r($result);
print_r($input);
echo "</pre>";
echo "<hr />";

$input = array("red", "green", "blue", "yellow");
$result = array_splice($input, 3, 0, "purple");
echo "<pre>";
print_r($result);
print_r($input);
echo "</pre>";
echo "<hr />";
```

## array_sum

Calcula a soma dos elementos de um array

**Params:**

* Array :  Array

```php

$a = array(2, 4, 6, 8);
echo "soma(a) = ".array_sum($a)."\n";

```

## array_udiff_assoc

Computa a diferença entre arrays com checagem adicional de índice, compara dados por uma função de callback

**Params:**

* Array :  Array 1
* Array :  Array 2
* Callback: Função usada para Comparação de Dados

```php
class cr {
    private $priv_member;
    function cr($val)
    {
        $this->priv_member = $val;
    }

    static function comp_func_cr($a, $b)
    {
        if ($a->priv_member === $b->priv_member) return 0;
        return ($a->priv_member > $b->priv_member)? 1:-1;
    }
}

$a = array("0.1" => new cr(9), "0.5" => new cr(12), 0 => new cr(23), 1=> new cr(4), 2 => new cr(-15),);
$b = array("0.2" => new cr(9), "0.5" => new cr(22), 0 => new cr(3), 1=> new cr(4), 2 => new cr(-15),);

$result = array_udiff_assoc($a, $b, array("cr", "comp_func_cr"));

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_udiff_uassoc

Computa a diferença entre arrays com checagem adicional de índice, compara dados e índices por uma função de callback

**Params:**

* Array :  Array 1
* Array :  Array 2
* Callback: Função usada para Comparação de Dados
* Callback: Função usada para Comparação de Chaves

```php
class cr {
    private $priv_member;
    function cr($val)
    {
        $this->priv_member = $val;
    }

    static function comp_func_cr($a, $b)
    {
        if ($a->priv_member === $b->priv_member) return 0;
        return ($a->priv_member > $b->priv_member)? 1:-1;
    }

    static function comp_func_key($a, $b)
    {
        if ($a === $b) return 0;
        return ($a > $b)? 1:-1;
    }
}
$a = array("0.1" => new cr(9), "0.5" => new cr(12), 0 => new cr(23), 1=> new cr(4), 2 => new cr(-15),);
$b = array("0.2" => new cr(9), "0.5" => new cr(22), 0 => new cr(3), 1=> new cr(4), 2 => new cr(-15),);

$result = array_udiff_uassoc($a, $b, array("cr", "comp_func_cr"), array("cr", "comp_func_key"));
echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_udiff

Computa a diferença de arrays usando uma função de callback para comparação dos dados

**Params:**

* Array :  Array 1
* Array :  Array 2
* Callback: Função usada para Comparação de Dados


```php
class cr {
    private $priv_member;
    function cr($val)
    {
        $this->priv_member = $val;
    }

    static function comp_func_cr($a, $b)
    {
        if ($a->priv_member === $b->priv_member) return 0;
        return ($a->priv_member > $b->priv_member)? 1:-1;
    }
}
$a = array("0.1" => new cr(9), "0.5" => new cr(12), 0 => new cr(23), 1=> new cr(4), 2 => new cr(-15),);
$b = array("0.2" => new cr(9), "0.5" => new cr(22), 0 => new cr(3), 1=> new cr(4), 2 => new cr(-15),);

$result = array_udiff($a, $b, array("cr", "comp_func_cr"));
echo "<pre>";
print_r($result);
echo "</pre>";

```

## array_uintersect_assoc

Computa a interseção de arrays com checagem adicional de índice, compara os dados utilizando uma função de callback

**Params:**

* Array :  Array 1
* Array :  Array 2
* Callback: Função usada para Comparação

```php
$array1 = array("a" => "verde", "b" => "marrom", "c" => "azul", "vermelho");
$array2 = array("a" => "VERDE", "B" => "marrom", "amarelo", "vermelho");

$result = array_uintersect_assoc($array1, $array2, "strcasecmp");

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_uintersect_uassoc

Computa a interseção de arrays com checagem adicional de índice, compara os dados e os índices utilizando funções de callback separadas

**Params:**

* Array :  Array 1
* Array :  Array 2
* Callback: Função usada para Comparação de Dados
* Callback: Função usada para Comparação de Chaves

```php
$array1 = array("a" => "verde", "b" => "marrom", "c" => "azul", "vermelho");
$array2 = array("a" => "VERDE", "B" => "marrom", "amarelo", "vermelho");

$result = array_uintersect_uassoc($array1, $array2, "strcasecmp", "strcasecmp");

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_uintersect

Computa a interseção de array, comparando dados com uma função callback

**Params:**

* Array :  Array 1
* Array :  Array 2
* Callback: Função usada para Comparação

```php
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "GREEN", "B" => "brown", "yellow", "red");

$result = array_uintersect($array1, $array2, "strcasecmp");

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_unique

Remove o valores duplicados de um array

**Params:**

* Array :  Array

```php
$input = array("a" => "verde", "vermelho", "b" => "verde", "azul", "vermelho");
$result = array_unique($input);

echo "<pre>";
print_r($result);
echo "</pre>";
```

## array_unshift

Adiciona um ou mais elementos no início de um array

**Params:**

* Array :  Array
* Mixed :  Valores de entrada.
* Mixed :  ...N

```php
$cesta = array("laranja", "banana");
array_unshift($cesta, "melancia", "morango");

echo "<pre>";
print_r($cesta);
echo "</pre>";
```

## array_values

Retorna todos os valores de um array

**Params:**

* Array :  Array

```php
$array = array("tamanho" => "G", "cor" => "dourado");
print_r(array_values ($array));
```

## array_walk_recursive

Aplica um função do usuário recursivamente para cada membro de um array

**Params:**

* Array :  Array
* Callback : Função de Callback usada para Iterar
* Mixed : Dados adicionais como params

```php
$doce = array('a' => 'Maça', 'b' => 'Banana');
$fruta = array('doce' => $doce, 'azedo' => 'lemon');

function test_print($item, $key)
{
	echo "<pre>";
	print_r("$key -> $item");
	echo "</pre>";
}

array_walk_recursive($fruta, 'test_print');
```

## array_walk

Aplica uma determinada funcão em cada elemento de um array

**Params:**

* Array :  Array
* Callback : Função de Callback usada para Iterar

```php
$frutas = array("d" => "limao", "a" => "laranja", "b" => "banana", "c" => "melancia");

function test_alter(&$item1, $key, $prefix)
{
    $item1 = "$prefix: $item1";
}

function test_print($item, $key)
{
	echo "<pre>";
	print_r("$key -> $item");
	echo "</pre>";
}

echo "Antes ...:\n";
array_walk($frutas, 'test_print');

array_walk($frutas, 'test_alter', 'fruta');
echo "... e depois:\n";

array_walk($frutas, 'test_print');
```

## array

Cria um array

**Params:**

* Mixed :  Dados para o array

```php
$array = array();

echo "<pre>";
print_r($array);
echo "</pre>";
```

## arsort

Ordena um array em ordem descrescente mantendo a associação entre índices e valores

**Params:**

* Array :  Array

```php
$frutas = array("d" => "limao", "a" => "laranja", "b" => "banana", "c" => "melancia");
arsort($frutas);
foreach ($frutas as $chave => $valor) {
 	echo "<pre>";
	print_r("$chave -> $valor");
	echo "</pre>";
}
```

## asort

Ordena um array mantendo a associação entre índices e valores

**Params:**

* Array :  Array

```php
$frutas = array("d" => "limao", "a" => "laranja", "b" => "banana", "c" => "melancia");
asort($frutas);
foreach ($frutas as $chave => $valor) {
 	echo "<pre>";
	print_r("$chave -> $valor");
	echo "</pre>";
}
```

## compact

Cria um array contendo variáveis e seus valores

**Params:**

* Mixed :  Nomes de variáveis para o array

```php
$cidade = "Osasco";
$estado = "SP";
$evento = "PHP Conf";

$localidade = array("cidade", "estado");

$result = compact("evento", "nada_aqui", $localidade);
echo "<pre>";
print_r($result);
echo "</pre>";
```

## count

Conta o número de elementos de uma variável, ou propriedades de um objeto

## sizeof

Sinônimo de count

**Params:**

* Mixed : Geralmente Array

```php
$a[0] = 1;
$a[1] = 3;
$a[2] = 5;
$result = count($a);

echo "<pre>";
print_r($result);
echo "</pre>";
echo "<hr />";

$b[0] = 7;
$b[5] = 9;
$b[10] = 11;
$result = count($b);
echo "<pre>";
print_r($result);
echo "</pre>";
echo "<hr />";

$result = count(null);
echo "<pre>";
print_r($result);
echo "</pre>";
echo "<hr />";

$result = count(false);
echo "<pre>";
print_r($result);
echo "</pre>";
```

## current
Retorna o elemento corrente em um array
## pos
Sinônimo de current
## prev
Retrocede o ponteiro interno de um array
## next
Avança o ponteiro interno de um array
## end
Faz o ponteiro interno de um array apontar para o seu último elemento

**Params:**

* Mixed : Array

```php
$transport = array('foot', 'bike', 'car', 'plane');
$mode = current($transport);
echo "<pre>";
var_dump($mode);
echo "</pre>";
echo "<hr />";

$mode = next($transport);
echo "<pre>";
var_dump($mode);
echo "</pre>";
echo "<hr />";

$mode = current($transport);
echo "<pre>";
var_dump($mode);
echo "</pre>";
echo "<hr />";

$mode = prev($transport);    
echo "<pre>";
var_dump($mode);
echo "</pre>";
echo "<hr />";

$mode = end($transport);     
echo "<pre>";
var_dump($mode);
echo "</pre>";
echo "<hr />";

$mode = current($transport);
echo "<pre>";
var_dump($mode);
echo "</pre>";
echo "<hr />";

$arr = array();
echo "<pre>";
var_dump(current($arr));
echo "</pre>";
echo "<hr />";

$arr = array(array());
echo "<pre>";
var_dump(current($arr));
echo "</pre>";
echo "<hr />";
```

## each

Retorna o par chave/valor corrente de um array e avança o seu cursor

**Params:**

* Mixed : Array

```php
$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');
reset($fruit);
while (list($key, $val) = each($fruit)) {  
  echo "<pre>";
  print_r("$key --> $val");
  echo "</pre>";
}
```

## extract

Importa variáveis para a tabela de símbolos a partir de um array

**Params:**

* Mixed : Array
* Integer : Flag de modo de extract;
* String : Prefixo de extração

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

```php
$tamanho = "grande";
$var_array = array ("cor" => "azul",
                    "tamanho"  => "medio",
                    "forma" => "esfera");
extract ($var_array, EXTR_PREFIX_SAME, "wddx");

echo "$cor, $tamanho, $forma, $wddx_tamanho\n";
```

## in_array

Checa se um valor existe em um array

**Params:**

* Mixed : Valor a ser buscado
* Array : Array
* Boolean: Strict Se o terceiro parâmetro strict for TRUE então in_array() também irá checar os tipos

```php
$os = array("Mac", "Unix", "Freebsd", "Linux");

if (in_array("Linux", $os)) {
    echo "Tem Irix";
}

if (in_array("mac", $os)) {
    echo "Tem mac";
}
```

## key

Retorna uma chave de um array

**Params:**

* Array : Array

```php
$array = array(
    'fruit1' => 'apple',
    'fruit2' => 'orange',
    'fruit3' => 'grape',
    'fruit4' => 'apple',
    'fruit5' => 'apple');

while ($fruit_name = current($array)) {
    if ($fruit_name == 'apple') {
        echo key($array).'<br />';
    }
    next($array);
}
```

## krsort

Ordena um array pelas chaves em ordem descrescente

**Params:**

* Array : Array

```php
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
krsort($fruits);
foreach ($fruits as $key => $val) {
  echo "<pre>";
  print_r("$key --> $val");
  echo "</pre>";
}

```

## ksort

Ordena um array pelas chaves

**Params:**

* Array : Array

```php
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
ksort($fruits);
foreach ($fruits as $key => $val) {
  echo "<pre>";
  print_r("$key --> $val");
  echo "</pre>";
}
```

## list

Cria variáveis como se fossem arrays

**Params:**

* Mixed : Variável de saida
* Mixed : Variável de saida ...N

```php
$info = array('café', 'marrom', 'cafeína');

list($a[0], $a[1], $a[2]) = $info;

echo "<pre>";
print_r($a);
echo "</pre>";
```

## natcasesort

Ordena um array utilizando o algoritmo da "ordem natural" sem diferenciar maiúsculas e minúsculas

**Params:**

* Array : Array

```php
$array1 = $array2 = array('IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png');

sort($array1);
echo "Standard sorting\n";
echo "<pre>";
print_r($array1);
echo "</pre>";

natcasesort($array2);
echo "\nNatural order sorting (case-insensitive)\n";
echo "<pre>";
print_r($array2);
echo "</pre>";
```

## natsort

Ordena um array utilizando o algoritmo da "ordem natural"

**Params:**

* Array : Array


```php
$array1 = $array2 = array('IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png');

sort($array1);
echo "Standard sorting\n";
echo "<pre>";
print_r($array1);
echo "</pre>";

natsort($array2);
echo "\nNatural order sorting \n";
echo "<pre>";
print_r($array2);
echo "</pre>";
```

## range

Cria um array contendo uma faixa de elementos

**Params:**

* Mixed : Inicio
* Mixed : Fim
* Integer : Passo


```php
foreach (range(0, 12) as $number) {
  echo "<pre>";
  print_r($number);
  echo "</pre>";
}
```

## reset

Faz o ponteiro interno de um array apontar para o seu primeiro elemento

**Params:**

* Array : Array

```php
$array = array('primero passo', 'segundo passo', 'terceiro passo', 'quarto passo');  
echo current($array)."<br />\n";

next($array);  
next($array);  
echo current($array)."<br />\n";

reset($array);  
echo current($array)."<br />\n";
```

## rsort

Ordena um array em ordem descrescente

**Params:**

* Array : Array

```php
$frutas = array ("limao", "laranja", "banana", "maçã");
rsort ($frutas);
foreach( $frutas as $chave => $valor ){
  echo "<pre>";
  print_r("$chave => $valor");
  echo "</pre>";
}
```

## shuffle

Mistura os elementos de um array

**Params:**

* Array : Array

```php
$frutas = array ("limao", "laranja", "banana", "maçã");
shuffle ($frutas);
foreach( $frutas as $chave => $valor ){
  echo "<pre>";
  print_r("$chave => $valor");
  echo "</pre>";
}

echo "<br />";

shuffle ($frutas);
foreach( $frutas as $chave => $valor ){
  echo "<pre>";
  print_r("$chave => $valor");
  echo "</pre>";
}
```

## sort

Ordena um array

**Params:**

* Array : Array
* Integer : Flag de modo de ordenação

| Flag               | Descrição                                          |
|--------------------|----------------------------------------------------|
| SORT_REGULAR       | compara os itens normalmente (não modifica o tipo) |
| SORT_NUMERIC       | compara os items numericamente                     |
| SORT_STRING        | compara os itens como strings                      |
| SORT_LOCALE_STRING | compara os itens como strings, utilizando o locale atual. Utiliza o locale que pode ser modificado com setlocale() |
| SORT_NATURAL       | compara os itens como strings utilizando "ordenação natural" tipo natsort() |
| SORT_FLAG_CASE     | pode ser combinado (bitwise OR) com SORT_STRING ou SORT_NATURAL para ordenar strings sem considerar maiúsculas e minúsculas |

```php
$frutas = array("lemon", "orange", "banana", "apple");
sort($frutas);
foreach( $frutas as $chave => $valor ){
  echo "<pre>";
  print_r("$chave => $valor");
  echo "</pre>";
}

```

## uasort

Ordena um array utilizando uma função de comparação definida pelo usuário e mantendo as associações entre chaves e valores

```php
$array = array();
```

## uksort

Ordena um array pelas chaves utilizando uma função de comparação definida pelo usuário.

```php
$array = array();
```

## usort

Ordena um array pelos valores utilizando uma função de comparação definida pelo usuário

```php
$array = array();
```
