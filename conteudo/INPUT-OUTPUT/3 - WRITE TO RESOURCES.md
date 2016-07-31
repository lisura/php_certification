#  Recursos de escrita

## fwrite()
fwrite() escreve o conteúdo da string para o stream de arquivo apontado por handle.

Exemplo:
````php
<?php
$fp = fopen('data.txt', 'w');
fwrite($fp, '1');
fclose($fp);
````
Se o argumento **length** for dado, a escrita irá parar depois que **length** bytes tenham sido escritos ou o final da string seja alcançado, o que vier primeiro.

Exemplo:
````php
<?php
$fp = fopen('data.txt', 'w');
fwrite($fp, '1', 1);
fclose($fp);
````

>**Nota:**
Se escrevendo duas vezes para o ponteiro do arquivo, então a informação será adicionado ao final do contéudo do arquivo, significando que o exemplo abaixo não funcionaria como esperado:

````php
<?php
$fp = fopen('data.txt', 'w');
fwrite($fp, '1');
fwrite($fp, '23');
fclose($fp);

// o conteúdo de 'data.txt' agora é 123 e não 23!
````

fwrite() retorna o número de bytes escritos, ou **FALSE** em caso de erro.

## fputs()
Esta função é um apelido para: fwrite().

[Exercício]()

## fputcsv()
fputcsv() formata uma linha (passada como um array de campos **fields**) como CSV e a escreve (terminando com uma nova linha).

Exemplos:
````php
<?php
$lista = array (
     array('aaa', 'bbb', 'ccc', 'dddd'),
     array('123', '456', '789'),
     array('"aaa"', '"bbb"')
);

$fp = fopen('arquivo.csv', 'w');

 foreach ($lista as $linha) {
     fputcsv($fp, $linha);
}

fclose($fp);
````

````php
<?php
$lista = array('aaa', 'bbb', 'ccc', 'dddd');

$fp = fopen('arquivo.csv', 'w');

fputcsv($fp,explode(';',$lista), ";");

fclose($fp);
````

## fprintf()
Escreve uma string produzida de acordo com a string de formato **format** para o recurso de stream.
O **format** é o mesmo aceito na função sprintf.

Exemplo:
````php
<?php
$fp = fopen('currency.txt', 'w');

$money1 = 68.75;
$money2 = 54.35;
$money = $money1 + $money2;
// echo $money irá mostrar "123.1";

$len = fprintf($fp, '%01.2f', $money);
````
