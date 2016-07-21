## Encodings

Algumas linguagems podem ser represetandas por codificações SINGLEBYTE (baseadas em 8-BIT) e outras requerem uma codificação MULTIBYTE por conta de sua complexidade (Ex.: Mandarim)

Lembrando 1 : Internamente o PHP sempre codifica com UTF-8.

Lembrando 2 : Um byte é constituído por oito bits. Cada bit pode conter apenas dois valores distintos, um ou zero. por causa disso, um byte só pode representar 256 valores originais.

Esquemas de codificação de caracteres de vários bytes foram desenvolvidas para expressar mais do que 256 caracteres no sistema de codificação bytewise.

- Este não é um modulo padrão, ele deve ser habilitado nas confingurações (–enable-mbstring=all)

### mbstring

mbstring fornece funções  específicas de multibyte que ajudam a lidar com a codificação multibyte no PHP. Além disso, mbstring lida com a conversão de codificação de caracteres entre os pares possíveis de codificação. Ela é projetado para lidar com codificações baseados em Unicode, como UTF-8 e UCS-2 e muitas codificações de byte único.

Para verificar o encode

**mb_check_encoding** : Verifica se a string é valida para um determinado encode.

>bool mb_check_encoding ([ string $var = NULL [, string $encoding = mb_internal_encoding() ]] )

Retorna TRUE em caso de sucesso ou FALSE em caso de falha.

```php
var_dump(mb_check_encoding	 ("está",
 "ASCII"));
var_dump(mb_check_encoding	 ("está",
 "UTF-8"));
```

**mb_internal_encoding** : Set/Get internal character encoding

>mixed mb_internal_encoding ([ string $encoding = mb_internal_encoding() ] )

If encoding está setado, então Retorna TRUE em caso de sucesso ou FALSE em caso de falha.

```php
mb_internal_encoding("UTF-8");
echo mb_internal_encoding();
```

#### Constantes pré-definidas

As contantes abaixo são definidas por esta extensão e somente estarão disponíveis quando a extensão foi compilada com o PHP ou carregada dinamicamente durante a execução.

- MB_OVERLOAD_MAIL (integer)
- MB_OVERLOAD_STRING (integer)
- MB_OVERLOAD_REGEX (integer)
- MB_CASE_UPPER (integer)
- MB_CASE_LOWER (integer)
- MB_CASE_TITLE (integer)

#### Encodings suportados no PHP

[LISTA](http://php.net/manual/pt_BR/mbstring.supported-encodings.php)

#### Function Overloading Feature

Function Overloading permite você adicionar multibyte em uma apliação sem modificar o codigo, apenas sobrepondo os metodos padrão de string. Por exemplo, mb_substr() vai ser chamada no luagr de substr() se a função overload estiver ativa.

Esta função torma facil tranformar aplicaçoes que somente supurtam single-byte encodings para multibyte.

Para usar function overloading, configure  mbstring.func_overload no php.ini para um valor positivo que representa a combinação de funções que serão sobrepostas.

- 1 para função mail() .
- 2 para string functions,
- 4 para regular expression functions.
- 7 para mail, strings and regular expression functions

#### Funções String Multibyte  

[LISTA](http://php.net/manual/pt_BR/ref.mbstring.php)
