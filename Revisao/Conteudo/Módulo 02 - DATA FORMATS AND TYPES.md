# Revisão sobre Data Formats and Types

## XML Parser

XML (eXtensible Markup Language) é um formato de dados para intercâmbio de documentos na Web. Os dados são organizados de forma hierárquica, independente de plataforma de hardware ou software.

A extensão para XML do PHP foi baseada no Expat. Essa extensão requer que a extensão **libxml** esteja habilitada, embora essa extensão e suas funções já venham habilitada por padrão.

A extensão permite parse de XML, mas não validação. Suporta as seguintes codificações: US-ASCII, ISO-8859-1 and UTF-8. UTF-16 não é suportado.

Exemplo de um XML:
```XML
<?xml version="1.0" encoding="ISO-8859-1"?>
<videogame nome="SNES" ano_lancamento="1990" fabricante="Nintendo">
  <titulo>Super Nintendo Entertainment System</titulo>
  <jogos>
    <jogo desenvolvedora="Nintendo" ano="1990" genero="plataforma">Super Mario World</jogo>
    <jogo desenvolvedora="Kemco" ano="1991" genero="corrida">Top Gear</jogo>
  </jogos>
</videogame >
```

### Codificação

Há dois tipos de codificação de caracteres:
- source encoding (ocorre quando um documento XML é analisado)
- target encoding (orre quando o PHP passa dados para as funções manipuladoras de XML).

A representação interna do documento no PHP é sempre codificada em UTF-8. O  source encoding padrão utilizado pelo PHP é o ISO-8859-1.

### Manipuladores de eventos

São executadas ao encontrar determinados elementos no arquivo   XML.

Manipuladores:
xml_set_element_handler() - Abertura ou fechamento.
xml_set_character_data_handler() - Dados de caractere.
xml_set_processing_instruction_handler() - PI targets iniciados   com "XML".
xml_set_default_handler() - Caso aconteça algum evento fora da   lista.
xml_set_unparsed_entity_decl_handler() - Entidade externa não   analisada (NDATA).
xml_set_notation_decl_handler() - Este manipulador é chamado pela   declaração de uma notation.
xml_set_external_entity_ref_handler() - Referência para um   arquivo ou URL.

### Funções do XML Parser

Somente para efeitos demosntrativos. Esta lista foi retirada da documentação do PHP.

utf8_decode — Converts a string with ISO-8859-1 characters encoded with UTF-8 to single-byte ISO-8859-1
utf8_encode — Encodes an ISO-8859-1 string to UTF-8
xml_error_string — Get XML parser error string
xml_get_current_byte_index — Get current byte index for an XML parser
xml_get_current_column_number — Get current column number for an XML parser
xml_get_current_line_number — Get current line number for an XML parser
xml_get_error_code — Get XML parser error code
xml_parse_into_struct — Parse XML data into an array structur
xml_parse — Start parsing an XML document
xml_parser_create_ns — Create an XML parser with namespace support
xml_parser_create — Create an XML parser
xml_parser_free — Free an XML parser
xml_parser_get_option — Get options from an XML parser
xml_parser_set_option — Set options in an XML parser
xml_set_character_data_handler — Set up character data handler
xml_set_default_handler — Set up default handler
xml_set_element_handler — Set up start and end element handlers
xml_set_end_namespace_decl_handler — Set up end namespace declaration handler
xml_set_external_entity_ref_handler — Set up external entity reference handler
xml_set_notation_decl_handler — Set up notation declaration handler
xml_set_object — Use XML Parser within an object
xml_set_processing_instruction_handler — Set up processing instruction (PI) handler
xml_set_start_namespace_decl_handler — Set up start namespace declaration handler
xml_set_unparsed_entity_decl_handler — Set up unparsed entity declaration handler

### DOM (Document Object Model)

DOM API é uma interface para lidar com documentos XML, HTML e SVG. A API define uma representação da estrutura do documento, bem como as formas de se manipular esta estrutura. A extensão DOM permite manipular XML através da DOM API com PHP 5.

