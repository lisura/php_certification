# Função

## Argumentos

Informações podem ser passadas para a função através da lista de argumentos/parâmetros. A lista de argumentos é separada por vírgulas e os argumentos são avaliados da esquerda pra direita.

Argumentos podem ser passados de duas formas:

* Por valor (padrão): Cria uma cópia do argumento e qualquer alteração permanece apenas no escopo da função. São os exemplos que temos visto até então.
* Por referência: Passamos a referência para a variável original, cujas alterações efetuadas na função serão mantidas após o término da execução. Veremos com detalhe na próxima aula

```php
<?php
function QuicoCara ($x,$x='sua',$x='minha'){
	echo "Você não vai com a ". $x ." cara?";
}

QuicoCara('tua');
```

Temos algumas funções nativas PHP para lidar com argumentos.
* int func_num_args ( void ): Retorna o número de argumentos passados para a função
* mixed func_get_arg ( int $arg_num ): Retorna um item de uma lista de argumentos
* array func_get_args ( void ): Retorna um array contendo a lista de argumentos

```php
<?php
<?php
function alunos()
{
    $numargs = func_num_args();
	echo "Total de alunos na classe do Professor Girafalez: $numargs<br/>";
    if ($numargs >= 2) {
        echo "Segundo aluno a chegar: " . func_get_arg(1) . "<br/>";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        echo "Aluno $i: " . $arg_list[$i] . "<br/>";
    }
}

alunos("Nhonho", "Godinez", "Pópis", "Quico", "Chiquinha", "Chaves");
```

## Valores Padrão

Argumetos podem ter valores padrão, assim caso uma variável não seja passada como parâmetro, uma nova variável é criada, recebendo o valor padrão.

```php
<?php
function corrigeChaves($a,$textocerto,$textoerrado="Massacote") { 
	if($a<6){
		if($a%2 == 0) 
			echo "-E como eu disse?<br>-".$textoerrado."!<br>";
		else echo "-E como é?<br>-".$textocerto."!<br>";
		corrigeChaves($a+1,$textocerto,$textoerrado);
	} else{
		echo "-E como eu di...<br><h1>AI CALE-SE, CALE-SE, CALE-SE, VOCÊ ME DEIXA LOOUUU...CO!!!</h1>";
	}
}

corrigeChaves(1,"Planta","Pranta"); //OK
//corrigeChaves(1); //warning Missing Argument
corrigeChaves(3,"Mascote"); //OK
```

Quanto a variáveis padrão, temos que ter cuidado com a colocação dos argumentos que recebem valor padrão.
```php
<?php
//Errado
function divida($meses=14, $inquilino){ 
	echo $inquilino . " deve " . $meses . " meses de aluguel!<br/>";
}
divida(16,"Seu Madruga");
divida("Seu Madruga"); //erro

//Correto
function dividaCerta($inquilino, $meses=14){ 
	echo $inquilino . " deve " . $meses . " meses de aluguel!<br/>";
}
dividaCerta("Seu Madruga", 16);
dividaCerta("Seu Madruga"); //correto
```
