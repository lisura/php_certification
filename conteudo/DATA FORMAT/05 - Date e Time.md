# DATA FORMATS AND TYPES - Date & Time

## Definição

As funções de Data e Hora do PHP permitem recuperar a data e a hora do servidor onde o PHP está sendo executado. Pode-se usar estas funções para formatar a saída de data e hora de muitas maneiras diferentes.

As informações de data e hora são armazenadas internamente como números em 64-bit, sendo assim, todas as datas concebíveis (inclusive anos negativos) são suportadas. O intervalo vai de 292 bilhões de anos no passado até a mesma quantidade no futuro. 

Os valores retornados refletem a configuração local do servidor, bem como datas especiais como horário de verão, ano bissexto, etc.

Esta extensão não possui dependências de bibliotecas, e seu funcionamento depende das configurações definidas no php.ini

|Nome|Padrão|
|----|------|
|date.default_latitude|"31.7667"|
|date.default_longitude|"35.2333"|
|date.sunrise_zenith|"90.583333"|
|date.sunset_zenith|"90.583333"|
|date.timezone|""|

## date

Temos várias funções para lidar com manipulação de datas, sendo a função date a mais usada:

```php
string date ( string $format [, int $timestamp ] )
```

Onde $timestamp é um integer Unix timestamp cujo padrão é a hora local se o timestamp não for informado (retorno da função time()).
$format pode ser uma string que contenha os caracteres das tabelas abaixo:

**Dia**

|Caractere|Descrição|Exemplo de valores retornados|
|---------|---------|-----------------------------|
|d| 	Dia do mês, 2 dígitos com zero à esquerda| 	01 até 31|
|D| 	Uma representação textual de um dia, três letras| 	Mon até Sun|
|j| 	Dia do mês sem zero à esquerda| 	1 até 31|
|l| ('L' minúsculo) 	A representação textual completa do dia da semana| 	Sunday até Saturday|
|N| 	Representação numérica ISO-8601 do dia da semana (adicionado no PHP 5.1.0)| 	1 (para Segunda) até 7 (para Domingo)|
|S| 	Sufixo ordinal inglês para o dia do mês, 2 caracteres| 	st, nd, rd ou th. Funciona bem com j|
|w| 	Representação numérica do dia da semana| 	0 (para domingo) até 6 (para sábado)|
|z| 	O dia do ano (iniciando em 0)| 	0 até 365|

**Semana**

|Caractere|Descrição|Exemplo de valores retornados|
|---------|---------|-----------------------------|
|W| 	Número do ano da semana ISO-8601, começa na Segunda (adicionado no PHP 4.1.0)| 	Exemplo: 42 (a 42ª semana do ano)|

**Mês**

|Caractere|Descrição|Exemplo de valores retornados|
|---------|---------|-----------------------------|
|F| 	Um representação completa de um mês, como January ou March| 	January até December|
|m| 	Representação numérica de um mês, com zero à esquerda| 	01 a 12|
|M| 	Uma representação textual curta de um mês, três letras| 	Jan a Dec|
|n| 	Representação numérica de um mês, sem zero à esquerda| 	1 a 12|
|t| 	Número de dias de um dado mês| 	28 até 31|

**Ano**

|Caractere|Descrição|Exemplo de valores retornados|
|---------|---------|-----------------------------|
|L| 	Se está em um ano bissexto| 	1 se está em ano bissexto, 0, caso contrário.
|o| 	Número do ano ISO-8601. Este tem o mesmo valor como Y, exceto que se o número da semana ISO (W) pertence ao anterior ou próximo ano, o ano é usado ao invés. (adicionado no PHP 5.1.0)| 	Exemplos: 1999 ou 2003|
|Y| 	Uma representação de ano completa, 4 dígitos| 	Exemplos: 1999 ou 2003|
|y| 	Uma representação do ano com dois dígitos| 	Exemplos: 99 ou 03|

**Tempo**

|Caractere|Descrição|Exemplo de valores retornados|
|---------|---------|-----------------------------|
|a| 	Antes/Depois de meio-dia em minúsculo| 	am or pm|
|A| 	Antes/Depois de meio-dia em maiúsculo| 	AM or PM|
|B| 	Swatch Internet time| 	000 até 999|
|g| 	Formato 12-horas de uma hora sem zero à esquerda| 	1 até 12|
|G| 	Formato 24-horas de uma hora sem zero à esquerda| 	0 até 23|
|h| 	Formato 12-horas de uma hora com zero à esquerda| 	01 até 12|
|H| 	Formato 24-horas de uma hora com zero à esquerda| 	00 até 23|
|i| 	Minutos com zero à esquerda| 	00 até 59|
|s| 	Segundos, com zero à esquerda| 	00 até 59|
|u| 	Microssegundos (adicionado no PHP 5.2.2). Note que a função date() sempre gerará 000000, já que aceita um parâmetro integer, enquanto que DateTime::format() possui suporte a microssegundos se DateTime foi criado com microssegundos.| 	Example: 654321|

