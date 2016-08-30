# DATA FORMATS AND TYPES - XML Parser

## Introdução

### Definição

XML (eXtensible Markup Language) é um formato de dados para intercâmbio de documentos na Web. Ele é um padrão definido pela The World Wide Web consortium (W3C). Os dados são organizados de forma hierárquica, independente de plataforma de hardware ou software.

### História

Em meados da década de 1990, o World Wide Web Consortium (W3C) começou a trabalhar em uma linguagem de marcação que combinasse a flexibilidade da SGML com a simplicidade da HTML. O princípio do projeto era criar uma linguagem que pudesse ser lida por software, e integrar-se com as demais linguagens. Sua filosofia seria incorporada por vários princípios importantes:
* Separação do conteúdo da formatação
* Simplicidade e legibilidade, tanto para humanos quanto para computadores
* Possibilidade de criação de tags sem limitação
* Criação de arquivos para validação de estrutura (chamados DTDs)
* Interligação de bancos de dados distintos
* Concentração na estrutura da informação, e não na sua aparência

### Exemplo

```xml
<?xml version="1.0" encoding="ISO-8859-1"?>
<videogame nome="SNES" ano_lancamento="1990" fabricante="Nintendo">
  <titulo>Super Nintendo Entertainment System</titulo>
  <jogos>
    <jogo desenvolvedora="Nintendo" ano="1990" genero="plataforma">Super Mario World</jogo>
    <jogo desenvolvedora="Kemco" ano="1991" genero="corrida">Top Gear</jogo>
    <jogo desenvolvedora="Square" ano="1992" genero="rpg">Final Fantasy V</jogo>
    <jogo desenvolvedora="Capcom" ano="1993" genero="luta">Mega Man X</jogo>
  </jogos>
  <curiosidades>
    <item>Sucessor do Nintendo Entertainment System (NES).</item>
    <item>Teve forte concorrência com o Mega Drive nos EUA.</item>
    <item>Foi lançado no Brasil em 1993 pela Playtronic.</item>
  </curiosidades>
</videogame >
```

## XML Parser

