## Static Methods & Properties

Declarar propriedades ou métodos de uma classe como estáticos faz deles acessíveis sem a necessidade de instanciar a classe. Um membro declarados como estático não pode ser acessado com um objeto instanciado da classe (embora métodos estáticos podem).

>Por compatibilidade com o PHP 4, se nenhuma declaração de visibilidade for utilizada, a propriedade ou método será tratado como se declarado como public.



```php
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this está definida (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this não está definida.\n";
        }
    }
}

class B
{
    function bar()
    {
        // Nota: a próxima linha pode lançar um warning E_STRICT.
        A::foo();
    }
}

$a = new A();
$a->foo();

// Nota: a próxima linha pode lançar um warning E_STRICT.
A::foo();
$b = new B();
$b->bar();

// Nota: a próxima linha pode lançar um warning E_STRICT.
B::bar();
```
