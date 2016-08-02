# Função

## Definição

Pacote de códigos que servem como instruções para executar ações. Qualquer código PHP válido pode aparecer em uma função, inclusive classes e outras funções.

Funções não precisam ser chamadas depois de sua definição, a não ser quando a função for definida dentro de uma cláusula condicional.

```php
<?php
HelloChaves(); //funciona
    
function HelloChaves(){
   echo "Lá vem o Chaves, Chaves, Chaves!";
}
```

```php
<?php
HelloWorld(); //não funciona
if(true){
	function HelloWorld(){
		echo "Lá vem o Chaves, Chaves, Chaves!";
	}
	HelloWorld(); //funciona
}
```
Funções já declaradas não podem ser redefinidas, caso contrário será gerado um erro.

Todas as funções e classes em PHP possuem escopo global, podendo ser definidas dentro de uma função e serem executadas fora dela.
```php
<?php
function queTeImporta(){
    echo "Que te importa?<br>";
    function comaTorta(){
    	echo "Coma torta!";
    }
}

queTeImporta();
comaTorta();
```
Nomes de funções não são case-sensitive, ou seja, no exemplo acima podemos chamar a função por comaTorta(), ou comatorta(), ou Comatorta(), etc...

Temos 3 tipos de funções:

* Built-in (fornecidas pelo PHP)
* User-Defined (definidas pelo usuário)
* Fornecida Externamente (Extensões)

## Declarando Funções

Ao declarar funções, parâmetros ou retorno de valores são opcionais.

```php
<?php
function churrosRet() { 
	return "Aqui estão os churros, churros, churros!<br/>";
}

function sucoVal($fruta1,$fruta2,$fruta3) { 
	echo "Este suco aqui é de ".$fruta1.", parece de ".$fruta2." e tem gosto de ".$fruta3."!<br/>";
}

echo churrosRet();
sucoVal("tamarindo", "limão", "carambola"); //OK
```