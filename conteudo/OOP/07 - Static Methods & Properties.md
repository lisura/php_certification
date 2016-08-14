## Static Methods & Properties



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
