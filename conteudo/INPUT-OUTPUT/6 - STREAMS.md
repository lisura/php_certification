# Streams

Em uma simples definição Stream é um recurso de objeto que possui comportamento 'streamável'.
É uma forma de agrupar e disponibilizar operações de funções e ações em comum.

É dividida da seguinte forma:
* **Wrapper** - código adicional que diz a stream como lidar com protocolos/encodes específicos.
* **Filtros** - pedaço final de código que pode realizar operações nos dados que estão sendo lidos ou gravados em uma stream.
* **Contexto** - grupo de parâmetros e opções específicas de wrapper que podem modificar ou incrementar o funcionamento de uma stream.

Uma stream é referenciada da seguinte forma:  
**scheme://target**  
* scheme(string) - Nome do wrapper a ser utilizado. Exemplos incluem: file, http, https, ftp, ftps, compress.zlib, compress.bz2, e php.
* target - Depende do wrapper. Para streams relacionadas a filesystem, normalmente é o caminho e o nome do arquivo desejado. Para streams relacionadas a rede, normalmente um hostname com um caminho.

O wrapper padrão do php é o **file://**. Tanto **readfile('exemplo.txt')** quanto **readfile('file://exemplo.txt')** retornam exatamente o mesmo resultado. Se fizermos **readfile('http://google.com/')**, estamos dizendo para o php utilizar o wrapper de stream HTTP.

Para saber quais são os wrappers, protocolos e filtros disponíveis e instalados no php, basta utilizar:
````php
<?php
print_r(stream_get_transports());
print_r(stream_get_wrappers());
print_r(stream_get_filters());
````

Utilize a função stream_get_meta_data para retornar informações sobre a stream. Exemplo:
````php
<?php
$url = 'http://www.google.com/';

if (!$fp = fopen($url, 'r')) {
    trigger_error("Erro URL ($url)", E_USER_ERROR);
}

$meta = stream_get_meta_data($fp);

print_r($meta);

fclose($fp);
````

Para registrar uma classe como um wrapper customizado, utilizamos a função **stream_register_wrapper** (sinônimo de **stream_wrapper_register**).  
Exemplo:
````php
<?php
$existed = in_array("var", stream_get_wrappers());
if ($existed) {
    stream_wrapper_unregister("var");
}
stream_wrapper_register("var", "VariableStream");
$myvar = "";

$fp = fopen("var://myvar", "r+");

fwrite($fp, "line1\n");
fwrite($fp, "line2\n");
fwrite($fp, "line3\n");

rewind($fp);
while (!feof($fp)) {
    echo fgets($fp);
}
fclose($fp);
var_dump($myvar);

if ($existed) {
    stream_wrapper_restore("var");
}
````

## php:// Wrapper
Wrapper próprio do php para stream de I/O.  
Os wrappers básicos que mapeiam os recursos de I\O são **php://stdin**, **php://stdout**, e **php://stderr**.  
**php://input** ẽ um wrapper de apenas leitura que recupera os dados do corpo de requisição de um POST.  
Exemplo:
```
curl -d "Hello World" -d "foo=bar&name=John" http://localhost/dev/streams/php_input.php
```

**php://memory** e **php://temp** são wrappers usados para ler e escrever dados temporários. No primeiro caso, os dados são gravados na memória, e no segundo, em um arquivo temporário.

## Stream Contexts
Exemplo de contexto utilizado para alterar um comportamento do wrapper de HTTP:
````php
<?php
$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=> "Auth: SecretAuthTokenrn" .
        "Content-type: 'application/x-www-form-urlencodedrn'" .
              "Content-length: " . strlen("Hello World"),
    'content' => 'Hello World'
  )
);
$default = stream_context_get_default($opts);
readfile('http://localhost/exemplos/php_input_2.php');
````

Para criar um contexto alternativo:
````php
<?php
$other_opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$alternative = stream_context_create($other_opts);

//para adicionar opções ou parâmetros a stream:
stream_context_set_params($alternative, array('zz' => array('zz' => 'zz')));

readfile('http://localhost/exemplos/php_input_2.php', false, $alternative);
````
Para recuperar as opções, basta utilizar **stream_context_get_options**.

## Filtros
O php possui uma série de filtros prontos para uso, como **string.toupper**, **string.tolower** ou **string.strip_tags**. Algumas extenções PHP providenciam seus próprios filtros. Por exemplo, a extenção **mcrypt** instala os filtros mcrypt.* e  mdecrypt.* . A função **stream_get_filters()** retorna os filtros disponíveis.

Podemos acrescentar quantos filtros quisermos em um recurso de stream, utilizando **stream_filter_append**.  
Exemplo:
````php
<?php
$h = fopen('exemplo.txt', 'r');
    stream_filter_append($h, 'string.toupper');
    fpassthru($h);
    fclose($h);
````

Tambêm é possível utilizar o meta-wrapper **php://filter** :
````php
<?php
    $filter = 'string.toupper';
    $file = 'exemplo.txt';
    $h = fopen('php://filter/read=' . $filter . '/resource=' . $file,'r');
    fpassthru($h);
    fclose($h);
````

Para criar um filtro utilizamos a função **stream_filter_register**.  
[Exemplo](https://github.com/lisura/php_certification/blob/master/Examples/INPUT-OUTPUT/php_filter.php)