Requer que a extensão **libxml** esteja habilitada, bem como a Expat para algumas funcionalidades.


## SimpleXML e DOM

O SimpleXML é uma extensão que permite ter o acesso e a manipulação de dados XML de forma mais simples, através da orientação à objetos.

Por exemplo:
```PHP
<?php
$xmlstr = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<videogame nome="SNES" ano_lancamento="1990" fabricante="Nintendo">
  <titulo>Super Nintendo Entertainment System</titulo>
  <jogos>
    <jogo desenvolvedora="Nintendo" ano="1990" genero="plataforma">Super Mario World</jogo>
    <jogo desenvolvedora="Kemco" ano="1991" genero="corrida">Top Gear</jogo>
  </jogos>
</videogame >
XML;
$videogame = new SimpleXMLElement($xmlstr);
echo $videogame->jogos->jogo[0];
```

### Funções do SimpleXML

simplexml_import_dom — Get a SimpleXMLElement object from a DOM node.
simplexml_load_file — Interprets an XML file into an object
simplexml_load_string — Interprets a string of XML into an object

O retorno destas funções é o próprio elemento SimpleXML, ou FALSE em caso de erro.

Mais detalhes destas funções podem ser encontrados na documentação do PHP.

### Métodos e propriedades do Objeto SimpleXML

SimpleXMLElement::addAttribute — Adds an attribute to the SimpleXML element
SimpleXMLElement::addChild — Adds a child element to the XML node
SimpleXMLElement::asXML — Return a well-formed XML string based on SimpleXML element
SimpleXMLElement::attributes — Identifies an element's attributes
SimpleXMLElement::children — Finds children of given node
SimpleXMLElement::\__construct — Creates a new SimpleXMLElement object
SimpleXMLElement::count — Counts the children of an element
SimpleXMLElement::getDocNamespaces — Returns namespaces declared in document
SimpleXMLElement::getName — Gets the name of the XML element
SimpleXMLElement::getNamespaces — Returns namespaces used in document
SimpleXMLElement::registerXPathNamespace — Creates a prefix/ns context for the next XPath query
SimpleXMLElement::saveXML — Alias of SimpleXMLElement::asXML
SimpleXMLElement::\__toString — Returns the string content
SimpleXMLElement::xpath — Runs XPath query on XML data

### DOM (Document Object Model)

DOM API é uma interface para lidar com documentos XML, HTML e SVG. A extensão DOM permite manipular XML através da DOM API com PHP 5. Essa API possui várias classes, no entanto nos focaremos apenas em DOMDocument, por ser a representação do documento XML.

>Nota: Esta extensão trabalha apenas com UTF-8. É preciso usar utf8_encode e utf8_decode para manipular dados codificados em ISO-8859-1, ou iconv para lidar com outras codificações.

#### Carregando documentos DOMDocument

```PHP
<?php
$load = new DOMDocument();
$load->load('xml_file.xml'); //carrega arquivo XML
$load->loadXML('<tag atrib="val">texto</tag>'); //carrega texto XML
$load->loadHTMLFILE('html_file.html'); //carrega arquivo HTML
$load->loadHTML('<html><head></head><body>texto</body></html>'); //carrega texto HTML
```

#### Funçõe DOMDocument

Estas funções foram retiradas da classe DOMDocument da documentação do PHP.

public DOMNode appendChild ( DOMNode $newnode )  
public string C14N ([ bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] )  
public int C14NFile ( string $uri [, bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] )  
public DOMNode cloneNode ([ bool $deep ] )  
public int getLineNo ( void )  
public string getNodePath ( void )  
public bool hasAttributes ( void )  
public bool hasChildNodes ( void )  
public DOMNode insertBefore ( DOMNode $newnode [, DOMNode $refnode ] )  
public bool isDefaultNamespace ( string $namespaceURI )  
public bool isSameNode ( DOMNode $node )  
public bool isSupported ( string $feature , string $version )  
public string lookupNamespaceURI ( string $prefix )  
public string lookupPrefix ( string $namespaceURI )  
public void normalize ( void )  
public DOMNode removeChild ( DOMNode $oldnode )  
public DOMNode replaceChild ( DOMNode $newnode , DOMNode $oldnode )  