**Fuso horário**

|Caractere|Descrição|Exemplo de valores retornados|
|---------|---------|-----------------------------|
|e| 	Identificador do fuso horário (adicionado no PHP 5.1.0)| 	Exemplos: UTC, GMT, Atlantic/Azores|
|I| (i maiúsculo) 	Se a data está ou não no horário de verão| 	1 se horário de verão, 0, caso contrário.|
|O| 	Deslocamento ao Horário de Greenwish (GMT) em horas| 	Exemplo: +0200|
|P| 	Deslocamento ao Horário de Greenwish (GMT) com dois pontos entre horas e minutos (adicionado no PHP 5.1.3)| 	Exemplo: +02:00|
|T| 	Abreviação do fuso horário| 	Exemplos: EST, MDT ...|
|Z| 	Deslocamento, em segundos, do fuso horário. O deslocamento para fusos horários a oeste de UTC sempre será negativa, e para aqueles à leste de UTC sempre será positiva.| 	-43200 até 50400|

**Data/Hora completa**

|Caractere|Descrição|Exemplo de valores retornados|
|---------|---------|-----------------------------|
|c| 	Data ISO 8601 (adicionado no PHP 5)| 	2004-02-12T15:19:21+00:00|
|r| 	RFC 2822 formatted date| 	Exemplo: Thu, 21 Dec 2000 16:01:07 +0200|
|U| 	Segundos desde Unix Epoch (January 1 1970 00:00:00 GMT)| 	Veja também time()|

Exemplo:
```php
<?php
echo date('d/m/Y');

// Escapa os caracteres "t","h" e "e", exibindo <dia da semana> the <dia do mês sem zero à esquerda>th
echo date("l \\t\h\e jS");
```

EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/datetime/datetime_ex1.php)

## Classe DateTime

Esta classe é uma forma de representar e manipular datas de forma orientada a objetos.

```php
 DateTime implements DateTimeInterface {
    /* Constantes */
      const string ATOM = "Y-m-d\TH:i:sP" ;
      const string COOKIE = "l, d-M-Y H:i:s T" ;
      const string ISO8601 = "Y-m-d\TH:i:sO" ;
      const string RFC822 = "D, d M y H:i:s O" ;
      const string RFC850 = "l, d-M-y H:i:s T" ;
      const string RFC1036 = "D, d M y H:i:s O" ;
      const string RFC1123 = "D, d M Y H:i:s O" ;
      const string RFC2822 = "D, d M Y H:i:s O" ;
      const string RFC3339 = "Y-m-d\TH:i:sP" ;
      const string RSS = "D, d M Y H:i:s O" ;
      const string W3C = "Y-m-d\TH:i:sP" ;
    /* Métodos */
      public __construct ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] )
      public DateTime add ( DateInterval $interval )
      public static DateTime createFromFormat ( string $format , string $time [, DateTimeZone $timezone = date_default_timezone_get() ] )
      public static array getLastErrors ( void )
      public DateTime modify ( string $modify )
      public static DateTime __set_state ( array $array )
      public DateTime setDate ( int $year , int $month , int $day )
      public DateTime setISODate ( int $year , int $week [, int $day = 1 ] )
      public DateTime setTime ( int $hour , int $minute [, int $second = 0 ] )
      public DateTime setTimestamp ( int $unixtimestamp )
      public DateTime setTimezone ( DateTimeZone $timezone )
      public DateTime sub ( DateInterval $interval )
      public DateInterval diff ( DateTimeInterface $datetime2 [, bool $absolute = false ] )
      public string format ( string $format )
      public int getOffset ( void )
      public int getTimestamp ( void )
      public DateTimeZone getTimezone ( void )
      public __wakeup ( void )
}
```

A classe nos fornece alguns tipos de datas padrão para serem usados como constantes.

DateTime::ATOM
DATE_ATOM
->Atom (exemplo: 2005-08-15T15:52:01+00:00) 

DateTime::COOKIE
DATE_COOKIE
->Cookies HTTP (exemplo: Monday, 15-Aug-2005 15:52:01 UTC) 

