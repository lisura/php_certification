# HTTP	HEADERS


Hoje	 em	 dia,	 o	 desenvolvimento	 moderno	 abstrai	 várias	 coisas de	nós,	desenvolvedores,	para	nos	tornarmos	produtivos.	Um	desses itens	são	os	cabeçalhos	HTTP.	Muitos	frameworks	abstraem	toda a manipulação	de	cabeçalho,	deixando-nos	apenas	preocupados	como o	que	interessa.	Mas	podemos	manipular	os	 	headers	 	(cabeçalhos) nas	nossas	requisições	e	respostas	HTTP	nativamente.

Apesar	 de	 ser	 uma	 tarefa	 bem	 trabalhosa	 (pois	 cada	 espaço conta,	lembre-se	de	que	estamos	trabalhando	com	HTTP	e,	no	final das	 contas,	 tudo	 se	 tornará	 texto),	 o	 PHP	 torna	 a	 manipulação	 de headers	muito	simples	através	da	função header.

## Função  header()

**Parametros**

* Header String - String con a entrada de Header;
* Replace Boolean - True para sobreescrita;
* Http_response_code String - Força o Code de Http com a String Não Nula de Header.



Para	o	nosso	primeiro	exemplo,	vamos	retornar	ao	nosso	clienteum	conteúdo	em	JSON.	Para	isso,	usaremos	o	cabeçalho	 	Content-Type	 ,	 que	 informa	 o	 tipo	 de	 conteúdo	 que	 está	 sendo enviado/recebido.

```php
<?php

header('Content-Type: application/json');

```

> **NOTA:** https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers

Podemos	 também	 encadear	 diversos	 cabeçalhos	 a	 serem enviados	 chamando	 a	 função	 	header	 	 diversas	 vezes.	 Veja	 que, além	de	utilizarmos	 	Content-Type	 ,	vamos	usar	o	 	HTTP/1.0	200 OK para	indicar	que	a	requisição	foi	aceita	e	a	resposta	foi	recebida com	sucesso	e	sem	nenhum	erro.

```php
<?php
header('HTTP/1.0	200	OK');
header('Content-Type: application/json');

```

Agora	 que	 já	 sabemos	 como	 podemos	 manipular,	 podemos começar	a	enviar	diferentes	códigos	para	ver	como	o	navegador	se comporta.	 Vamos	 mudar	 para	 o	 status	 	 500	 ,	 que	 indica	 que aconteceu	algum	erro	interno	no	servidor	ao	processar	a	requisição enviada.


```php
<?php
header('HTTP/1.0	500	Record	not	found');
header('Content-Type: application/json');
```

Mudamos	 agora	 o	 status	 para	 	500	 ,	 e	 alteramos	 também	 a descrição	 para	 	Record	 not	 found	 	 (Registro	 não	 encontrado). Ao	 inspecionarmos	 a	 resposta,	 vemos	 um	 sinal	 vermelho, indicando	que	ocorreu	algum	erro	internamente	no	servidor.

Na	realidade,	não	ocorreu	nenhum	erro,	nós	apenas	simulamos esse	 erro	 para	 melhor	 entender	 como	 manipular	 os	 cabeçalhos HTTP.

> **Nota:** Para	 aplicações	 executadas	 pela	 linha	 de	 comando	 (CLI), funções	 que	 manipulam	 cabeçalhos	 não	 tem	 nenhum	 efeito, sendo	ignoradas	durante	a	execução	do	script.	Assim	como	as sessões,	os	cabeçalhos	são	um	dos	itens	disponíveis	apenas	para aplicações	 executadas	 através	 de	 um	 servidor	 web,	 e	 não	 em uma	linha	de	comando.

Essa	 função	 possui	 mais	 dois	 tipo	 de	 argumentos	 que	 podemos utilizar	 que	 não	 exploramos	 até	 agora.	 O	 primeiro	 dessa	 lista	 que vamos	 ver	 é	 o	 argumento	 que	 nos	 permite	 substituir	 o	 cabeçalho enviado.	Ele,	por	padrão,	é	definido	como	verdadeiro.	Sendo	assim, o	cabeçalho	que	enviamos	sempre	substituirá	o	anterior,	e	não	nos permite	definir	múltiplos	valores	para	um	mesmo	cabeçalho.

```php
<?php
header('Token:	meu_token');
header('Token:	outro_valor',	false);
```

Finalmente,	 temos	 o	 último	 argumento	 passado	 para	 a	 função 	header	 .	 Ele	 nos	 permite	 forçar	 um	 código	 de	 resposta	 HTTP. Vamos	 continuar	 utilizando	 o	 nosso	 exemplo	 anterior	 com	 o cabeçalho	 	Token	 .


```php
<?php
header('Invalid-Token:	meu_token',	true,	401);
```

## Listando	cabeçalhos

Até	 agora,	 usamos	 o	 navegador	 para	 ver	 quais	 foram	 os cabeçalhos	 enviados.	 Entretanto,	 temos	 uma	 outra	 maneira	 de verificarmos	 se	 algum	 cabeçalho	 foi	 enviado:	 através	 da	 função **header_list**.	Essa	lista	é	um	array	com	todos	os	cabeçalhos	que foram	enviados	para	o	servidor	web.


```php
<?php
header('Invalid-Token:	meu_token',	true,	401);
print_r(headers_list());
```

## Verificando os cabeçalhos enviados

O	PHP	nos	fornece	uma	maneira	de	verificar	se	algum	tipo	de cabeçalho	já	foi	enviado	através	da	função **headers_sent**.

```php
<?php
if	(!headers_sent())	{
  header('Location:	www.casadocodigo.com');
}
```

Podemos	 também	 verificar se os cabeçalhos	 já	 foram	 enviados para	removê-los	através	da	função **header_remove**	:

```php
<?php
if	(!headers_sent())	{
  header_remove();
}
```

No exemplo anterior removemos todos os Headers, caso queiramos remover um Header específico, basta adiciona-lo como parâmetro.
