# DATA FORMATS AND TYPES - SimpleXML & DOM

## SimpleXML

O SimpleXML é uma extensão que permite ter o acesso e a manipulação de dados XML de forma mais simples, através da orientação à objetos, onde os elementos se tornam propriedades de um objeto e os atributos são acessíveis por arrays. Requer que o libxml esteja habilitado.

Exemplo:
```php
<?php
$xmlstr = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<videogame nome="SNES" ano_lancamento="1990" fabricante="Nintendo">
  <titulo>Super Nintendo Entertainment System</titulo>
  <jogos>
    <jogo desenvolvedora="Nintendo" ano="1990" genero="plataforma">Super Mario World</jogo>
    <jogo desenvolvedora="Kemco" ano="1991" genero="corrida">Top Gear</jogo>
    <jogo desenvolvedora="Square" ano="1992" genero="rpg">Final Fantasy V</jogo>
    <jogo desenvolvedora="Capcom" ano="1993" genero="acao">Mega Man X</jogo>
  </jogos>
  <curiosidades>
    <item-line>Sucessor do Nintendo Entertainment System (NES).</item-line>
    <item-line>Teve forte concorrência com o Mega Drive nos EUA.</item-line>
    <item-line>Foi lançado no Brasil em 1993 pela Playtronic.</item-line>
  </curiosidades>
</videogame >
XML;

$videogame = new SimpleXMLElement($xmlstr);
echo $videogame->jogos->jogo[0];
```

## Funções

```php
SimpleXMLElement simplexml_load_string ( string $data [, string $class_name = "SimpleXMLElement" [, int $options = 0 [, string $ns = "" [, bool $is_prefix = false ]]]] )

SimpleXMLElement simplexml_load_file ( string $filename [, string $class_name = "SimpleXMLElement" [, int $options = 0 [, string $ns = "" [, bool $is_prefix = false ]]]] )
```
O retorno destas funções é o próprio elemento SimpleXML, ou FALSE em caso de erro.

* $class_name refere-se a uma classe extendida da classe SimpleXMLElement. 
* $options são opções do libxml. [(http://php.net/manual/pt_BR/libxml.constants.php)](http://php.net/manual/pt_BR/libxml.constants.php)
* $ns pode ser o prefixo do namespace ou URI
* $is_prefix determina qual dos dois tipos é o valor de $ns (prefixo ou URI)

Exercício: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/simplexml/simplexml_ex1.php)

Lidar com erros requer o uso do libxml, com o objeto libXMLError que é retornado pela função libxml_get_errors(), contendo diversas propriedades como message, line e column do erro.

```php
libxml_use_internal_errors(true);
$sxe = simplexml_load_string("<?xml version='1.0'><broken><xml></broken>"
);
if ($sxe === false) {
    echo "Erro ao carregar o XML\n";
    foreach(libxml_get_errors() as $error) {
        echo "\t", $error->message.'<br/>Linha '.$error->line.'<br/>Coluna '.$error->column.'<br/><br/>';
    }
}
```

Exercício: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/simplexml/simplexml_ex2.php)

## Métodos e propriedades

* SimpleXMLElement::addAttribute — Adds an attribute to the SimpleXML element
* SimpleXMLElement::addChild — Adds a child element to the XML node
* SimpleXMLElement::asXML — Return a well-formed XML string based on SimpleXML element
* SimpleXMLElement::attributes — Identifies an element's attributes
* SimpleXMLElement::children — Finds children of given node
* SimpleXMLElement::__construct — Creates a new SimpleXMLElement object
* SimpleXMLElement::count — Counts the children of an element
* SimpleXMLElement::getDocNamespaces — Returns namespaces declared in document
* SimpleXMLElement::getName — Gets the name of the XML element
* SimpleXMLElement::getNamespaces — Returns namespaces used in document
* SimpleXMLElement::registerXPathNamespace — Creates a prefix/ns context for the next XPath query
* SimpleXMLElement::saveXML — Alias of SimpleXMLElement::asXML
* SimpleXMLElement::__toString — Returns the string content
* SimpleXMLElement::xpath — Runs XPath query on XML data

