# Funções de operação de arquivo

## Diretórios

* **chdir** — Muda o diretório
* **chroot** — Muda o diretório raiz (root)
  >**Notas**: Esta função somente está disponível se seu sistema suportá-la e se você estiver utilizando o modo CLI, CGI ou SAPI Embutida. Também, esta função requer privilégio root.
  E não é implementada na plataforma Windows

* **closedir** — Fecha o manipulador do diretório
* **dir** — Retorna uma instância da classe Diretório
* **dirname** — Retorna o caminho/path do diretório pai
* **disk_free_space** — Retorna o espaço disponível no diretório
* **disk_total_space** — Retorna o tamanho total do diretório
* **disk_free_space** sinônimo de **diskfreespace** — Retorna o espaço disponível no diretório
* **is_dir** — Diz se o caminho é um diretório
* **mkdir** — Cria um diretório

### Arquivo de Informação

**finfo** é um módulo que tenta descobrir o *content type* e o encode de um arquivo, verificando uma certa sequência de bytes específica no arquivo.

* **finfo_open** — Cria um novo recurso de fileinfo
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

### Arquivo de Sistema

* **basename** — Retorna a parte nome do arquivo do caminho/path
* **chgrp** — Modifica o grupo do arquivo
* **chmod** — Modifica as permissões do arquivo
* **chown** — Modifica o dono do arquivo

* **clearstatcache** — Limpa as informações em cache sobre arquivos.  
Esta função limpa todas as informações que o PHP mantém sobre um arquivo.O PHP não guarda informação de cache sobre arquivos que não existem. Entretanto, unlink() limpa o cache automaticamente.

* **copy** — Copia arquivo
* **feof** — Testa pelo fim-de-arquivo (eof) em um ponteiro de arquivo
* **fgetc** — Lê um caracter do ponteiro de arquivo
* **fgetcsv** — Lê uma linha do ponteiro de arquivos e a interpreta como campos CSV. Retorna um array contendo os campos lidos.
* **fgets** — Lê uma linha de um ponteiro de arquivo
* **file_exists** — Checa se um arquivo ou diretório existe

* **file_get_contents** — Lê todo o conteúdo de um arquivo para uma string. É é o método preferível para ler o conteúdo de um arquivo em uma string. Ela usa técnicas de mapeamento de memória suportadas pelo seu SO para melhorar a performance. É binary-safe.  
Exemplo:
````php
<?php
echo file_get_contents("../../Examples/INPUT-OUTPUT/exemplo.txt");
````
file_get_contents não possui limite de input, diferente de fread.

* **file_put_contents** — Escreve uma string para um arquivo.  
Esta função é idêntica à chamar fopen(), fwrite() e fclose() sucessivamente para escrever dados em um arquivo. É binary-safe.  
Exemplo:
````php
<?php
echo file_put_contents("../../Examples/INPUT-OUTPUT/exemplo.txt", "Kit Kat\n");
````

* **file** — Lê todo o arquivo para um array
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

* **touch** — Muda o tempo de modificação do arquivo
* **unlink** — Apaga um arquivo
