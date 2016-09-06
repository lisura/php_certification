# Class Constantes

É possível definir valores constantes em cada classe permanecendo a mesma e imutável. Constantes diferem de variáveis normais, ao não usar o símbolo $ para declará-las ou usá-las. A visibilidade padrão de constantes de classe é public.

O valor deve ser uma expressão constante, não podendo ser (por exemplo) uma variável, uma propriedade, ou uma chamada a uma função.

Também é possível que interfaces tenham constantes.

A partir do PHP 5.3.0, é possível referenciar a classe usando uma variável. O valor da variável não pode ser uma palavra-chave (e.g. self, parent e static).

Constantes de classe são alocadas por classe, e não em cada instância da classe.

```php
<?php
echo '<pre>';

class MinhaClasse
{
    const CONSTANTE = 'valor constante';

    function mostrarConstante() {
        echo  self::CONSTANTE . "\n";
    }
}

echo MinhaClasse::CONSTANTE . "\n";

$classname = "MinhaClasse";
echo $classname::CONSTANTE; // A partir do PHP 5.3.0

$classe = new MinhaClasse();
$classe->mostrarConstante();

echo $classe::CONSTANTE; // A partir do PHP 5.3.0

```


**O suporte para inicialização de constantes com Heredoc e Nowdoc foi adicionado no PHP 5.3.0.**

```php
<?php
class foo {
    // A partir do PHP 5.3.0
    const BAR = <<<'EOT'
bar
EOT;
    // A partir do 5.3.0
    const BAZ = <<<EOT
baz
EOT;
}
```
