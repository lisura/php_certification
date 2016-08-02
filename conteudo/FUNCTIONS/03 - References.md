# Função

## Por Referência

Aqui podemos passar diretamente a variável para ser alterada pela função, dispensando a necessidade de um return por exemplo.

```php
<?php
function levaTapa($SeuMadruga) { 
	$SeuMadruga = false;
	echo "Vamos tesouro, e não se misture com essa gentalha!<br/>";
}

function levaTapaReal(&$SeuMadruga) { 
	$SeuMadruga = false;
	echo "<br/>Vamos tesouro, e não se misture com essa gentalha!<br/>";
}

$SeuMadruga = true;
levaTapa($SeuMadruga);
var_dump($SeuMadruga);
levaTapaReal($SeuMadruga);
var_dump($SeuMadruga);
```