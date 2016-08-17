# DATA FORMATS AND TYPES - SOAP & REST

## SOAP

Simple Object Access Protocol, protocolo de mensagem que permite a comunicação entre aplicações independente do sistema operacional ou da linguagem de programação empregada. Se baseia no HTTP e no XML. Através do WSDL (Web Service Description Language) o SOAP descreve seus serviços.
SOAP foi criado em 1998 por Dave Winer, Don Box, Bob Atkinson, e Mohsen Al-Ghosein para a Microsoft, onde Atkinson e Al-Ghosein estavam trabalhando. Por conta de políticas da Microsoft, a especificação foi disponibilizada somente depois de ter sido enviada para a IETF em 13 de setembro de 1999. Por conta da hesitação e demora da Microsoft, Dave Winer criou o XML-RPC em 1998. Este protocolo para serviços WEB foi evoluindo para o que chamamos de SOAP hoje.
A extensão de SOAP no PHP foi introduzida a partir do PHP 5, suporta os subsets SOAP 1.1, SOAP 1.2 e as especificações WSDL 1.1. Também requer que a libxml esteja habilitada no PHP para ser utilizado, além da configuração --enable-soap.

No php.ini, temos as seguintes configurações:
*  soap.wsdl_cache_enabled - integer(1): Habilita ou desabilta os recursos de cache WSDL.
*  soap.wsdl_cache_dir - string ("/tmp"): indica o diretório onde o cache WSDL será armazenado.
*  soap.wsdl_cache_ttl - integer (86400): Tempo de vida do cache WSDL em segundos.
*  soap.wsdl_cache integer - (1): Determina o tipo de cache (WSDL_CACHE_NONE (0), WSDL_CACHE_DISK (1), WSDL_CACHE_MEMORY (2) or WSDL_CACHE_BOTH (3)).
*  soap.wsdl_cache_limit - integer (5): Quantidade de arquivos de cache na memória, ao ultrapassar este número os arquivos mais antigos são removidos.

## Funções e Classes

Para consumir um serviço SOAP, basta criar uma instancia de SoapClient.

```php
public SoapClient::SoapClient ( mixed $wsdl [, array $options ] )
```
Onde $wsdl é a URI do arquivo WSDL, ou null caso o modo seja non-WSDL. O segundo parâmetro pode ser usado para setar diversas opções no client.
> Nota: modo WSDL: quando a URI do arquivo WSDL é passado. Non-WSDL: quando a URI do arquivo WSDL for null

|Opção   |    Valor|
|--------|---------|
|style|Informado apenas no modo non-WSDL, caso contrário esse valor vem do arquivo WSDL|
|soap_version|Especifica se usa SOAP_1_1 ou SOAP_1_2|
|compression|Permite usar compressão nas requisições e respostas|
|encoding|Tipo de encoding usado internamente|
|trace|Caso esteja habilitada, permite rastrear erros durante a requisição|
|classmap|Mapeia um WSDL para uma classe PHP|
|exception|Define se lança exceções do tipo SoapFault em caso de erro|
|connection_timeout|Tempo de espera pela resposta da requisição (pode ser definido o padrão no php.ini na opção default_socket_timeout)|
|typemap|Array contendo os seguintes índices para mapear o WSDL: type_name (nome do nó a ser mapeado),type_ns (nome do namespace), from_xml (callback para lidar com o XML encontrado)|
|cache_wsdl|Tipo de cache usado (WSDL_CACHE_NONE (0), WSDL_CACHE_DISK (1), WSDL_CACHE_MEMORY (2) or WSDL_CACHE_BOTH (3))|
|user_agent|Define o header user-agent para a requisição|
|stream_content|Define o contexto usando streams (contexto de socket,http,mongodb,etc)|
|features|Tipo de bitmask (SOAP_SINGLE_ELEMENT_ARRAYS, SOAP_USE_XSI_ARRAY_TYPE, SOAP_WAIT_ONE_WAY_CALLS)|
|keep_alive|Se true, envia no header Connection: Keep-Alive. Se false, envia Connection: close|
|ssl_method|Tipo de SSL (SOAP_SSL_METHOD_TLS, SOAP_SSL_METHOD_SSLv2, SOAP_SSL_METHOD_SSLv3 or SOAP_SSL_METHOD_SSLv23)|

