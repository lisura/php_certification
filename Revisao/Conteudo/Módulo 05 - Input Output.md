# INPUT-OUTPUT

## Arquivos e Funções de Sistema de Arquivos

É possível utilizar o PHP para manipular arquivos e diretórios.
Para tal, existem funções de manipulação de arquivos.

Funções de filesystem e arquivo:

* Recursos de arquivos
* Recursos de escrita
* Output

Funções de operações:

* Diretório
* Arquivo de informação
* Filesystem

Recurso (resource) é uma fonte de dados que pode ser manipulada. Um recurso de arquivo (file resource) é um arquivo no filesystem no qual o PHP pode manipular. O resource é único para a sessão do usuário.

As funções que começam com a letra *f* (como fopen(), fclose()) lidam com recursos
de arquivos.  

As que se iniciam com *file* (exemplo: file_get_content()) lidam
com nomes de arquivos.

---

## Recursos de arquivos

### fopen()  
Abre um arquivo ou URL.

Para criar/abrir um file resource é obrigatório passar dois parâmetros:
filename e mode.

* **filename**

Pode ser definido um caminho local para um arquivo, onde o PHP tentará abrir uma
stream para o mesmo. É nencessário que tenha permissão de acesso liberado para o caminho e/ou arquivo.

Exemplo:
````php
<?php
$handle = fopen("../../Examples/INPUT-OUTPUT/exemplo.txt", 'r');
````  

Na plataforma Windows, tenha cuidado de escapar qualquer barra invertida usada no caminho do arquivo, ou use barras normais.

````php
<?php
$handle = fopen("c:\\data\\info.txt", "r");
````

Se filename for uma URL, o PHP busca um manipulador de protocolo (wrapper) para
aquele scheme. Se não possuir nenhum wrapper registrado para aquele protocolo,
o PHP irá dar um aviso e interpretará a URL como um nome de arquivo.

Exemplo:
````php
<?php
$handle = fopen("http://www.example.com/", "r");
$handle = fopen("ftp://user:password@example.com/somefile.txt", "w");
$handle = fopen("naoExiste://www.example.com/", "r");
````

