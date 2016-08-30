# Saída de arquivo

## fpassthru()

Lê até o fim do arquivo (EOF) do ponteiro de arquivo dado e imprime os resultados para o buffer de saída.

Exemplos:

````php
<?php
$file = fopen("http://www.google.com","r");
echo fpassthru($file);
fclose($file);
````

````php
<?php
$file = fopen("../../Examples/INPUT-OUTPUT/exemplo.txt","rb");
fgets($file);
echo fpassthru($file);
fclose($file);
````

Se um error ocorrer, a função fpassthru() retorna **FALSE**. No sucesso, fpassthru() retorna o número de caracteres lidos do handle e passado para a exibição.

## readfile() 
Lê um arquivo e escreve o seu conteúdo para o buffer de saída (output buffer). Diferente de fpassthru(), não é necessário mover o ponteiro já que readfile() lê todo o arquivo.

Retorna o número de bytes lidos do arquivo. Se um erro ocorrer, **FALSE** é retornado a menos que a função seja chamada com **@readfile()**, um erro é imprimido.

````php
<?php
$file = fopen("../../Examples/INPUT-OUTPUT/exemplo.txt","rb");
fgets($file);
echo readfile($file);
fclose($file);
````