Para verificar quais métodos posso utilizar, basta usar o método __getFunctions.

```PHP
<?php
$client = new SoapClient('http://soap.amazon.com/schemas3/AmazonWebServices.wsdl');
var_dump($client->__getFunctions());
```
> Nota: Esse método só funciona no modo WSDL. Caso contrário retorna NULL.

Após identificar o método desejado, podemos chamá-lo das seguintes formas:
```PHP
<?php
$params = array(
  "param1" => $val1,
  "param2" => $val2,
);

$client->meuMetodo($params);
$client->__soapCall("meuMetodo", array($params));
```
EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/soap/soap_ex1.php)

> Nota: Ao usar o __soapCall, devemos encapsular a array de parâmetros novamente em uma array, caso contrário teremos um erro indicando que os parâmetros necessários não foram definidos.

Caso queiramos criar um serviço SOAP em PHP para ser consumido por qualquer outro sistema ou linguagem, basta usarmos a classe SoapServer.

```PHP
public SoapServer::SoapServer ( mixed $wsdl [, array $options ] )
```

Onde $wsdl é a URI do arquivo WSDL, ou null caso o modo seja non-WSDL. O segundo parâmetro pode ser usado para setar diversas opções no server.

|Opção   |    Valor|
|--------|---------|
|soap_version|Especifica se usa SOAP_1_1 ou SOAP_1_2|
|encoding|Tipo de encoding usado internamente|
|classmap|Mapeia um WSDL para uma classe PHP|
|typemap|Array contendo os seguintes índices para mapear o WSDL: type_name (nome do nó a ser mapeado),type_ns (nome do namespace), from_xml (callback para lidar com o XML encontrado)|
|cache_wsdl|Tipo de cache usado (WSDL_CACHE_NONE (0), WSDL_CACHE_DISK (1), WSDL_CACHE_MEMORY (2) or WSDL_CACHE_BOTH (3))|
|features|Tipo de bitmask (SOAP_SINGLE_ELEMENT_ARRAYS, SOAP_USE_XSI_ARRAY_TYPE, SOAP_WAIT_ONE_WAY_CALLS)|
|send_errors|Caso seja false, envia uma mensagem de erro genérica "Internal Error" ao invés de uma mensagem detalhada de erro|
|uri|Caso não tenha sido passado WSDL ao construtor, define o namespace do servidor|

Podemos utilizar a classe sem especificar um WSDL, informando a opção uri:
```PHP
$server = new SoapServer(null,array('uri'=>'http://localhost/wsdl'));
```

Por fim definimos a classe que irá prover o serviço.
```PHP
class ServicoSoap {
  public function OlaMundo(){
    return 'Hello, Soap World!';
  }
}

$server->setClass('ServicoSoap');
$server->handle();
```
EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/soap/server.php)

Para tratamento de erros, podemos usar as seguintes funções:

**is_soap_fault**
```PHP
bool is_soap_fault ( mixed $object )
```
Verifica se ocorreu um erro sem o uso de exceções. Para usar esta função, devemos setar a opção 'exceptions' no SoapClient para false ou zero. Com isso a resposta do serviço será um objeto SoapFault contendo os detalhes do erro.

Exemplo:
```PHP
<?php
$client = new SoapClient("some.wsdl", array('exceptions' => 0));
$result = $client->SomeFunction();
if (is_soap_fault($result)) {
    trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);
}
```

**use_soap_error_handler**
```PHP
bool use_soap_error_handler ([ bool $handler = true ] )
```
Define se usa o manipulador de erros do SOAP ao invés do manipulador de erros padrão do PHP. Com isso retorna uma mensagem de falha SOAP em casos de erro para o client.

