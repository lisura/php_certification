# Extensões  

Existem diversas extensões disponíveis para tarefas de programação especificas.  
AS extensões são adicionadas e habilitadas no arquivo de configuração do Php, php.ini .  
Exemplo:  
````
extension=php_curl.dll
````  

## PECL (PHP EXTENSION COMMUNITY LIBRARY)  
PEAR (PHP Extension and Application Repository) é um repositório de distribuição de pacotes de código PHP independentes de terceiros que busca manter um padrão estrutural das bibliotecas e classes.  
O PECL, similar ao PEAR, é um repositório de pacotes de extensões C compiladas para o PHP. Por serem programas em C, são mais eficientes que os pacotes PEAR. Entre as extensões do PECL, existem módulos para XML, banco de dados, envio de email, etc.  
Tanto os pacotes PEAR quando as extensões PECL são instaladas, desinstaladas e atualizadas utilizando PEAR package manager.  

## CORE EXTENSIONS
O PHP possuí elementos de linguagem fazem parte de seu núcleo. Não são extensões propriamente ditas, já que não é possível removê-las.
Entre elas: Arrays, Classes, Objetos, Data/Hora, Urls, etc.  

## Regras de nomenclatura em espaço de usuário  
Espaço de usuário refere-se as aplicações que são executadas fora do kernel do PHP.  

No escopo global de construtores de Namespace temos:  
* funções
* classes
* interfaces
* constantes (menos constantes de classes)
* variáveis definidas fora de funções e métodos  

A lista a seguir dá uma visão geral de quais direitos o projeto do PHP reserva para si, quando escolhe nomes para novos identificadores internos.  

* PHP detém o escopo de alto nível, mas tenta achar nomes descritivos decentes e evita qualquer conflito óbvio.
* Nomes de funções usam sublinhado (_) entre palavas, enquanto nomes de classe usam a notação camelCase e PascalCase.
* O PHP prefixará quaisquer símbolos globais de uma extensão com o nome da extensão. Exemplos:
````php
curl_close()
mysql_query()
PREG_SPLIT_DELIM_CAPTURE
new DOMDocument()
strpos() //exemplo de um erro do passado
new SplFileObject()
````
* Iterators e Exceptions são, no entanto, simplesmente sufixados com "Iterator" e "Exception." Exemplos:  
ArrayIterator,
LogicException.
* O PHP reserva todos os símbolos começando com __ como mágicos. É recomendado que você não crie símbolos começando com __ a não ser que você queira usar a funcionalidade mágica documentada. Exemplos:
````php
__get
__autoload()
````
