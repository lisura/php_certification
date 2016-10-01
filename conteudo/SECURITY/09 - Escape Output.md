#Escape Output

É importante tratar todos os dados de OUTPUT quando trabalhamos com PHP. Tudo o que estiver fora das tags PHP é ignorado pelo interpretador, o que permite arquivos PHP de conteúdo misto. Ou seja, o PHP pode ser incluído dentro de documentos HTML, para, por exemplo, para a criação de templates.

```php
<p>Time travel Movie</p>
<?php echo 'back to the furure'; ?>
<p>Time travel Movie</p>
```
ONE OF TWO FUNDAMENTAL SECURITY RULES:
(1) FILTER AND VALIDATE ALL INPUT;
(2) ESCAPE OUTPUT
  • ALWAYS ESCAPE OUTSIDE DATA UNLESS PREVIOUSLY FILTERED
  • NEVER RELY ON CLIENT SIDE (JAVASCRIPT) FILTERING
  • FUNCTIONS USED TO ESCAPE DATA BEFORE OUTPUTTING WITHIN HTML:
      htmlspecialchars()
      htmlentities()
      strip_tags()