A extensão para XML do PHP foi baseada no **Expat** de autoria de James Clark ([http://www.libexpat.org/](http://www.libexpat.org/)). Lançado em 1998 e programado em C, foi o primeiro parser de XML open source, sendo assim utilizado em diversos projetos open source. Essa extensão requer que a extensão **libxml** esteja habilitada, embora essa extensão já venha habilitada por padrão. As funções da biblioteca expat também estão habilitadas por padrão.

Três encodings são suportados na versão do PHP: US-ASCII, ISO-8859-1 e UTF-8.

## Codificação

Há dois tipos de codificação de caracteres, **source encoding** e **target encoding**. A representação interna do documento no PHP é sempre codificada em UTF-8. 

**Source Encoding** ocorre quando um documento XML é analisado (xml_parse()). Ao criar um analisador (xml_parser_create()) é possível definir uma codificação de caracteres. Essa codificação não pode ser alterada durante a vida do analisador.

Das codificações disponíveis (ISO-8859-1, US-ASCII e UTF-8) os dois primeiros são codificações single-byte, onde cada caractere é representado por um byte simples. UTF-8 pode codificar caracteres compostos por um número de bits variável (acima de 21) em um de seus 4 bytes. A codificação padrão para source encoding no PHP é a ISO-8859-1.

Caso haja caracteres fora da codificação do source encoding, o Analisador XML retorna erro.

**Target Encoding** ocorre quando o PHP passa dados para as funções manipuladoras de XML. Nesse caso a codificação é a mesma definida no analisador XML para o source encoding, mas pode ser alterada a qualquer momento.

Caso haja caracteres fora da codificação do target encoding, o PHP irá substituir (demote) os caracteres problemáticos por interrogações (?).

## Manipuladores de eventos

Podemos definir para o analisador XML quais funções devem ser executadas ao encontrar determinados elementos no arquivo XML. Seguem abaixo os manipuladores suportados:

**xml_set_element_handler()**
Estes eventos são executados toda vez que o analisador XML encontra tags de abertura ou fechamento. Há manipuladores distintos para cada uma.

**xml_set_character_data_handler()**
Dados de caractere são todo o conteúdo non-markup, incluindo espaços entre as tags. O analisador não remove os espaços, deixando a critério da aplicação se os espaços são significativos ou não.

**xml_set_processing_instruction_handler()**
Programadores de PHP já estariam familiarizados com instruções de processo (PIs). <?php ?> é uma instrução de processo, onde php é o "PI target". Todos os PI targets iniciados com "XML" estão reservados.

**xml_set_default_handler()**
Caso aconteça algum evento desta lista e este não tenha nenhum manipulador declarado, este manipulador será executado.

**xml_set_unparsed_entity_decl_handler()**
Este manipulador será chamado por uma declaração de entidade externa não analisada (NDATA).

**xml_set_notation_decl_handler()**
Este manipulador é chamado pela declaração de uma notation.

**xml_set_external_entity_ref_handler()**
Este manipulador é chamado quando o analisador XML encontra uma referência para uma entidade geral analizada externamente. Isto pode ser uma referência para um arquivo ou URL. 


## Funções do XML Parser

### Funções básicas para análise

**xml_parser_create**

```php 
resource xml_parser_create ([ string $encoding ] )
```
 
Cria um novo analisador XML. O parametro encoding determina a codificação do output. A codificação do input é detectada automaticamente no PHP 5, enquanto que no PHP 4 as codificações de input e output são definidas pelo mesmo parametro. 

A codificação padrão de output no PHP 5.0.0 e 5.0.1 é o ISO-8859-1. A partir do PHP 5.0.2 passou a ser o UTF-8.

```php
<?php
$xmlparser = xml_parser_create(); //parser em UTF-8 no PHP 5.5

xml_parser_free($xmlparser);

$xmlparser = xml_parser_create("ISO-8859-1"); //parser agora em ISO-8859-1

xml_parser_free($xmlparser);
```

**xml_parse**

```php 
int xml_parse ( resource $parser , string $data [, bool $is_final = false ] )
```
 
Inicia a análise (parse) de um documento XML. Indicamos nesta função o analisador (parser), o dado de XML a ser analisado e o parametro opcional indicando que esta é a última parte dos dados a serem analisados pelo parser. Erros de entidade são reportados somente no final dos dados analisados, ou seja serão reportados apenas quando $is_final for igual a TRUE.

```php
<?php
$parser=xml_parser_create();

$fp=fopen("test.xml","r");

while ($data=fread($fp,4096))
{
  xml_parse($parser,$data,feof($fp));
}

xml_parser_free($parser);
```

**xml_parser_create_ns**

```php 
resource xml_parser_create_ns ([ string $encoding [, string $separator = ":" ]] )
```
 
Cria um novo analisador XML. A diferença é que neste caso o analisador possui suporte à namespace (xmlns).

```php
<?php
$xmlparser = xml_parser_create_ns(); //parser em UTF-8 no PHP 5.5, delimitando por ":"

xml_parser_free($xmlparser);

$xmlparser = xml_parser_create("ISO-8859-1","@"); //parser agora em ISO-8859-1, delimitando por "@"

xml_parser_free($xmlparser);
?>
```

**xml_parser_free**

```php 
bool xml_parser_free ( resource $parser )
```
 
Libera um analisador XML. Retorna TRUE em caso de sucesso ou FALSE caso a referência ao analisador não for válida.

```php
<?php
$xmlparser = xml_parser_create_ns(); //parser em UTF-8 no PHP 5.5, delimitando por ":"

xml_parser_free($xmlparser);
?>
```

**xml_set_element_handler**

```php 
bool xml_set_element_handler ( resource $parser , callable $start_element_handler , callable $end_element_handler )
```

Define as funções que serão executadas ao encontrar as tags de abertura e fechamento pelo analisador XML. Retorna TRUE em sucesso, FALSE em falha.
A função para a tag de abertura deve conter a seguinte estrutura:

```php
start_element_handler ( resource $parser , string $name , array $attribs )
```
Onde $name é o nome do elemento, e $attribs é uma array contendo todos os atributos daquele elemento.

A função para a tag de fechamento deve conter a seguinte estrutura:

```php
end_element_handler ( resource $parser , string $name )
```
Onde $name é o nome do elemento.

> Nota: Os nomes dos elementos e as chaves dos atributos estão em maiúsculo por causa do **case_folded** que está ativado por padrão no analisador XML. Com isso, os nomes estarão sempre em maiúsculo. Isso pode ser desativado através da função xml_parser_set_option() que veremos mais adiante.


**xml_set_character_data_handler**

```php 
bool xml_set_character_data_handler ( resource $parser , callable $handler )
```
 
Define a função que será executada ao encontrar um caractere no XML. Retorna TRUE em sucesso, FALSE em falha.
A função deve conter a seguinte estrutura:

```php
handler ( resource $parser , string $data )
```

**xml_parser_set_option**

```php 
bool xml_parser_set_option ( resource $parser , int $option , mixed $value )
```
 
Define uma opção de um analisador XML. Retorna TRUE em sucesso, FALSE em falha.

|Opção                     |Tipo                    |Descrição                                                                             |
|--------------------------|------------------------|--------------------------------------------------------------------------------------|
|XML_OPTION_CASE_FOLDING   |Integer                 |Controla se case-folding está habilitado para este analisador XML. Ativado por padrão. (1=TRUE, 0=FALSE)|
|XML_OPTION_SKIP_TAGSTART  |Integer                 |Especifica quantos caracteres devem ser ignorados no início do nome de uma tag.       |
|XML_OPTION_SKIP_WHITE     |Integer                 |Se irá pular valores constituídos por espaços em branco. (1=TRUE, 0=FALSE)            |
|XML_OPTION_TARGET_ENCODING|String                  |Define qual codificação será usada neste analisador XML. Por pradrão, é definido com a mesma codificação usada pelo xml_parser_create(). Codificações suportadas são ISO-8859-1, US-ASCII e UTF-8.|

**xml_parser_get_option**

```php 
mixed xml_parser_get_option ( resource $parser , int $option )
```
 
Recupera o valor de uma opção de um analisador XML. Retorna o valor da opção em sucesso, FALSE em falha.


EXERCÍCIOS: [LINK1](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/xml_parse.php), [LINK2](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/xml_parse_ns.php) e [LINK3](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/xml_parse_opt.php)

### Tratamento de erros e localização do analisador

**xml_get_current_byte_index**

```php 
int xml_get_current_byte_index ( resource $parser )
```

Retorna o índice atual de byte do analisador XML, ou FALSE em caso de erro/falha.

> Nota: Esta função retorna o indíce de acordo com o texto em codificação UTF-8, independente da codificação do texto de input.

**xml_get_current_column_number**

```php 
int xml_get_current_column_number ( resource $parser )
```

Retorna o número da coluna onde o analisador XML se encontra, ou FALSE em caso de erro/falha.

**xml_get_current_line_number**

```php 
int xml_get_current_line_number ( resource $parser )
```

Retorna o número da linha onde o analisador XML se encontra, ou FALSE em caso de erro/falha.

**xml_get_error_code**

```php 
int xml_get_error_code ( resource $parser )
```

Retorna o código do erro encontrada pelo analisador XML, ou FALSE em caso de erro/falha.

**xml_error_string**

```php
string xml_error_string ( int $code )
```

Retorna a descrição do erro encontrada pelo analisador XML, ou FALSE em caso de erro/falha.

```php
<?php
//invalid xml file
$xmlfile = 'test.xml';

$xmlparser = xml_parser_create();

// open a file and read data
$fp = fopen($xmlfile, 'r');
while ($xmldata = fread($fp, 4096))
  {
  // parse the data chunk
  if (!xml_parse($xmlparser,$xmldata,feof($fp)))
    {
    die( print "ERROR: "
    . xml_error_string(xml_get_error_code($xmlparser))
    . "<br />"
    . "Line: "
    . xml_get_current_line_number($xmlparser)
    . "<br />"
    . "Column: "
    . xml_get_current_column_number($xmlparser)
    . "<br />");
    }
  }

xml_parser_free($xmlparser);
```

EXERCÍCIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/xml_parse_error.php)

### Arrays e Objetos

**xml_parse_into_struct**

```php
int xml_parse_into_struct ( resource $parser , string $data , array &$values [, array &$index ] )
```

Esta função analisa os dados, armazenando-os em duas arrays paralelas, uma com os valores e outra opcional contendo os indicadores para os valores da primeira array.

> Nota: O retorno é 0 para falha e 1 para sucesso, mas não pode ser considerado como FALSE ou TRUE ao fazer comparações idênticas (=== ou !==)

**xml_set_object**

```php
bool xml_set_object ( resource $parser , object &$object )
```

Permite usar o analisador XML em um objeto. Retorna TRUE como sucesso, ou FALSE como falha.

EXERCÍCIOS: [LINK1](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/xml_parse_opt2.php) e [LINK2](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/xml_parse_obj.php)

### Manipuladores de Eventos

> Para todas as funções de manipuladores de evento, caso uma função seja passada como uma string vazia, o manipulador é desabilitado para aquele evento.

**xml_set_default_handler**

```php
bool xml_set_default_handler ( resource $parser , callable $handler )
```

Define o manipulador padrão para o analisador XML. Retorna TRUE em sucesso e FALSE em falha.
A função manipuladora deve conter a seguinte estrutura:

```php
handler ( resource $parser , string $data )
```
Onde $data contém os dados de caractere, que pode ser a declaração XML, a declaração do tipo de documento, entidades ou qualquer dado que não possua um manipulador definido.

**xml_set_start_namespace_decl_handler / xml_set_end_namespace_decl_handler**

```php
bool xml_set_start_namespace_decl_handler ( resource $parser , callable $handler )
bool xml_set_end_namespace_decl_handler ( resource $parser , callable $handler )
```

Define o manipulador a ser executado quando abre/fecha uma tag contendo uma declaração namespace.
A função manipuladora deve conter a seguinte estrutura:

```php
handler ( resource $parser , string $prefix , string $uri ) //start
handler ( resource $parser , string $prefix ) //end
```
Onde $prefix é o prefixo do namespace, e $uri o significado.

> Nota: essas funções não funcionam pelo Libxml [(https://bugs.php.net/bug.php?id=30834)](https://bugs.php.net/bug.php?id=30834)

**xml_set_external_entity_ref_handler**

```php
bool xml_set_external_entity_ref_handler ( resource $parser , callable $handler )
```

Define o manipulador a ser executado quando o analisador encontra referência para entidade externa. Retorna TRUE em sucesso e FALSE em falha.
<!ENTITY name SYSTEM "URI"><!ENTITY name PUBLIC "public_ID" "URI">
A função manipuladora deve conter a seguinte estrutura:

```php
handler ( resource $parser , string $open_entity_names , string $base , string $system_id , string $public_id )
```
Onde $open_entity_names contém os nomes das entidades separadas por espaço. $base especifica a base para resolução do ID do sistema (system_id) da entidade externa, mas atualmente, é sempre NULL. $system_id é a referência do ID do sistema (SYSTEM), e $public_id é o ID público (PUBLIC)

**xml_set_notation_decl_handler**

```php
bool xml_set_notation_decl_handler ( resource $parser , callable $handler )
```

Define o manipulador a ser executado quando o analisador uma anotação (notation). Retorna TRUE em sucesso e FALSE em falha.
<!NOTATION name SYSTEM "URI"><!NOTATION name PUBLIC "public_ID"><!NOTATION name PUBLIC "public_ID" "URI">
A função manipuladora deve conter a seguinte estrutura:

```php
handler ( resource $parser , string $notation_name , string $base , string $system_id , string $public_id )
```
Onde $notation_name contém o nome da notation. $base especifica a base para resolução do ID do sistema (system_id) da entidade externa, mas atualmente, é sempre NULL. $system_id é a referência do ID do sistema (SYSTEM), e $public_id é o ID público (PUBLIC)

**xml_set_processing_instruction_handler**

```php
bool xml_set_processing_instruction_handler ( resource $parser , callable $handler )
```

Define o manipulador para Instruções de Processamento (PI). Retorna TRUE em sucesso e FALSE em falha.
Uma instrução de processamento possui a seguinte estrutura, podendo incluir também código PHP:
<?
target data
?>
No código abaixo, a PI indica que o arquivo especificado deve ser associado ao documento XML:
<?xml-stylesheet href="default.xls" type="text/xml"?>
A função manipuladora deve conter a seguinte estrutura:

```php
handler ( resource $parser , string $target , string $data )
```
Onde $target contém o alvo (target) da PI, e $data contém os dados da PI.

**xml_set_unparsed_entity_decl_handler**

```php
bool xml_set_unparsed_entity_decl_handler ( resource $parser , callable $handler )
```

Define o manipulador a ser executado quando o analisador encontra declaração de entidade não analisada (unparsed). Retorna TRUE em sucesso e FALSE em falha.
Uma entidade não analisada geralmente se refere a dados não-XML. Possui a seguinte estrutura:
<!ENTITY <parameter>name</parameter> {<parameter>publicId</parameter> | <parameter>systemId</parameter>} NDATA <parameter>notationName</parameter>
A função manipuladora deve conter a seguinte estrutura:

```php
handler ( resource $parser , string $entity_name , string $base , string $system_id , string $public_id , string $notation_name )
```
Onde $entity_name contém o nome da entidade. $base especifica a base para resolução do ID do sistema (system_id) da entidade externa, mas atualmente, é sempre NULL. $system_id é a referência do ID do sistema (SYSTEM), e $public_id é o ID público (PUBLIC). Por fim, $notation_name se refere à notação da entidade

EXERCÍCIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/xml_events.php)

### Codificação

**utf8_decode / utf8_encode**

```php 
string utf8_decode ( string $data )
string utf8_encode ( string $data )
```

Decodifica de UTF8 para ISO-8859-1 / codifica de ISO-8859-1 para UTF8. Retorna a string convertida ou FALSE em caso de erro/falha.

```php
<?php
$str = 'abãéí';

echo utf8_decode($str);
echo utf8_encode($str);
```

> Nota: Além dessas funções, temos xml_parser_set_option(XML_OPTION_TARGET_ENCODING) para lidar com codificação do target encoding

## Constantes Pre-definidas

```php
XML_ERROR_NONE (integer)
XML_ERROR_NO_MEMORY (integer)
XML_ERROR_SYNTAX (integer)
XML_ERROR_NO_ELEMENTS (integer)
XML_ERROR_INVALID_TOKEN (integer)
XML_ERROR_UNCLOSED_TOKEN (integer)
XML_ERROR_PARTIAL_CHAR (integer)
XML_ERROR_TAG_MISMATCH (integer)
XML_ERROR_DUPLICATE_ATTRIBUTE (integer)
XML_ERROR_JUNK_AFTER_DOC_ELEMENT (integer)
XML_ERROR_PARAM_ENTITY_REF (integer)
XML_ERROR_UNDEFINED_ENTITY (integer)
XML_ERROR_RECURSIVE_ENTITY_REF (integer)
XML_ERROR_ASYNC_ENTITY (integer)
XML_ERROR_BAD_CHAR_REF (integer)
XML_ERROR_BINARY_ENTITY_REF (integer)
XML_ERROR_ATTRIBUTE_EXTERNAL_ENTITY_REF (integer)
XML_ERROR_MISPLACED_XML_PI (integer)
XML_ERROR_UNKNOWN_ENCODING (integer)
XML_ERROR_INCORRECT_ENCODING (integer)
XML_ERROR_UNCLOSED_CDATA_SECTION (integer)
XML_ERROR_EXTERNAL_ENTITY_HANDLING (integer)

XML_OPTION_CASE_FOLDING (integer)
XML_OPTION_TARGET_ENCODING (integer)
XML_OPTION_SKIP_TAGSTART (integer)
XML_OPTION_SKIP_WHITE (integer)
```