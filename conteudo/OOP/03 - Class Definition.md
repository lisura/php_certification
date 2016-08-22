## Class Definition

A definição de uma classe começa com a palavra chave class, seguida do nome da classe, seguido de um par de colchetes que englobam as definições de propriedades e métodos pertecentes à classe.

O nome de uma classe tem de ser válido, não pode ser uma palavra reservada do PHP. Um nome de classe válido começa com uma letra ou sublinhado, seguido de qualquer sequência de letras, números e sublinhados.

>Como uma expressão regular, pode ser expressada assim: ^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]\*$.

```php
// PALAVRAS RESERVADAS
$keywords = array('__halt_compiler', 'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor');

$predefined_constants = array('__CLASS__', '__DIR__', '__FILE__', '__FUNCTION__', '__LINE__', '__METHOD__', '__NAMESPACE__', '__TRAIT__');
```

Uma classe pode conter suas próprias constantes, variáveis (chamadas de "propriedades") e funções (chamadas de "métodos").

```php
// Estrutura de uma classe padrão
class classname [ extends baseclass ] {
    [ var $property [ = value ]; ... ]

    [ function function_name (args) {
          // code
      }
      ...
    ]
}
```

A pseudo-variável **$this** está disponível quando um método é chamado a partir de um contexto de objeto. **$this** é uma referência ao objeto chamado (normalmente o objeto ao qual o método pertence, mas possivelmente outro objeto, se o método é chamado estaticamente a partir do contexto de um objeto secundário).

```php
echo "<pre>";
class FirstMovie {
    function theMovie() {
        if (isset($this)) {
            echo '$this está definida em ( '.get_class($this).' )' . PHP_EOL;
        } else {
            echo "\$this não está definida." . PHP_EOL;
        }
    }
}
class TheSecondOne{
    function thisMovie(){
		FirstMovie::theMovie();
    }
}
$a = new FirstMovie();
$a->theMovie();
FirstMovie::theMovie(); // esta linha pode lançar um warning
$b = new TheSecondOne();
$b->thisMovie();
TheSecondOne::thisMovie(); // esta linha pode lançar um warning
```