DateTime::ISO8601
DATE_ISO8601
->ISO-8601 (exemplo: 2005-08-15T15:52:01+0000)
> Nota: Este formato não é compatível com a ISO-8601, mas foi deixado desta forma por razões relacionadas a retrocompatibilidade. Ao invés, use as constantes DateTime::ATOM ou DATE_ATOM para compatibilidade com a ISO-8601. 

DateTime::RFC822
DATE_RFC822
->RFC 822 (exemplo: Mon, 15 Aug 05 15:52:01 +0000) 

DateTime::RFC850
DATE_RFC850
->RFC 850 (exemplo: Monday, 15-Aug-05 15:52:01 UTC) 

DateTime::RFC1036
DATE_RFC1036
->RFC 1036 (exemplo: Mon, 15 Aug 05 15:52:01 +0000) 

DateTime::RFC1123
DATE_RFC1123
->RFC 1123 (exemplo: Mon, 15 Aug 2005 15:52:01 +0000) 

DateTime::RFC2822
DATE_RFC2822
->RFC 2822 (exemplo: Mon, 15 Aug 2005 15:52:01 +0000) 

DateTime::RFC3339
DATE_RFC3339
->Same as DATE_ATOM (since PHP 5.1.3) 

DateTime::RSS
DATE_RSS
->RSS (exemplo: Mon, 15 Aug 2005 15:52:01 +0000) 

DateTime::W3C
DATE_W3C
->World Wide Web Consortium (exemplo: 2005-08-15T15:52:01+00:00) 

> Nota: Os autores do livro "Descomplicando a Certificação PHP" recomendam que se tenha em mente essas constantes do DateTime para a prova de certificação

Uma instância de DateTime pode ser iniciada das duas formas:
```php
public DateTime::__construct ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] ) //Orientado a Objeto
DateTime date_create ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] ) //Procedural
```
Onde $time é a string de data/hora e $timezone é um objeto DateTimeZone indicando o fuso horário do parâmetro $time (se ocultado usa o fuso horário atual. Este último parâmetro é ignorado caso $time seja uma timestamp UNIX ou contenha informação de fuso horário

```php
<?php
//Orientado a Objeto
try {
    $date = new DateTime('2016-01-11');
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}
echo $date->format('Y-m-d');

//Procedural
$date = date_create('2016-01-11');
if (!$date) {
    $e = date_get_last_errors();
    foreach ($e['errors'] as $error) {
        echo "$error\n";
    }
    exit(1);
}
echo date_format($date, 'Y-m-d');
```

Caso eu queira alterar a data com acréscimo ou subtração, devo usar o seguinte método
```php
public DateTime DateTime::add ( DateInterval $interval )
DateTime date_add ( DateTime $object , DateInterval $interval )
```
Onde $interval é um objeto DateInterval, especificado logo abaixo:

```php
DateInterval {
  /* Propriedades */
  public inteiro $y ; //Ano
  public inteiro $m ; //mês
  public inteiro $d ; //dia
  public inteiro $h ; //hora
  public inteiro $i ; //minutos
  public inteiro $s ; //segundos
  public inteiro $invert ; //Se for intervalo negativo, o valor será 1. Caso contrário, será 0
  public mixto $days ; //Se este objeto for criado por DateTime::diff, retorna o número de dias entre a data inicial e final, senão retorna FALSE
  /* Métodos */
  public __construct ( string $interval_spec )
  public static DateInterval createFromDateString ( string $time )
  public string format ( string $format )
}
```

No nosso caso temos que nos atentar à forma como devemos instanciar esse objeto para usarmos em DateTime::add. O construtor aceita uma string cujo formato inicia com "P" seguida de números inteiros e caracteres designadores de períodos. Caso haja elementos de tempo, essa porção deve ser precedida por "T".
Exemplo: P2D = 2 dias, PT7S = 7 segundos, P4YT16H = 4 anos e 16 horas

|Designador de Período| 	Descrição|
|---------------------|------------|
|Y 	|anos|
|M 	|meses|
|D 	|dias|
|W 	|semanas. Essa é convertida em dias, portanto não pode ser combinada com D.|
|H 	|horas|
|M 	|minutos|
|S 	|segundos|

Assim segue exemplo de DateTime:add
```php
<?
$hoje = new DateTime();
$amanha = $hoje->add(new DateInterval('P1D'));
```

É importante notar que a variável $hoje no exemplo acima, caso seja impressa, vai exibir o valor da variável $amanha, pois ela foi alterada com o método add. Para evitar isso, podemos instanciar pela classe DateTimeImmutable, que possui os mesmos métodos mas com outro comportamento, não alterando a data original.

> Nota: É importante se atentar a DateTimeImmutable, pois essa classe foi introduzida no PHP 5.5.0, sendo provavelmente um assunto essencial para a prova

EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/datetime/datetime_ex2.php)

