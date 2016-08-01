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
echo fpassthru($file);
fclose($file);
````

Se um error ocorrer, a função fpassthru() retorna **FALSE**. No sucesso, fpassthru() retorna o número de caracteres lidos do handle e passado para a exibição.