Exercício: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/simplexml/simplexml_ex3.php)

## DOM (Document Object Model)

DOM API é uma interface para lidar com documentos XML, HTML e SVG. A API define uma representação da estrutura do documento, bem como as formas de se manipular esta estrutura. 
O conceito de DOM é bem conhecido por programadores Web, pois o JavaScript usa essa representação para acessar os elementos de uma página HTML.
A extensão DOM permite manipular XML através da DOM API com PHP 5. Requer que a extensão libxml esteja habilitada, bem como a Expat para algumas funcionalidades.
Essa API possui [várias classes](http://php.net/manual/en/book.dom.php), no entanto nos focaremos apenas em DOMDocument, por ser a representação do documento XML.

> Nota: Esta extensão trabalha apenas com **UTF-8**. É preciso usar **utf8_encode** e **utf8_decode** para manipular dados codificados em ISO-8859-1, ou **iconv** para lidar com outras codificações.

## Estrutura DOM para XML

```xml
<?xml version="1.0" encoding="UTF-8"?>
<bookstore>
  <book category="cooking">
    <title lang="en">Everyday Italian</title>
    <author>Giada De Laurentiis</author>
    <year>2005</year>
    <price>30.00</price>
  </book>
</bookstore>
```

![Estrutura DOM](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/simplexml/nodetree.gif)

## Classes DOM

```php
DOMNode {
	/* Propriedades */
	public readonly string $nodeName ;
	public string $nodeValue ;
	public readonly int $nodeType ;
	public readonly DOMNode $parentNode ;
	public readonly DOMNodeList $childNodes ;
	public readonly DOMNode $firstChild ;
	public readonly DOMNode $lastChild ;
	public readonly DOMNode $previousSibling ;
	public readonly DOMNode $nextSibling ;
	public readonly DOMNamedNodeMap $attributes ;
	public readonly DOMDocument $ownerDocument ;
	public readonly string $namespaceURI ;
	public string $prefix ;
	public readonly string $localName ;
	public readonly string $baseURI ;
	public string $textContent ;
	
	/* Métodos */
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
}
```

```php
DOMDocument extends DOMNode {
	/* Propriedades */
	readonly public string $actualEncoding ;
	readonly public DOMConfiguration $config ;
	readonly public DOMDocumentType $doctype ;
	readonly public DOMElement $documentElement ;
	public string $documentURI ;
	public string $encoding ;
	public bool $formatOutput ;
	readonly public DOMImplementation $implementation ;
	public bool $preserveWhiteSpace = true ;
	public bool $recover ;
	public bool $resolveExternals ;
	public bool $standalone ;
	public bool $strictErrorChecking = true ;
	public bool $substituteEntities ;
	public bool $validateOnParse = false ;
	public string $version ;
	readonly public string $xmlEncoding ;
	public bool $xmlStandalone ;
	public string $xmlVersion ;
	
	/* Métodos */
	public __construct ([ string $version [, string $encoding ]] )
	public DOMAttr createAttribute ( string $name )
	public DOMAttr createAttributeNS ( string $namespaceURI , string $qualifiedName )
	public DOMCDATASection createCDATASection ( string $data )
	public DOMComment createComment ( string $data )
	public DOMDocumentFragment createDocumentFragment ( void )
	public DOMElement createElement ( string $name [, string $value ] )
	public DOMElement createElementNS ( string $namespaceURI , string $qualifiedName [, string $value ] )
	public DOMEntityReference createEntityReference ( string $name )
	public DOMProcessingInstruction createProcessingInstruction ( string $target [, string $data ] )
	public DOMText createTextNode ( string $content )
	public DOMElement getElementById ( string $elementId )
	public DOMNodeList getElementsByTagName ( string $name )
	public DOMNodeList getElementsByTagNameNS ( string $namespaceURI , string $localName )
	public DOMNode importNode ( DOMNode $importedNode [, bool $deep ] )
	public mixed load ( string $filename [, int $options = 0 ] )
	public bool loadHTML ( string $source [, int $options = 0 ] )
	public bool loadHTMLFile ( string $filename [, int $options = 0 ] )
	public mixed loadXML ( string $source [, int $options = 0 ] )
	public void normalizeDocument ( void )
	public bool registerNodeClass ( string $baseclass , string $extendedclass )
	public bool relaxNGValidate ( string $filename )
	public bool relaxNGValidateSource ( string $source )
	public int save ( string $filename [, int $options ] )
	public string saveHTML ([ DOMNode $node = NULL ] )
	public int saveHTMLFile ( string $filename )
	public string saveXML ([ DOMNode $node [, int $options ]] )
	public bool schemaValidate ( string $filename [, int $flags ] )
	public bool schemaValidateSource ( string $source [, int $flags ] )
	public bool validate ( void )
	public int xinclude ([ int $options ] )
	
	/* Métodos herdados */
	public DOMNode DOMNode::appendChild ( DOMNode $newnode )
	public string DOMNode::C14N ([ bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] )
	public int DOMNode::C14NFile ( string $uri [, bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] )
	public DOMNode DOMNode::cloneNode ([ bool $deep ] )
	public int DOMNode::getLineNo ( void )
	public string DOMNode::getNodePath ( void )
	public bool DOMNode::hasAttributes ( void )
	public bool DOMNode::hasChildNodes ( void )
	public DOMNode DOMNode::insertBefore ( DOMNode $newnode [, DOMNode $refnode ] )
	public bool DOMNode::isDefaultNamespace ( string $namespaceURI )
	public bool DOMNode::isSameNode ( DOMNode $node )
	public bool DOMNode::isSupported ( string $feature , string $version )
	public string DOMNode::lookupNamespaceURI ( string $prefix )
	public string DOMNode::lookupPrefix ( string $namespaceURI )
	public void DOMNode::normalize ( void )
	public DOMNode DOMNode::removeChild ( DOMNode $oldnode )
	public DOMNode DOMNode::replaceChild ( DOMNode $newnode , DOMNode $oldnode )
}
```

```php
DOMElement extends DOMNode {
	/* Propriedades */
	readonly public bool $schemaTypeInfo ;
	readonly public string $tagName ;
	
	/* Métodos */
	public __construct ( string $name [, string $value [, string $namespaceURI ]] )
	public string getAttribute ( string $name )
	public DOMAttr getAttributeNode ( string $name )
	public DOMAttr getAttributeNodeNS ( string $namespaceURI , string $localName )
	public string getAttributeNS ( string $namespaceURI , string $localName )
	public DOMNodeList getElementsByTagName ( string $name )
	public DOMNodeList getElementsByTagNameNS ( string $namespaceURI , string $localName )
	public bool hasAttribute ( string $name )
	public bool hasAttributeNS ( string $namespaceURI , string $localName )
	public bool removeAttribute ( string $name )
	public bool removeAttributeNode ( DOMAttr $oldnode )
	public bool removeAttributeNS ( string $namespaceURI , string $localName )
	public DOMAttr setAttribute ( string $name , string $value )
	public DOMAttr setAttributeNode ( DOMAttr $attr )
	public DOMAttr setAttributeNodeNS ( DOMAttr $attr )
	public void setAttributeNS ( string $namespaceURI , string $qualifiedName , string $value )
	public void setIdAttribute ( string $name , bool $isId )
	public void setIdAttributeNode ( DOMAttr $attr , bool $isId )
	public void setIdAttributeNS ( string $namespaceURI , string $localName , bool $isId )
	
	/* Métodos herdados */
	public DOMNode DOMNode::appendChild ( DOMNode $newnode )
	public string DOMNode::C14N ([ bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] )
	public int DOMNode::C14NFile ( string $uri [, bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] )
	public DOMNode DOMNode::cloneNode ([ bool $deep ] )
	public int DOMNode::getLineNo ( void )
	public string DOMNode::getNodePath ( void )
	public bool DOMNode::hasAttributes ( void )
	public bool DOMNode::hasChildNodes ( void )
	public DOMNode DOMNode::insertBefore ( DOMNode $newnode [, DOMNode $refnode ] )
	public bool DOMNode::isDefaultNamespace ( string $namespaceURI )
	public bool DOMNode::isSameNode ( DOMNode $node )
	public bool DOMNode::isSupported ( string $feature , string $version )
	public string DOMNode::lookupNamespaceURI ( string $prefix )
	public string DOMNode::lookupPrefix ( string $namespaceURI )
	public void DOMNode::normalize ( void )
	public DOMNode DOMNode::removeChild ( DOMNode $oldnode )
	public DOMNode DOMNode::replaceChild ( DOMNode $newnode , DOMNode $oldnode )
}
```

Para maiores referências, consultar [http://php.net/manual/pt_BR/book.dom.php](http://php.net/manual/pt_BR/book.dom.php)

## Carregando documentos  

```php
$load = new DOMDocument();

$load->load('xml_file.xml'); //carrega arquivo XML
$load->loadXML('<tag atrib="val">texto</tag>'); //carrega texto XML
$load->loadHTMLFILE('html_file.html'); //carrega arquivo HTML
$load->loadHTML('<html><head></head><body>texto</body></html>'); //carrega texto HTML
```
Exercício: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/simplexml/simplexml_ex4.php)

## SimpleXML e DOM

No PHP podemos trabalhar com SimpleXML ou com DOM. Ainda podemos efetuar conversões entre estes dois métodos através das seguintes funções:

```php
SimpleXMLElement simplexml_import_dom ( DOMNode $node [, string $class_name = "SimpleXMLElement" ] ) //importa o XML de um DOM Node

DOMElement dom_import_simplexml ( SimpleXMLElement $node ) //importa o XML de um elemento SimpleXML
```
O retorno destas funções é o próprio elemento SimpleXML ou DOM, ou FALSE em caso de erro.

No caso de importar o XML para um elemento SimpleXML, posso passar o nome de uma classe extendida da classe SimpleXMLElement.

Exercício: [LINK1](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/simplexml/simplexml_ex5.php), [LINK2](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/simplexml/simplexml_ex6.php)

## Constantes Pre-definidas

**XML constants**

Estas constantes se referem ao tipo do nó, retornado por DOMNode::nodeType. Podem identificar inclusive se o nó é um atributo e que tipo de atributo ele é.

|Constante                          |Valor   |Descrição                                                                             |
|-----------------------------------|--------|--------------------------------------------------------------------------------------|
|XML_ELEMENT_NODE (integer) 	      |1 	     |Node is a DOMElement                                                                  |
|XML_ATTRIBUTE_NODE (integer) 	    |2 	     |Node is a DOMAttr                                                                     |
|XML_TEXT_NODE (integer) 	          |3 	     |Node is a DOMText                                                                     |
|XML_CDATA_SECTION_NODE (integer)   |4 	     |Node is a DOMCharacterData                                                            |
|XML_ENTITY_REF_NODE (integer) 	    |5 	     |Node is a DOMEntityReference                                                          |
|XML_ENTITY_NODE (integer) 	        |6 	     |Node is a DOMEntity                                                                   |
|XML_PI_NODE (integer) 	            |7 	     |Node is a DOMProcessingInstruction                                                    |
|XML_COMMENT_NODE (integer) 	      |8 	     |Node is a DOMComment                                                                  |
|XML_DOCUMENT_NODE (integer) 	      |9 	     |Node is a DOMDocument                                                                 |
|XML_DOCUMENT_TYPE_NODE (integer) 	|10 	   |Node is a DOMDocumentType                                                             |
|XML_DOCUMENT_FRAG_NODE (integer) 	|11 	   |Node is a DOMDocumentFragment                                                         |
|XML_NOTATION_NODE (integer) 	      |12 	   |Node is a DOMNotation                                                                 |
|XML_HTML_DOCUMENT_NODE (integer) 	|13 	   |                                                                                      |
|XML_DTD_NODE (integer) 	          |14 	   |                                                                                      |
|XML_ELEMENT_DECL_NODE (integer) 	  |15 	   |                                                                                      |
|XML_ATTRIBUTE_DECL_NODE (integer)  |16 	   |                                                                                      |
|XML_ENTITY_DECL_NODE (integer) 	  |17 	   |                                                                                      |
|XML_NAMESPACE_DECL_NODE (integer)  |18 	   |                                                                                      |
|XML_ATTRIBUTE_CDATA (integer) 	    |1 	     |                                                                                      |
|XML_ATTRIBUTE_ID (integer) 	      |2 	     |                                                                                      |
|XML_ATTRIBUTE_IDREF (integer) 	    |3 	     |                                                                                      |
|XML_ATTRIBUTE_IDREFS (integer) 	  |4 	     |                                                                                      |
|XML_ATTRIBUTE_ENTITY (integer) 	  |5 	     |                                                                                      |
|XML_ATTRIBUTE_NMTOKEN (integer) 	  |7 	     |                                                                                      |
|XML_ATTRIBUTE_NMTOKENS (integer) 	|8 	     |                                                                                      |
|XML_ATTRIBUTE_ENUMERATION (integer)|9 	     |                                                                                      |
|XML_ATTRIBUTE_NOTATION (integer) 	|10 	   |                                                                                      |

**DOMException constants**

Por fim a tabela abaixo faz referência ao código de erro devolvido pela classe DOMException.

|Constante                                  |Valor    |Descrição                                                                             |
|-------------------------------------------|---------|--------------------------------------------------------------------------------------|
|DOM_PHP_ERR (integer) 	                    |0 	      |Error code not part of the DOM specification. Meant for PHP errors.                   |
|DOM_INDEX_SIZE_ERR (integer) 	            |1 	      |If index or size is negative, or greater than the allowed value.                      |
|DOMSTRING_SIZE_ERR (integer) 	            |2 	      |If the specified range of text does not fit into a DOMString.                         |
|DOM_HIERARCHY_REQUEST_ERR (integer) 	      |3 	      |If any node is inserted somewhere it doesn't belong                                   |
|DOM_WRONG_DOCUMENT_ERR (integer) 	        |4 	      |If a node is used in a different document than the one that created it.               |
|DOM_INVALID_CHARACTER_ERR (integer) 	      |5 	      |If an invalid or illegal character is specified, such as in a name.                   |
|DOM_NO_DATA_ALLOWED_ERR (integer) 	        |6 	      |If data is specified for a node which does not support data.                          |
|DOM_NO_MODIFICATION_ALLOWED_ERR (integer) 	|7 	      |If an attempt is made to modify an object where modifications are not allowed.        |
|DOM_NOT_FOUND_ERR (integer) 	              |8 	      |If an attempt is made to reference a node in a context where it does not exist.       |
|DOM_NOT_SUPPORTED_ERR (integer) 	          |9 	      |If the implementation does not support the requested type of object or operation.     |
|DOM_INUSE_ATTRIBUTE_ERR (integer) 	        |10 	    |If an attempt is made to add an attribute that is already in use elsewhere.           |
|DOM_INVALID_STATE_ERR (integer) 	          |11 	    |If an attempt is made to use an object that is not, or is no longer, usable.          |
|DOM_SYNTAX_ERR (integer) 	                |12 	    |If an invalid or illegal string is specified.                                         |
|DOM_INVALID_MODIFICATION_ERR (integer) 	  |13 	    |If an attempt is made to modify the type of the underlying object.                    |
|DOM_NAMESPACE_ERR (integer) 	              |14 	    |If an attempt is made to create or change an object in a way which is incorrect with regard to namespaces.|
|DOM_INVALID_ACCESS_ERR (integer) 	        |15 	    |If a parameter or an operation is not supported by the underlying object.|
|DOM_VALIDATION_ERR (integer) 	            |16 	    |If a call to a method such as insertBefore or removeChild would make the Node invalid with respect to "partial validity", this exception would be raised and the operation would not be done. |