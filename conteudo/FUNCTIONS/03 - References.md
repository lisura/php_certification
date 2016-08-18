# Função

## Por Referência

Aqui podemos passar diretamente a variável para ser alterada pela função, dispensando a necessidade de um return com o valor. Para isso basta adicionar um & na frente do argumento.

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

É importante notar que somente variáveis podem ser passadas por referência, qualquer outra coisa resultará em FATAL ERROR.

```php
<?php
function adicionarElemento(array &$colecao, $elemento=null)
{
	if($elemento!==null)
	{
		$colecao[]=$elemento;
	}
}
$velhodosaco=[];
adicionarElemento($velhodosaco);
adicionarElemento($velhodosaco,'chapéus');
adicionarElemento($velhodosaco,'sapatos');
adicionarElemento($velhodosaco,'roupas usadas');
print_r($velhodosaco);

//adicionarElemento([],'quem tem?'); //ERRO
```

É possível também retornar um valor de uma determinada função por referência. Para isso, basta inserir um & antes do nome da função, e outro & para quem está chamando a função. No exemplo abaixo, a variável $palavraChave está apontando para a propriedade $anoes->palavraChave. Assim, qualquer alteração em $palavraChave ocorrerá também na propriedade apontada por referência, mesmo que seja uma propriedade privada.

```php
<?php
class Anoes {
    private $palavraChave = 'tchuim tchuim tchum clain';
    public function &retornoPorReferencia() {
        return $this->palavraChave;
    }
}

$anoes = new Anoes();
$palavraChave = &$anoes->retornoPorReferencia();

echo "Eis aqui a resposta-chave<br/>Quando alguém perguntar 'Quem sabe?':<br/>$palavraChave";
echo "<br/>".$anoes->retornoPorReferencia();

$palavraChave = "tchuim tchuim, tchuim tchuim tchum clain!";

echo "<br/>".$anoes->retornoPorReferencia();
```