### SimpleXML e DOM

No PHP podemos trabalhar com SimpleXML ou com DOM. Ainda podemos efetuar conversões entre estes dois métodos através das seguintes funções:

SimpleXMLElement simplexml_import_dom
DOMElement dom_import_simplexml

O retorno destas funções é o próprio elemento SimpleXML ou DOM, ou FALSE em caso de erro.

## SOAP e REST

### SOAP

Simple Object Access Protocol, protocolo de mensagem que permite a comunicação entre aplicações independente do sistema operacional ou da linguagem de programação empregada. Se baseia no HTTP e no XML. Através do WSDL (Web Service Description Language) o SOAP descreve seus serviços.

Também requer que a **libxml** esteja habilitada no PHP para ser utilizado, além da configuração _--enable-soap_.

#### Funções e Classes SOAP

Para consumir um serviço SOAP, basta criar uma instancia de SoapClient.

Exemplo:
```PHP
public SoapClient::SoapClient ( mixed $wsdl [, array $options ] )
```

Para verificar quais métodos posso utilizar, basta usar o método _\__getFunctions_.

Exemplo:
```PHP
$client = new SoapClient('http://soap.amazon.com/schemas3/AmazonWebServices.wsdl');
var_dump($client->__getFunctions());
```

Caso queiramos criar um serviço SOAP em PHP para ser consumido por qualquer outro sistema ou linguagem, basta usarmos a classe SoapServer.

```PHP
public SoapServer::SoapServer ( mixed $wsdl [, array $options ] )
```

Onde $wsdl é a URI do arquivo WSDL, ou null caso o modo seja non-WSDL. O segundo parâmetro pode ser usado para setar diversas opções no server.


>**Para tratamento de erros, podemos usar as seguintes funções:**
bool is_soap_fault ( mixed $object )
bool use_soap_error_handler ([ bool $handler = true ] )


### REST

Representational State Transfer, outra forma de consumo de serviços WEB.
Diferente do SOAP, o REST não usa um protocolo próprio, mas se vale de verbos HTTP para transmitir mensagens.

#### Verbos HTTP do REST

GET - Leitura de registros do serviço
POST - Criação de um novo recurso no serviço oferecido
PUT - Atualiza um registro existente.
PATCH - Atualiza apenas parte do recurso oferecido pelo serviço
DELETE - Remove registros do serviço fornecido

#### Headers

Requisição: Content-Type, o que está sendo enviado, o tipo MIME do conteúdo.
Resposta: Accept, o que é esperado na resposta.

#### Context Switching

Trata-se de uma forma de prover um output diferente do esperado, baseando-se nos critérios enviados na requisição.

#### REST & PHP

Os parâmetros enviados por GET e POST são facilmente capturados no PHP nativo.

```PHP
$param = $_GET['param'];
$param = $_POST['param'];
```

Para ver informações diferentes de GET e POST (PUT por exemplo) é um pouco mais complicado, requerendo o acesso por streams.

```PHP
//rest.php
print file_get_contents('php://input');
```

### Código de Status no Retorno HTTP

2xx - Sucesso
3xx - Redirecionamento
4xx - Erro no cliente
5xx - Erro de servidor

## JSON e  AJAX

### JSON

Javascript Object Notation, é uma estrutura de dados bastante popular por ser mais leve e não ter marcação verbosa como o XML. PHP 7 vem com um novo e melhorado parser escrito especificamente para o PHP, já incluso no core.

#### Funções

```
string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] )
mixed json_decode ( string $json [, bool $assoc ] )
```

>**funções para tratamento de erros:**
int json_last_error ( void )
string json_last_error_msg ( void )

## Date e Time

As funções de Data e Hora do PHP permitem recuperar a data e a hora do servidor onde o PHP está sendo executado.

