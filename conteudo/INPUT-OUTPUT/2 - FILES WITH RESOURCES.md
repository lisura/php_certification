# Recursos de arquivos

## fopen()  
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

Quando você escreve um arquivo texto e quer inserir uma quebra de linha, você precisa utilizar o(s) caractere(s) de fim de linha adequado(s) ao seu sistema operacional. Sistemas baseados no Unix utilizam \n como caractere de final de linha, sistemas baseados no Windows utilizam \r\n e sistemas baseados no Macintosh utilizam \r.

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

fopen() retorna um ponetiro do arquivo aberto (chamado de handle) ou, no caso de falha, **FALSE** além de gerar um erro **E_WARNING** que pode ser suprimido com @.

## fread()

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

## fclose()
O arquivo apontado por handle é fechado.  O ponteiro para o arquivo tem que ser válido e tem que apontar para um arquivo aberto por fopen() ou fsockopen().
Retorna TRUE em caso de sucesso ou FALSE em caso de falha.

Exemplo:
````php
<?php

  $handle = fopen('qualquerarquivo.txt', 'r');

  fclose($handle);
````