> Nota:
A lista de protocolos suportados pode ser encontrada em [Protocolos e Wrappers](https://php.net/manual/pt_BR/wrappers.php) suportados. Alguns protocolos (também mencionados como wrappers) suportam context e/ou opções do php.ini.

* **mode**  
Especifica o tipo de acesso a stream.


**Lista dos possíveis modos de fopen() utilizando mode**  

| mode                | Descrição |
|-----------------------|---------------------|
| 'r' | 	Abre somente para leitura; coloca o ponteiro do arquivo no começo do arquivo. |
| 'r+' | Abre para leitura e escrita; coloca o ponteiro do arquivo no começo do arquivo. |
| 'w'	| Abre somente para escrita; coloca o ponteiro do arquivo no começo do arquivo e reduz o comprimento do arquivo para zero. Se o arquivo não existir, tenta criá-lo. |
| 'w+' | Abre para leitura e escrita; coloca o ponteiro do arquivo no começo do arquivo e reduz o comprimento do arquivo para zero. Se o arquivo não existir, tenta criá-lo. |
| 'a'	| Abre somente para escrita; coloca o ponteiro do arquivo no final do arquivo. Se o arquivo não existir, tenta criá-lo. |
| 'a+' | Abre para leitura e escrita; coloca o ponteiro do arquivo no final do arquivo. Se o arquivo não existir, tenta criá-lo. |
| 'x'	| Cria e abre o arquivo somente para escrita; coloca o ponteiro no começo do arquivo. Se o arquivo já existir, a chamada a fopen() falhará, retornando FALSE e gerando um erro de nível E_WARNING. Se o arquivo não existir, tenta criá-lo. Isto é equivalente a especificar as flags O_EXCL&#124;O_CREAT para a chamada de sistema open(2). |
| 'x+'	| Cria e abre o arquivo para leitura e escrita; coloca o ponteiro no começo do arquivo. Se o arquivo já existir, a chamada a fopen() falhará, retornando FALSE e gerando um erro de nível E_WARNING. Se o arquivo não existir, tenta criá-lo. Isto é equivalente a especificar as flags O_EXCL&#124;O_CREAT para a chamada de sistema open(2). |

> **Nota**: Quando você escreve um arquivo texto e quer inserir uma quebra de linha, você precisa utilizar o(s) caractere(s) de fim de linha adequado(s) ao seu sistema operacional. Sistemas baseados no Unix utilizam **\n** como caractere de final de linha, sistemas baseados no Windows utilizam **\r\n** e sistemas baseados no Macintosh utilizam **\r**.

O modo de tradução padrão depende da SAPI e da versão do PHP que você estiver usando, então você é encorajado a sempre utilizar a flag apropriada por razões de portabilidade. Você deve usar o modo 't' se estiver trabalhando em arquivos texto simples e utilizar \n para delimitar as linhas em seu script, de forma que você pode esperar que eles sejam lidos em outras aplicações como o Notepad. Você deve usar 'b' em todos os outros casos.

Para usar essas flags, informe ou 'b' ou 't' como o último caractere no parâmetro mode.

````php
<?php
$handle = fopen("c:\\data\\info.txt", "rt");
````

Para portabilidade, é fortemente recomendado que você sempre utilize a flag 'b' quando abrir arquivos com fopen(). Também é fortemente recomendado que você reescreva códigos que utilizem ou confiem no modo 't', de forma que passem a utilizar os fins de linha corretos e o modo 'b'.

* **Parâmetros opcionais**

  * use_include_path

   Pode ser definido para '1' ou TRUE se você quiser buscar o arquivo também no include_path.

  * context

    Ver sessão Stream

**Retorno**

fopen() retorna um ponteiro do arquivo aberto (chamado de handle) ou, no caso de falha, **FALSE** além de gerar um erro **E_WARNING** que pode ser suprimido com @.

### fread()

````php
<?php
string fread ( resource $handle , int $length )
````

fread() lê até **length** bytes do ponteiro de arquivo informado em **handle**. A leitura é interrompida quando uma das seguintes condições são satisfeitas:
* **length** bytes foram lidos
* EOF (end of file - final do arquivo) é alcançado
* um pacote tornou-se disponível (para network streams)
* 8192 bytes foram lidos (depois de abrir um stream)

Exemplo:
````php
<?php
$filename = "../../Examples/INPUT-OUTPUT/exemplo.txt";
$handle = fopen($filename, "rb");
$conteudo = fread ($handle, filesize ($filename));
fclose ($handle);

var_dump($conteudo);
````

>**Aviso** Ao ler de qualquer coisa que não seja um arquivo local comum, tal como de streams retornados ao ler arquivos remotos, ou de popen() e fsockopen(), a leitura irá parar depois que um pacote esteja disponível. Isto significa que você deve juntar os dados em blocos como demonstrado nos exemplos abaixo.

````php
<?php
$handle = fopen("http://www.example.com/", "rb");
$contents = stream_get_contents($handle);
fclose($handle);
````

### fclose()
O arquivo apontado por handle é fechado.  O ponteiro para o arquivo tem que ser válido e tem que apontar para um arquivo aberto por fopen() ou fsockopen().
Retorna TRUE em caso de sucesso ou FALSE em caso de falha.

Exemplo:
````php
<?php

  $handle = fopen('qualquerarquivo.txt', 'r');

  fclose($handle);
````

---

##  Recursos de escrita

### fwrite()

fwrite() escreve o conteúdo da string para o stream de arquivo apontado por handle.
Se o argumento **length** for dado, a escrita irá parar depois que **length** bytes tenham sido escritos ou o final da string seja alcançado, o que vier primeiro.

Exemplo:
````php
<?php
$fp = fopen('data.txt', 'w');
fwrite($fp, '1', 1);
fclose($fp);
````

>**Nota:** Se escrevendo duas vezes para o ponteiro do arquivo, então a informação será adicionado ao final do contéudo do arquivo, significando que o exemplo abaixo não funcionaria como esperado:

````php
<?php
$fp = fopen('data.txt', 'w');
fwrite($fp, '1');
fwrite($fp, '23');
fclose($fp);

// o conteúdo de 'data.txt' agora é 123 e não 23!
````

fwrite() retorna o número de bytes escritos, ou **FALSE** em caso de erro.

### fputs()

Esta função é um apelido para: fwrite().

### fputcsv()

fputcsv() formata uma linha (passada como um array de campos **fields**) como CSV e a escreve (terminando com uma nova linha).

````php
<?php
$lista = array('aaa', 'bbb', 'ccc', 'dddd');
$fp = fopen('arquivo.csv', 'w');
fputcsv($fp,$lista, ";");
fclose($fp);
// aaa,bbb,ccc,dddd
````

### fprintf()

Escreve uma string produzida de acordo com a string de formato **format** para o recurso de stream.
O **format** é o mesmo aceito na função sprintf.

Exemplo:
```php
<?php
$fp = fopen('currency.txt', 'w');
$money1 = 68.75;
$money2 = 54.35;
$money = $money1 + $money2;
// echo $money irá mostrar "123.1";
$len = fprintf($fp, '%01.2f', $money);
// will write "123.10" to currency.txt
```

---

## Saída de arquivo

### fpassthru()

Lê até o fim do arquivo (EOF) do ponteiro de arquivo dado e imprime os resultados para o buffer de saída.

Exemplos:

```php
<?php
$file = fopen("../../Examples/INPUT-OUTPUT/exemplo.txt","rb");
fgets($file);
echo fpassthru($file);
fclose($file);
```

Se um error ocorrer, a função fpassthru() retorna **FALSE**. No sucesso, fpassthru() retorna o número de caracteres lidos do handle e passado para a exibição.

### readfile()

Lê um arquivo e escreve o seu conteúdo para o buffer de saída (output buffer). Diferente de fpassthru(), não é necessário mover o ponteiro já que readfile() lê todo o arquivo.

Retorna o número de bytes lidos do arquivo. Se um erro ocorrer, **FALSE** é retornado a menos que a função seja chamada com **@readfile()**, um erro é imprimido.

````php
<?php
$file = fopen("../../Examples/INPUT-OUTPUT/exemplo.txt","rb");
fgets($file);
echo readfile($file);
fclose($file);
````

---

## Funções de operação de arquivo

### Diretórios

* **chdir** — Muda o diretório
* **chroot** — Muda o diretório raiz (root)
  >**Notas**: Esta função somente está disponível se seu sistema suportá-la e se você estiver utilizando o modo CLI, CGI ou SAPI Embutida. Também, esta função requer privilégio root.
  E não é implementada na plataforma Windows
* **closedir** — Fecha o manipulador do diretório
* **opendir** — Abre o manipulador do diretório
* **disk_total_space** — Retorna o tamanho total do diretório
* **disk_free_space** sinônimo de **diskfreespace** — Retorna o espaço disponível no diretório
* **is_dir** — Diz se o caminho é um diretório
* **mkdir** — Cria um diretório
* **rmdir** — Remove um diretório
* **dirname** — Retorna o caminho/path do diretório pai
> 7.0.0 - Adicionado o parâmetro opcional levels.
> levels: O número de diretórios pai para subir.

```php
<?php
 echo dirname("/etc/passwd") . PHP_EOL; // => /etc
 echo dirname("/etc/") . PHP_EOL; // => / (ou \ no Windows)
 echo dirname(".") . PHP_EOL; // =>  .
 echo dirname("/usr/local/lib", 2); // =>  /usr

```

#### Arquivo de Informação

**finfo** é um módulo que tenta descobrir o *content type* e o encode de um arquivo, verificando uma certa sequência de bytes específica no arquivo.

* **finfo_open** - Cria um novo recurso de fileinfo
* **finfo_file** -  Retorna informação sobre um arquivo.
* **finfo_close** - Fecha um recurso de fileinfo

Exemplo:
````php
<?php
$file = fopen("../../Examples/INPUT-OUTPUT/exemplo.txt","r");
$finfo = finfo_open();
$fileinfo = finfo_file($finfo, $file, FILEINFO_MIME);
finfo_close($finfo);
fclose($file);

````

Constantes pré definidas:
* **FILEINFO_NONE** - não faz nenhum tratamento
* **FILEINFO_MIME_TYPE** - retorna o tipo MIME
* **FILEINFO_MIME_ENCODING** - retorna o encode MIME
* **FILEINFO_MIME** - retorna o tipo e o encode MIME

#### Arquivo de Sistema

* **basename** — Retorna a parte nome do arquivo do caminho/path
* **chgrp** — Modifica o grupo do arquivo (Esta função não trabalha com arquivos remotos)
* **chmod** — Modifica as permissões do arquivo (Esta função não trabalha com arquivos remotos)
* **chown** — Modifica o dono do arquivo (Esta função não trabalha com arquivos remotos)

* **clearstatcache** — Limpa as informações em cache sobre arquivos.  
Esta função limpa todas as informações que o PHP mantém sobre um arquivo.O PHP não guarda informação de cache sobre arquivos que não existem. Entretanto, unlink() limpa o cache automaticamente.

* **copy** — Copia arquivo
* **feof** — Testa pelo fim-de-arquivo (eof) em um ponteiro de arquivo
* **fgetc** — Lê um caracter do ponteiro de arquivo
* **fgetcsv** — Lê uma linha do ponteiro de arquivos e a interpreta como campos CSV. Retorna um array contendo os campos lidos. Uma linha em branco em um arquivo CSV será retornada como um array contendo um único campo nulo (null) e não será tratada como um erro.
* **fgets** — Lê uma linha de um ponteiro de arquivo
* **file_exists** — Checa se um arquivo ou diretório existe

* **file_get_contents** — Lê todo o conteúdo de um arquivo para uma string. É é o método preferível para ler o conteúdo de um arquivo em uma string. Ela usa técnicas de mapeamento de memória suportadas pelo seu SO para melhorar a performance. É binary-safe.  
Exemplo:
````php
<?php
echo file_get_contents("../../Examples/INPUT-OUTPUT/exemplo.txt");
````
file_get_contents não possui limite de input, diferente de fread.
> NOTA:  7.1.0	Support for negative offsets has been added.

* **file_put_contents** — Escreve uma string para um arquivo.  
Esta função é idêntica à chamar fopen(), fwrite() e fclose() sucessivamente para escrever dados em um arquivo. É binary-safe.  
Exemplo:
````php
<?php
echo file_put_contents("../../Examples/INPUT-OUTPUT/exemplo.txt", "Kit Kat\n");
````
>NOTA: Adicionado suporte às flags (terceiro parametro) FILE_TEXT e FILE_BINARY
> - FILE_TEXT	: Os dados de data são escritos em modo texto
> - FILE_BINARY : Os dados de data serão escritos em modo binário.

* **file** — Lê todo o arquivo para um array
>>NOTA: Adicionado suporte às flags (segundo parametro) FILE_TEXT e FILE_BINARY
* **fileatime** — Obtém o último horário de acesso do arquivo
* **filemtime** — Obtém o tempo de modificação do arquivo
* **filegroup** — Lê o grupo do arquivo
* **fileowner** — Lê o dono (owner) do arquivo
* **fileperms** — Lê as permissões do arquivo
* **filesize** — Lê o tamanho do arquivo
* **filetype** — Lê o tipo do arquivo.  Os valores possíveis são fifo, char, dir, block, link, file, socket e unknown
* **fscanf** — Interpreta a leitura de um arquivo de acordo com um formato. A função fscanf() é semelhante à sscanf().

* **fseek** — Procura (seeks) em um ponteiro de arquivo.  
Exemplo:  

````php
<?php
$filename = "../../Examples/INPUT-OUTPUT/exemplo.txt";
$handle = fopen($filename, "rb");

// lê alguns dados
$data = fgets($handle, 4096);

// move de volta para o inicio do arquivo
// o mesmo que rewind($handle);
fseek($handle, 0);

fclose ($handle);
````
>**Nota:**
Se você abriu o arquivo em modo de adição (a ou a+), quaisquer dados que você escreva no arquivo serão sempre acrescentados ao final, independente da posição do arquivo, e o resultado da chamada de fseek() será undefined.

* **fstat** — Lê informações sobre um arquivo usando um ponteiro de arquivo aberto
* **ftell** — Retorna a posição de leitura/gravação do ponteiro do arquivo
* **ftruncate** — Reduz um arquivo a um tamanho especificado. Se o tamanho especificado for maior que o arquivo, o arquivo será estendido com bytes nulos. Se o tamanho especificado for menor, os dados extras serão perdidos. O ponteiro do arquivo não é alterado.

* **glob** — Acha caminhos que combinam com um padrão.  
A função glob() procura por todos os caminhos que combinem com o padrão pattern de acordo com as regras usadas pela função glob() da libc, que é semelhante às regras usadas por shells comuns.  
Retorna um array contendo os arquivos/diretórios que combinaram, um array vazio se nenhum arquivo combinou ou **FALSE** em caso de erro.  
Exemplo:
````php
<?php
foreach (glob("*.txt") as $arquivo) {
    echo "tamanho de $arquivo " . filesize($arquivo) . "\n";
}
````
>**Notas:** Esta função não trabalha com arquivos remotos. Esta função não está disponível em alguns sistemas não GNU.  

* **is_executable** — Diz se um arquivo é executável
* **is_file** — Informa se o arquivo é um arquivo comum (não é diretório)
* **is_link** — Diz se o arquivo é um link simbólico (symbolic link)
* **is_readable** — Diz se o arquivo existe e se ele pode ser lido
* **is_uploaded_file** — Diz se o arquivo foi enviado por POST HTTP
* **is_writable** — Diz se o arquivo pode ser modificado.
* **is_writeable** — Sinônimo de is_writable
* **link** — cria um link físico
* **linkinfo** — Esta função é usada para verificar se um link (apontado por path) realmente existe.
* **lstat** — Retorna um array com informações sobre um arquivo ou link simbólico. Difere de fstat que retorna apenas do ponteiro.
* **move_uploaded_file** — Move um arquivo enviado para uma nova localização
* **parse_ini_file** — Interpreta um arquivo de configuração. Carrega o arquivo INI especificado e retorna as configurações contidas nele em um array associativo. A estrutura do arquivo INI é a mesma do php.ini.
>7.0.0 - Hash marks (#) are no longer recognized as comments.

* **pathinfo** — Retorna informações sobre um caminho de arquivo.  
Retorna um array associativo contendo inforamações sobre o caminho.  
É possível especificar quais elementos são retornados com o parâmetro opcional. Ele é composto de **PATHINFO_DIRNAME**, **PATHINFO_BASENAME**, **PATHINFO_EXTENSION** e **PATHINFO_FILENAME**. O padrão é retornar todos os elementos.  
Exemplo:  

````php
<?php
$path_parts = pathinfo('/www/htdocs/index.html');

echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
echo $path_parts['extension'], "\n";
echo $path_parts['filename'], "\n";
````

* **popen** — Abre um processo como ponteiro de arquivo.  
Retorna um ponteiro de arquivo idêntico ao retornado por fopen(), exceto que ele é unidirecional (somente pode ser usado para leitura ou gravação) e tem que ser fechado com pclose. Este ponteiro pode ser usado com fgets(), fgetss() e fwrite().  

````php
<?php
$handle = popen("tail -f /etc/httpd/logs/access.log 2>&1", 'r');
while(!feof($handle)) {
    $buffer = fgets($handle);
    echo "$buffer<br/>\n";
    ob_flush();
    flush();
}
pclose($handle);
````

* **pclose** — Fecha um processo de um ponteiro de arquivo
* **readlink** — Retornar o alvo de um link simbólico

* **realpath** — Retorna o path absoluto canonicalizado. Exemplos:  

````php
<?php
chdir('/var/www/');
echo realpath('./../../etc/passwd');
````

````php
<?php
echo realpath('/windows/system32');
````

* **rename** — Renomeia um arquivo ou diretório. Também pode ser usado para mover:  
  ````php
  <?php
  rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
  ````

* **rewind** — Reinicializa a posição do ponteiro de arquivos para o início
* **stat** — Obtem informações sobre um arquivo. lstat() é idêntica a stat() exceto que ela foi baseada no status de links simbólicos.  
* **symlink** — Cria um link simbólico

* **tempnam**  — Cria um nome de arquivo único.  
Cria um arquivo, com permissão de acesso definida para 0600, no diretório especificado. Se o diretório não existe, tempnam() pode gerar o nome de arquivo no diretório temporário do sistema. Retorna o nome gerado.

* **tmpfile** — Cria um arquivo temporário.  
Cria um arquivo temporário com um nome único em modo de leitura-gravação (w+) e retorna o manipulador do arquivo. fclose() destrói o arquivo.  
Exemplo:
````php
<?php
$temp = tmpfile();
fwrite($temp, "escrevendo no arquivo temporario");
fseek($temp, 0);
echo fread($temp, 1024);
fclose($temp); // isto remove o arquivo
````

* **touch** — Muda o tempo de modificação do arquivo
* **unlink** — Apaga um arquivo

---

## Streams

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

**stream_copy_to_stream**: A função stream_copy_to_stream () é usada para copiar dados de um fluxo para outro. É principalmente útil na cópia de dados entre dois arquivos abertos

### php:// Wrapper

Wrapper próprio do php para stream de I/O.  
Os wrappers básicos que mapeiam os recursos de I\O são **php://stdin**, **php://stdout**, e **php://stderr**.  
**php://input** ẽ um wrapper de apenas leitura que recupera os dados do corpo de requisição de um POST.  
**php://memory** e **php://temp** são wrappers usados para ler e escrever dados temporários. No primeiro caso, os dados são gravados na memória, e no segundo, em um arquivo temporário.

### Stream Contexts

Exemplo de contexto utilizado para alterar um comportamento do wrapper de HTTP:

```php
<?php

$hw = 'Hello World';

$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=> "Auth: SecretAuthTokenrn" .
               "Content-type: 'application/x-www-form-urlencodedrn'" .
               "Content-length: " . strlen($hw),
    'content' => $hw
  )
);
$default = stream_context_get_default($opts);
readfile('http://localhost/exemplos/php_input_2.php');
```

Para criar um contexto alternativo:
```php
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
```
Para recuperar as opções, basta utilizar **stream_context_get_options**.

### Filtros

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

---