Podemos definir data e tempo num objeto DateTime através das funções setDate e setTime.
```php
public DateTime DateTime::setDate ( int $year , int $month , int $day )
DateTime date_date_set ( DateTime $object , int $year , int $month , int $day )

public DateTime DateTime::setTime ( int $hour , int $minute [, int $second = 0 ] )
DateTime date_time_set ( DateTime $object , int $hour , int $minute [, int $second = 0 ] )
```

Lembrando que no caso de DateTimeImmutable os valores não são alterados.

Exemplo:
```php
<?php
$hoje = new DateTime();
$hoje->setDate(1990,12,25);
echo 'Hoje: '.$hoje->format('d/m/Y') . '<br/>'; //25/12/1990

$hoje2 = new DateTimeImmutable();
$hoje2->setDate(1990,12,25);
echo 'Hoje2: '.$hoje2->format('d/m/Y') . '<br/>'; //07/07/2016
```

Além de add, podemos também manipular datas com os métodos sub e modify:
```php
public DateTime DateTime::sub ( DateInterval $interval )
DateTime date_sub ( DateTime $object , DateInterval $interval )

public DateTime DateTime::modify ( string $modify )
DateTime date_modify ( DateTime $object , string $modify )
```

No caso de modify, a string é um formato bem mais legível por indicar exatamente o quanto queremos somar/subtrair e a unidade.

Exemplo sub:
```php
<?php
$date = new DateTime('2016-01-11');
$date->sub(new DateInterval('P10D'));
echo $date->format('Y-m-d') . "\n";
```

Exemplo modify:
```php
<?php
$date = date_create('2016-07-07');
$date->modify('+1 day');
echo $date->format('Y-m-d');
```
EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/datetime/datetime_ex3.php)

Podemos obter o intervalo (DateInterval) entre duas datas com DateTime::diff
```php
public DateInterval DateTime::diff ( DateTimeInterface $datetime2 [, bool $absolute = false ] )
```

Exemplo:
```php
<?php
$datetime1 = new DateTime('2009-10-11');
$datetime2 = new DateTime('2009-10-13');
$interval = $datetime1->diff($datetime2);
echo $interval->format('%R%a days'); //+2 days
```

> Nota: É possível usar operadores de comparação em objetos DateTime. Ex. $dateTimeObj1 == $dateTimeObj2

Caso seja preciso lidar com fuso horário, podemos recorrer à classe DateTimeZone
```php
DateTimeZone {
    /* Constantes */
      const integer AFRICA = 1 ;
      const integer AMERICA = 2 ;
      const integer ANTARCTICA = 4 ;
      const integer ARCTIC = 8 ;
      const integer ASIA = 16 ;
      const integer ATLANTIC = 32 ;
      const integer AUSTRALIA = 64 ;
      const integer EUROPE = 128 ;
      const integer INDIAN = 256 ;
      const integer PACIFIC = 512 ;
      const integer UTC = 1024 ;
      const integer ALL = 2047 ;
      const integer ALL_WITH_BC = 4095 ;
      const integer PER_COUNTRY = 4096 ;
    /* Métodos */
      public __construct ( string $timezone )
      public array getLocation ( void )
      public string getName ( void )
      public int getOffset ( DateTime $datetime )
      public array getTransitions ([ int $timestamp_begin [, int $timestamp_end ]] )
      public static array listAbbreviations ( void )
      public static array listIdentifiers ([ int $what = DateTimeZone::ALL [, string $country = NULL ]] )
}
```
Embora tenhamos um fuso horário definido no php.ini em date.timezone, o qual será usado caso não seja informado no construtor de DateTime, podemos definir um fuso horário para cada objeto DateTime.

```php
<?php
$saoPaulo = new DateTime('now',new DateTimeZone('America/Sao_Paulo'));
echo $saoPaulo->format('d/m/Y H:m:s');
echo $saoPaulo->getTimeZone()->getName();
```

Por fim, podemos obter o Unix Timestamp ou criar a partir de um formato nosso.
```php
public int DateTime::getTimestamp ( void )
public static DateTime DateTime::createFromFormat ( string $format , string $time [, DateTimeZone $timezone = date_default_timezone_get() ] )
```

Exemplo:
```php
<?php
$date = new DateTime();
echo $date->getTimestamp();

$date = DateTime::createFromFormat('d/m/Y', '07/07/2016');
echo $date->format('Y-m-d');
```
EXERCICIO: [LINK](https://github.com/lisura/php_certification/blob/master/Questoes/DATA_FORMAT/datetime/datetime_ex4.php)