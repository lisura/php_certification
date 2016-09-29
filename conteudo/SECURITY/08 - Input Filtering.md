# Input Filtering

A maior fraqueza na maioria dos programas PHP não é inerente a linguagem em si, mas meramente um problema de código escrito desconsiderando a segurança.

Você sempre deve examinar cuidadosamente seu código para se assegurar que quaisquer variáveis sendo enviadas do navegador web estão sendo checadas de maneira correta

Considere desligar as diretivas register_globals, magic_quotes, ou outras configurações convenientes que pode confundir você em relação a validade, origem, ou valor de uma variável qualquer.

## Use UTF-8 unless necessary

_Attack vector_ é um caminho ou meio pelo quail um hacker ganha acesso ao computador ou rede a fim de carregar um resultado malicioso. _Attack vectors_ permite aos hackers explorar vulnerabilidades do sistema, incluindo o elemento humano.

Muitos _attack vectors_ contam com _encoding bypassing_. Esta tecnica de ataque consistem de encodar os paramentros da requisição do usuario, duas vezes em formato hexadecimal e com isso passar por cima dos contoles de segurança ou causar um comportamento indesejado da aplicação.

Para resolver este problema utlizize UTF-8 como charset padrão tanto da base de dados como da aplicação, a não ser que sera OBRIGATORIO o uso de outro encoding.

Exemplo de um codigo padrão:
><script>alert('XSS')</script>

Exemplo de um codigo com duplo encoding;
>%253Cscript%253Ealert('XSS')%253C%252Fscript%253E

## Filtro dos dados de entrada

Filtrar os dados de seus usuários é de extrema importância e que, ao chegar no sistema, eles estejam prontos para utilização.

| função | descrição |
| --- | --- |
| filter_var() | Filtra a variável com um especificado filtro |
| filter_var_array() | Obtêm múltiplas variáveis e opcionalmente as filtra |
| filter_input() | Obtem a específica variável externa pelo nome e opcionalmente a filtra |
| filter_input_array() | Obtem variáveis externas e opcionalmente as filtra |

Opções para Filter [LINK](http://php.net/manual/en/filter.filters.sanitize.php)

### filter_var

>mixed filter_var ( mixed $variable [, int $filter [, mixed $options ]] )

Filter: ID do filtro. O padrão é FILTER_SANITIZE_STRING.

Mixed: Array associativo de opções ou disjunção binário de flags.

Return: Retorna o dado filtrado, ou FALSE se o filtro falhar.

Exemplo:
```php
<?php
echo "<pre>";
var_dump(filter_var('backtothe@future.com', FILTER_VALIDATE_EMAIL));
var_dump(filter_var('http://www.backtothefuture.com', FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED));
var_dump(filter_var('backtothe@future', FILTER_VALIDATE_EMAIL));
var_dump(filter_var('backtothefuture.com', FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED));
// http://example.com/"><script>alert(document.cookie)</script>
```

### filter_var_array

Esta função é útil para receber muitos valores sem repetidamente chamar a função

>mixed filter_var_array ( array $data [, mixed $definition ] )

Return: Um array contendo valores das requisitadas variáveis em caso de sucesso, ou FALSE em falha. Um valor da array será FALSE se o filtro falhar, ou NULL se a variável não é definida.


```php
//corrigir este exemplo 

error_reporting(E_ALL | E_STRICT);
$data = array(
    'product_id'    => 'libgd<script>',
    'component'     => '10',
    'versions'      => '2.0.33',
    'testscalar'    => array('2', '23', '10', '12'),
    'testarray'     => '2',
);

$args = array(
    'product_id'   => FILTER_SANITIZE_ENCODED,
    'component'    => array('filter'    => FILTER_VALIDATE_INT,
                            'flags'     => FILTER_FORCE_ARRAY,
                            'options'   => array('min_range' => 1, 'max_range' => 10)
                           ),
    'versions'     => FILTER_SANITIZE_ENCODED,
    'doesnotexist' => FILTER_VALIDATE_INT,
    'testscalar'   => array(
                            'filter' => FILTER_VALIDATE_INT,
                            'flags'  => FILTER_REQUIRE_SCALAR,
                           ),
    'testarray'    => array(
                            'filter' => FILTER_VALIDATE_INT,
                            'flags'  => FILTER_FORCE_ARRAY,
                           )

);

$myinputs = filter_var_array($data, $args);

var_dump($myinputs);
echo "\n";
```

### filter_input

>mixed filter_input ( int $type , string $variable_name [, int $filter [, mixed $options ]] )

Type: INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, INPUT_ENV

Return: Valor da requisitada variável em caso de sucesso, FALSE se o filtro falhar, ou NULL se o parâmetro variable_name é um variável não definida

```php
<?php
//http://localhost/teste.php?name=<script>alert(document.cookie)</scrip
$search_html = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$search_url = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_ENCODED);
echo "<pre>";
print_r($search_html,1);
print_r($search_url,1);

<?php
//http://localhost/teste2.php?movie_number=6
$options=array('options'=>array('default'=>1, 'min_range'=>1, 'max_range'=>3));
$priority=filter_input(INPUT_GET, 'movie_number', FILTER_VALIDATE_INT, $options);
echo "<pre>";
print_r($priority);
```

### filter_input_array



CHARACTER SET
o
Risk:
- ATTACK VECTORS MAY EMPLOY A NON-STANDARD CHAR SET (EX: UTF-8
ENCODED) THAT MAY BE MISSED BY FILTERING, BUT EXECUTED BY THE
BROWSER
Counter
- USE THE SAME CHAR SET FOR FILTERING AS THE TARGET PROCEDURE
- CONVERT CHARSETS PRIOR TO FILTERING
Content-Type: text/html; charset="UTF-8"
- USE PHP’S FILTER EXTENSION
- USE FILTERS NATIVE TO THE DATABASE (EX: DB QUOTING FUNCTIONS)