As informações de data e hora são armazenadas internamente como números em 64-bit, sendo assim, todas as datas concebíveis (inclusive anos negativos) são suportadas.


### Função date

```php
string date ( string $format [, int $timestamp ] )
```

>Nota: para os formatos possiveis, olhar documentação da aula.

### Classe DateTime

Esta classe é uma forma de representar e manipular datas de forma orientada a objetos.

Fornece alguns tipos de datas padrão para serem usados como constantes  
DateTime::ATOM DATE_ATOM ->Atom (exemplo: 2005-08-15T15:52:01+00:00)  
DateTime::COOKIE DATE_COOKIE ->Cookies HTTP (exemplo: Monday, 15-Aug-2005 15:52:01 UTC)  
DateTime::ISO8601 DATE_ISO8601 ->ISO-8601 (exemplo: 2005-08-15T15:52:01+0000)  
DateTime::RFC822 DATE_RFC822 ->RFC 822 (exemplo: Mon, 15 Aug 05 15:52:01 +0000)  
DateTime::RFC850 DATE_RFC850 ->RFC 850 (exemplo: Monday, 15-Aug-05 15:52:01 UTC)  
DateTime::RFC1036 DATE_RFC1036 ->RFC 1036 (exemplo: Mon, 15 Aug 05 15:52:01 +0000)  
DateTime::RFC1123 DATE_RFC1123 ->RFC 1123 (exemplo: Mon, 15 Aug 2005 15:52:01 +0000)  
DateTime::RFC2822 DATE_RFC2822 ->RFC 2822 (exemplo: Mon, 15 Aug 2005 15:52:01 +0000)  
DateTime::RFC3339 DATE_RFC3339 ->Same as DATE_ATOM (since PHP 5.1.3)  
DateTime::RSS DATE_RSS ->RSS (exemplo: Mon, 15 Aug 2005 15:52:01 +0000)  
DateTime::W3C DATE_W3C ->World Wide Web Consortium (exemplo: 2005-08-15T15:52:01+00:00)  

Uma instância de DateTime pode ser iniciada das duas formas:

```php
<?php
public DateTime::__construct ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] ) //Orientado a Objeto
DateTime date_create ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] ) //Procedural
```

### Metodos da classe DateTime

public DateTime add ( DateInterval $interval )  
public static DateTime createFromFormat ( string $format , string $time [, DateTimeZone $timezone =   date_default_timezone_get() ] )  
public static array getLastErrors ( void )  
public DateTime modify ( string $modify )  
public static DateTime \__set_state ( array $array )  
public DateTime setDate ( int $year , int $month , int $day )  
public DateTime setISODate ( int $year , int $week [, int $day = 1 ] )  
public DateTime setTime ( int $hour , int $minute [, int $second = 0 ] )  
public DateTime setTimestamp ( int $unixtimestamp )  
public DateTime setTimezone ( DateTimeZone $timezone )  
public DateTime sub ( DateInterval $interval )  
public DateInterval diff ( DateTimeInterface $datetime2 [, bool $absolute = false ] )  
public string format ( string $format )  
public int getOffset ( void )  
public int getTimestamp ( void )  
public DateTimeZone getTimezone ( void )  


#### Diferenças

```php
<?php
//Orientado a Objeto
try {
    $date = new DateTime('2016-01-11');
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}
echo $date->format('Y-m-d');

//Procedural
$date = date_create('2016-01-11');
if (!$date) {
    $e = date_get_last_errors();
    foreach ($e['errors'] as $error) {
        echo "$error\n";
    }
    exit(1);
}
echo date_format($date, 'Y-m-d');
```

#### Fuso horario

Embora tenhamos um fuso horário definido no php.ini em _date.timezone_, o qual será usado caso não seja informado no construtor de DateTime, podemos definir um fuso horário para cada objeto DateTime.

```php
<?php
$saoPaulo = new DateTime('now',new DateTimeZone('America/Sao_Paulo'));
echo $saoPaulo->format('d/m/Y H:m:s');
echo $saoPaulo->getTimeZone()->getName();
```
