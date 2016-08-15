# Streams

Em uma simples definição Stream é um recurso de objeto que possui comportamento 'stremável'.
É uma forma de agrupar e disponibilizar operações de funções e ações em comum.

É dividida da seguinte forma:
* **Wrapper** - código adicional que diz a stream como lidar com protocolos/encodes específicos.
* **Filtros** - pedaço final de código que pode realizar operações nos dados que estão sendo lidos ou gravados em uma stream.
* **Contexto** - grupo de parâmetros e opções específicas de wrapper que podem modificar ou incrementar o funcionamento de uma stream.

Uma stream é referenciada da seguinte forma:  
**scheme://target**  
* scheme(string) - Nome do wrapper a ser utilizado. Exemplos incluem: file, http, https, ftp, ftps, compress.zlib, compress.bz2, e php.
* target - Depende do wrapper. Para streams relacionadas a filesystem, normalmente é o caminho e o nome do arquivo desejado. Para streams relacionadas a rede, normalmente um hostname com um caminho.

O wrapper padrão do php é o **file://** . **readfile('exemplo.txt')** e **readfile('file://exemplo.txt')** retornam exatamente o mesmo resultado. Se fizermos **readfile('http://google.com/')**, estamos dizendo para o php utilizar o wrapper de stream HTTP.

Para saber quais são os wrappers, protocolos e filtros disponíveis e instalados no php, basta utilizar:
````php
<?php
print_r(stream_get_transports());
print_r(stream_get_wrappers());
print_r(stream_get_filters());
````


## php:// Wrapper
Wrapper próprio do php para stream de I/O.
