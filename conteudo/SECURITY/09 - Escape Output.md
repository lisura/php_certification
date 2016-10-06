#Escape Output

É importante tratar todos os dados de OUTPUT quando trabalhamos com PHP. Tudo o que estiver fora das tags PHP é ignorado pelo interpretador, o que permite arquivos PHP de conteúdo misto. Ou seja, o PHP pode ser incluído dentro de documentos HTML, para, por exemplo, para a criação de templates.

```php
<p>Time travel Movie</p>
<?php echo 'back to the furure'; ?>
<p>Time travel Movie</p>
```

É importante lembrar que nunca se deve confiar no filtro ao lado do cliente (JS).

## Funções para Escape Output

| funcoes | descricao |
| --- | --- |
|**htmlentities()** | Converte todos os caracteres aplicáveis em entidades html |
|html_entity_decode() | Converte todas as entidades HTML para os seus caracteres |
|get_html_translation_table() | Retorna a tabela de tradução usada por htmlspecialchars e htmlentities |
|**htmlspecialchars()** | Converte caracteres especiais para a realidade HTML |
|nl2br() | Insere quebras de linha HTML antes de todas newlines em uma string |
|urlencode() | Codifica uma URL |
|**strip_tags()** | Retira as tags HTML e PHP de uma string |

\* funções em negrito serão exemplificadas.

**htmlspecialchars()** | Converte caracteres especiais para a realidade HTML

Certos caracteres tem significado especial em HTML, e seriam representados pela realidade HTML se eles estão preservanado seus significados. Esta função retorna uma string com algumas destas conversões feitas; As transformações feitas são aquelas mais úteis para programação web.

>string htmlspecialchars ( string $string [, int $quote_style [, string $charset ]] )

O segundo argumento opcional, quote_style, conta à função o que fazer com os caracteres aspas simples e dupla. O modo padrão, ENT_COMPAT, é o modo mais compatível com a atualidade, apenas transforma a aspas-dupla e deixa a aspas-simples como está. Se ENT_QUOTES está definida, ambas transformadas e se ENT_NOQUOTES está definida nenhuma das duas são modificadas.

+ ' & ' (ampersand) torna-se '& amp;'
+ ' " ' (aspas dupla) torna-se '& quot;' quando ENT_NOQUOTES não está definida.
+ ' ' ' (aspas simples) torna-se '& #039;' apenas quando ENT_QUOTES está definida.
+ ' < ' (menor que) torna-se '& lt;'
+ ' > ' (maior que) torna-se '& gt;'

```php
<?php
echo "<pre>";
$new = htmlspecialchars("<a href='backtothefuture.com'>Time Travel Movie</a>", ENT_QUOTES);
echo $new.PHP_EOL;
echo "<a href='backtothefuture.com'>Time Travel Movie</a>";
```

**htmlentities()** - Converte todos os caracteres aplicáveis em entidades html

Esta função é idêntica a htmlspecialchars() em toda forma, exceto que com htmlentities(), todos caracteres que tem entidade HTML equivalente são convertidos para estas entidades.

>string htmlentities ( string $string [, int $quote_style [, string $charset [, bool $double_encode ]]] )

Como htmlspecialchars(), o segundo parâmetro opcional quote_style você define o que irá ser feito com aspas 'simples' e "duplas".

```php
$str = "Back 'To The Future' is <b>a time travel movie</b>";
// Outputs: Back 'To The Future' is &lt;b&gt;a time travel movie&lt;/b&gt;
echo htmlentities($str);
// Outputs: Back &#039;To The Future&#039; is &lt;b&gt;a time travel movie&lt;/b&gt;
echo htmlentities($str, ENT_QUOTES);
```

#### importante

O uso da opção 'ENT_QUOTES' não protege contra saidas js atributos como 'href' da tag 'a'. Quando clicado no link abaixo o javascript será executado.

```php
<?php
$_GET['a'] = 'javascript:alert(document.cookie)';
$href = htmlEntities($_GET['a'], ENT_QUOTES);
print "<a href='$href'>link</a>"; # results in: <a href='javascript:alert(document.cookie)'>link</a>
```

**strip_tags()** - Retira as tags HTML e PHP de uma string

Esta função tenta retornar uma string retirando todas as tags HTML e PHP de str.

>string strip_tags ( string $str [, string $allowable_tags ] )

```php
<?php
echo "<pre>";
$text = '<p>BackToTheFuture.</p><!-- Comment --> <a href="#TimeTravelMovie">Not like Hottub TimeMachine</a>';
echo strip_tags($text);
echo PHP_EOL;
echo strip_tags($text, '<p><a>');// Allow <p> and <a>
```

#### Notas

Por strip_tags() atualmente não validar o HTML, parcial, ou tags quebradas podem resultar na remoção de mais texto/dados que o esperado.

Esta função não modifica nenhum dos atributos das tags que você permitiu usando allowable_tags, incluindo os atributos style e onmouseover que um usuário travesso pode abusar quando colocar texto a ser mostrado para os outros usuários.