## Constantes

Todas as constantes são valores inteiros (integer)

Constant| 	Value| 	Description|
--------|--------|-------------|
SOAP_1_1 | 	1||
SOAP_1_2 | 	2||
SOAP_PERSISTENCE_SESSION | 	1||
SOAP_PERSISTENCE_REQUEST | 	2||
SOAP_FUNCTIONS_ALL | 	999| 	 |
SOAP_ENCODED | 	1| 	 |
SOAP_LITERAL | 	2| 	 |
SOAP_RPC | 	1| 	 |
SOAP_DOCUMENT | 	2| 	 |
SOAP_ACTOR_NEXT | 	1| 	 |
SOAP_ACTOR_NONE | 	2| 	 |
SOAP_ACTOR_UNLIMATERECEIVER | 	3| 	| 
SOAP_COMPRESSION_ACCEPT | 	32| 	 |
SOAP_COMPRESSION_GZIP | 	0| 	 |
SOAP_COMPRESSION_DEFLATE | 	16| 	 |
SOAP_AUTHENTICATION_BASIC | 	0| 	 |
SOAP_AUTHENTICATION_DIGEST | 	1| 	 |
SOAP_SSL_METHOD_TLS | 	0| 	Since PHP 5.5.0.|
SOAP_SSL_METHOD_SSLv2 | 	1| 	Since PHP 5.5.0.|
SOAP_SSL_METHOD_SSLv3 | 	2| 	Since PHP 5.5.0.|
SOAP_SSL_METHOD_SSLv23 | 	3| 	Since PHP 5.5.0.|
UNKNOWN_TYPE | 	999998 	 
XSD_STRING | 	101| 	 |
XSD_BOOLEAN | 	102| 	 |
XSD_DECIMAL | 	103| 	 |
XSD_FLOAT | 	104| 	 |
XSD_DOUBLE | 	105| 	 |
XSD_DURATION | 	106| 	 |
XSD_DATETIME | 	107| 	 |
XSD_TIME | 	108| 	 |
XSD_DATE | 	109|	 |
XSD_GYEARMONTH | 	110| 	 |
XSD_GYEAR | 	111| 	 |
XSD_GMONTHDAY | 	112| 	 |
XSD_GDAY | 	113| 	 |
XSD_GMONTH | 	114| 	 |
XSD_HEXBINARY | 	115|	 |
XSD_BASE64BINARY | 	116| 	 |
XSD_ANYURI | 	117| 	 |
XSD_QNAME | 	118| 	 |
XSD_NOTATION | 	119| 	 |
XSD_NORMALIZEDSTRING | 	120| 	 |
XSD_TOKEN | 	121| 	 |
XSD_LANGUAGE | 	122| 	 |
XSD_NMTOKEN | 	123| 	 |
XSD_NAME | 	124| 	 |
XSD_NCNAME | 	125| 	 |
XSD_ID | 	126| 	 |
XSD_IDREF | 	127| 	 |
XSD_IDREFS | 	128| 	 |
XSD_ENTITY | 	129| 	 |
XSD_ENTITIES | 	130| 	 |
XSD_INTEGER | 	131| 	 |
XSD_NONPOSITIVEINTEGER | 	132| 	 |
XSD_NEGATIVEINTEGER | 	133| 	 |
XSD_LONG | 	134| 	 |
XSD_INT | 	135| 	 |
XSD_SHORT | 	136| 	 |
XSD_BYTE | 	137| 	 |
XSD_NONNEGATIVEINTEGER | 	138| 	 |
XSD_UNSIGNEDLONG | 	139| 	 |
XSD_UNSIGNEDINT | 	140| 	 |
XSD_UNSIGNEDSHORT | 	141| 	 |
XSD_UNSIGNEDBYTE | 	142| 	 |
XSD_POSITIVEINTEGER | 	143| 	 |
XSD_NMTOKENS | 	144| 	 |
XSD_ANYTYPE | 	145| 	 |
XSD_ANYXML | 	147| 	 |
APACHE_MAP | 	200| 	 |
SOAP_ENC_OBJECT | 	301| 	 |
SOAP_ENC_ARRAY | 	300| 	 |
XSD_1999_TIMEINSTANT | 	401| 	 |
XSD_NAMESPACE | 	http://www.w3.org/2001/XMLSchema| 	 |
XSD_1999_NAMESPACE | 	http://www.w3.org/1999/XMLSchema| 	 |
SOAP_SINGLE_ELEMENT_ARRAYS | 	1| 	 |
SOAP_WAIT_ONE_WAY_CALLS | 	2| 	 |
SOAP_USE_XSI_ARRAY_TYPE | 	4| 	 |
WSDL_CACHE_NONE | 	0| 	 |
WSDL_CACHE_DISK | 	1| 	 |
WSDL_CACHE_MEMORY | 	2| 	 |
WSDL_CACHE_BOTH | 	3| 	 |

