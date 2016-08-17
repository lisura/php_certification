# Função

## Escopo de Variáveis

Variáveis declaradas nas funções não são visíveis fora das mesmas funções, enquanto que variáveis declaradas fora de funções são visíveis em qualquer lugar fora dessas funções.

```php
<?php
function jovemAinda() { 
	$velho = 'Dr. Chapatin';
	echo "<br>Se você é jovem ainda, jovem ainda, jovem ainda<br>";
	echo 'A bateria é do '.$baterista; //Notice
}

$baterista = 'Quico';
echo 'nome: '.$velho; //Notice
jovemAinda();
echo 'nome: '.$velho; //Notice
```

O resultado acima pode ser diferente com o uso da array $GLOBALS ou da palavra chave global.

```php
<?php
function jovemAinda() { 
	$GLOBALS['velho'] = 'Dr. Chapatin';
	global $baterista;
	echo "<br>Se você é jovem ainda, jovem ainda, jovem ainda<br>";
	echo 'A bateria é do '.$baterista;
}

$baterista = 'Quico';
echo 'nome: '.$velho; //Notice
jovemAinda();
echo '<br>nome: '.$velho
```

## Funções Variáveis

Se uma variável possui um conjunto de parenteses, PHP vai procurar por uma função com o mesmo nome do valor da variável e assim executar a função encontrada. É um recurso muito usado na implementação de callbacks e tabelas de funções. Essa técnica não funciona com constructs do PHP como o echo, unset(), print, empty(), etc...

```php
<?php
function chegadaVila() { 
	echo "-Tinha que ser o Chaves!!!<br>";
	echo '-Foi sem querer querendo...<br><br>';
}

$func = 'chegadaVila';
$func();

$func = 'print';
//$func('o que será que ele quis dizer?'); //FATAL ERROR

function wrapPrint($fala){
  print($fala);
}
$func = 'wrapPrint';
$func('-As quatro operações matemáticas são adição, subtração, multiplicação e divisão!<br>');
$func = 'print_r';
$func('-Ai que burro dá zero pra ele!<br>');
```

Podemos usar também a função call_user_func para chamar a função.
```php
<?php
function chegadaVila() { 
	echo "Dona Florinda: -A Dona Clotilde foi a última a chegar na vila...<br>";
	echo 'Chaves: -Mas foi a primeira a chegar no mundo!<br><br>';
}

function chavesAlimento($pao,$ator){
  if ($pao=='amassado'){
    echo "-Mas ele não amassou com os olhos, ele amassou com...<br/>-Cale-se, ".$ator.'!<br/>';
  	return "-E agora o que que eu vou comer?!";
  }else{
    return "Isso, isso, isso!";
  }
}

call_user_func('chegadaVila');
echo call_user_func('chavesAlimento','amassado','Quico');
```

Além disso métodos também podem ser variáveis.
```php
<?php
class SeuMadrugaProfessor
{
    static $Perigo = '-O que significa essa caveira?<br>';
	function Fala()
    {
        $name = 'Autoridade';
        $this->$name(); // Isto chama o método Bar()
    }

    function Autoridade()
    {
        echo "-Nada de Seu Madruga, é SENHOR PROFESSOR!!<br>";
    }

    static function Perigo()
    {
        echo "-Essa caveira significa prerigo! PRE! RI! GO!!<br>";
    }

    function Psicologia()
    {
        echo "-Só usei um pouco de pepsicologia!<br>";
    }
}

$professor = new SeuMadrugaProfessor();
$aula = "Fala";
$professor->$aula();

echo SeuMadrugaProfessor::$Perigo;
$func = array("SeuMadrugaProfessor", "Perigo");
$func();
$func = array(new SeuMadrugaProfessor, "Psicologia");
$func();
```