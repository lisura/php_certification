# DATA FORMATS AND TYPES - JSON & AJAX

## JSON

Javascript Object Notation, é uma estrutura de dados bastante popular por ser mais leve e não ter marcação verbosa como o XML. 
A decodificação no PHP é feita por um parser baseado no JSON_checker de Douglas Crockford. É uma extensão PECL que passou a ser compilada por padrão a partir da versão 5.2.0

> Nota: O PHP implementa uma extensão do JSON além do especificado no RFC 4627 - podendo também codificar e decodificar tipos escalares e NULL. A RFC 4627 apenas suporta esses valores quando eles estão inseridos dentro de um objeto ou array. Ou seja, embora esteja de acordo com a nova RFC 7159 (que pretende susceder a RFC 4627), a implementação no PHP pode causar problemas de compatibilidade com parsers de JSON que sejam restritos a RFC 4627.

## Funções

Temos o json_encode para converter variáveis PHP em JSON.

```php
string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] )
```
Onde $value é o dado a ser convertido. $options pode ser uma das constantes de bitmask. $depth determina a profundidade máxima de níveis para conversão.

```PHP
<?php
$arr = array('a' => 'foo', 'b' => 'bar', 'c' => 1, 'd' => 2, 'e' => 3);
echo json_encode($arr); //{"a":"foo","b":"bar","c":1,"d":2,"e":3}
```
EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/json/json_ex1.php)

Já json_decode converte uma string JSON em uma variável PHP

```PHP
mixed json_decode ( string $json [, bool $assoc ] )
```
Onde $json é a string JSON a ser convertida. $assoc indica que o retorno será um array associativo caso seja TRUE, do contrário devolve um objeto.

```PHP
$json = '{"foo-bar": 12345}';

$obj = json_decode($json);
print $obj->{'foo-bar'}; // 12345
```
EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/json/json_ex2.php)

Por fim temos as seguintes funções para tratamento de erros:
```php
int json_last_error ( void )
string json_last_error_msg ( void )
```
Retornando o código e a descrição do erro.

## Constantes

As seguintes constantes indicam o tipo de erro retornado pela função json_last_error().

**JSON_ERROR_NONE (integer)**
* Sem erros.

**JSON_ERROR_DEPTH (integer)**
* O limite de pilha de chamadas foi ultrapassado

**JSON_ERROR_STATE_MISMATCH (integer)**
* Ocorre em underflows ou com incongruência de modos.

**JSON_ERROR_CTRL_CHAR (integer)**
* Erro em caracter de controle, possivelmente erro de enconding.

**JSON_ERROR_SYNTAX (integer)**
* Erro de sintaxe.

**JSON_ERROR_UTF8 (integer)**
* Caracteres UTF-8 mal formados, possivelmente erro de enconding.

**JSON_ERROR_RECURSION (integer)**
* O objeto ou array passado para json_encode() inclui referências recursivas, e não pode ser formatada. Se a opção JSON_PARTIAL_OUTPUT_ON_ERROR foi informada, NULL será substituido no lugar da referência recursiva.

**JSON_ERROR_INF_OR_NAN (integer)**
* Um valor passado para json_encode() inclui NAN ou INF. Se a opção JSON_PARTIAL_OUTPUT_ON_ERROR foi informada, 0 será substituído no lugar do número especial.

**JSON_ERROR_UNSUPPORTED_TYPE (integer)**
* Um valor de um tipo não suportado foi informado para json_encode(), por exemplo um resource. Se a opção JSON_PARTIAL_OUTPUT_ON_ERROR foi informada, NULL será substitui ao invés do valor não suportado.

---
As seguintes constantes podem ser combinadas para formar opções para a função json_encode().

**JSON_HEX_TAG (integer)**
* Todos os caracteres < e > serão convertidos para \u003C and \u003E.

**JSON_HEX_AMP (integer)**
* Todos os caracteres & serão convertidos para \u0026.

**JSON_HEX_APOS (integer)**
* Todos os caracteres ' serão convertidos para \u0027.

**JSON_HEX_QUOT (integer)**
* Todos os caracteres " serão convertidos para \u0022.

**JSON_FORCE_OBJECT (integer)**
* Imprime um objeto em vez de um array quando um array não recursivo é usado. Muito útil quando o chamador espera um objeto mas o array está vazio.

**JSON_NUMERIC_CHECK (integer)**
* Codifica strings numéricas como números.

**JSON_BIGINT_AS_STRING (integer)**
* Codifica números grandes como seu valor string original.

**JSON_PRETTY_PRINT (integer)**
* Formata os dados retornados com espaços em branco.

**JSON_UNESCAPED_SLASHES (integer)**
* Não escapa o caracter /.

**JSON_UNESCAPED_UNICODE (integer)**
* Codifica caracteres Unicode multibyte literalmente (default é formatar como \uXXXX).

**JSON_PARTIAL_OUTPUT_ON_ERROR (integer)**
* Substitui valores não identificados ao invés de falhar.