## REST

Representational State Transfer, outra forma de consumo de serviços WEB. Diferente do SOAP, o REST não usa um protocolo próprio, mas se vale de verbos HTTP para transmitir mensagens.
O termo transferência de estado representacional foi introduzido e definido no ano de 2000 por Roy Fielding, um dos principais autores da especificação do protocolo HTTP que é utilizado por sites da Internet, em uma tese de doutorado (PHD) intitulada "Architectural Styles and the Design of Network-based Software Architectures". Fielding desenvolveu a REST em colaboração com seus colegas enquanto trabalhava no HTTP 1.1 e nos Identificadores de Recursos Uniformes (URI).

## Verbos HTTP

* GET - Leitura de registros do serviço
* POST - Criação de um novo recurso no serviço oferecido
* PUT - Atualiza um registro existente. Geralmente usado em conjunto com o GET para adquirir o registro que deve ser atualizado
* PATCH - Atualiza apenas parte do recurso oferecido pelo serviço
* DELETE - Remove registros do serviço fornecido

## Headers

Requisição: Content-Type, o que está sendo enviado, o tipo MIME do conteúdo. (Content-Type: text/html; charset=utf-8)
Resposta: Accept, o que é esperado na resposta. (Accept: text/plain)

**Códigos de Status de Retorno**
* 1XX - Faixa 100+, códigos usados como informativos
* 2XX - Faixa 200+, códigos usados para informar sucesso da operação
* 3XX - Faixa 300+, códigos usados para informar redirecionamento
* 4XX - Faixa 400+, códigos usados para informar erros na requisição
* 5XX - Faixa 500+, códigos usados para informar erros internos no servidor

## Context Switching

Trata-se de uma forma de prover um output diferente do esperado, baseando-se nos critérios enviados na requisição. A idéia é inspecionar os headers HTTP da requisição e a URI, e assim variar a resposta de acordo.

Exemplo:
```
GET /api/blog/article/12345 HTTP/1.1
Host: www.enrise.com
Accept: application/vnd.enrise.article+xml; version: 1.0;
```
Nesta requisição espera obter-se uma lista dos artigos em XML.

Caso eu queira obter os comentários em HTML, posso mandar a seguinte requisição:
```
GET /api/blog/article/12345 HTTP/1.1
Host: www.enrise.com
Accept: application/vnd.enrise.comments+html; version: 1.2;
```

## REST & PHP

Os parâmetros enviados por GET e POST são facilmente capturados no PHP nativo.
```php
$param = $_GET['param'];
$param = $_POST['param'];
```

Para ver informações diferentes de GET e POST é um pouco mais complicado, requerendo o acesso por streams.

Ex:
```php
//rest.php
print file_get_contents('php://input');
```
EXERCICIO: [LINK1](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/soap/rest_ex1.php), [LINK2](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/soap/rest_server.php)