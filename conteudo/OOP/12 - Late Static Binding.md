# Late Static Bindings

A partir do PHP 5.3.0, o PHP implementa um recurso chamado late static bindings que pode ser usado para referenciar a classe chamada no contexto de herança estática.

Mais precisamente, late static bindings funcionam através do armazenamento do nome da classe na última "chamada não encaminhadas". No caso de chamadas a métodos estáticos, é a classe explicitamente chamada (normalmente o nome a esquerda do operador **::**); no caso de chamadas a métodos não estáticos, é o nome da classe do objeto. Uma "chamada encaminhada" é àquela estática, realizada pelos prefixos **self::**, **parent::**, **static::**, ou, se subindo na hierarquia de classes, forward_static_call(). A função get_called_class() pode ser utilizada para recuperar uma string com o nome da classe chamada e **static::** introduz seu escopo.

Esse recurso foi chamado de "late static bindings" de uma perspectiva interna em mente. "Late binding" vem do fato que static:: não será resolvido usando a classe onde o método foi definido, mas computada utilizando informações em tempo de execução. É também chamado "static binding" pois pode ser utilizado em (mas não limitado a) chamadas de métodos estáticos.

## Limitações do self::

Referências estáticas para a atual classe como self:: ou __CLASS__ são resolvidas usando a classe na qual a função pertence, como onde ele foi definido:

```php
<?php
echo '<pre>';

class Chatinho {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }
}

class Fernando extends Chatinho {
    public static function who() {
        echo __CLASS__;
    }
}

Fernando::test();
```

## Uso de Late Static Bindings

Late static bindings tenta resolver a limitação introduzindo uma palavra-chave que referencia a classe que foi inicialmente chamada em tempo de execução. Basicamente, é uma palavra-chave que permite referenciar B em test(), no exemplo anterior. Foi decidido não introduzir uma nova palavra-chave, mas usar static, já reservada.

```php
<?php
echo '<pre>';

class Chatinho {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        static::who();
    }
}

class Fernando extends Chatinho {
    public static function who() {
         echo __CLASS__;
    }
}

Fernando::test();

```

> **Nota:** Em contextos não estáticos a classe chamada será a classe da instância do objeto. Assim como **$this->** chamará métodos privados do mesmo escopo, utilizar static:: pode ter resultados diferentes. Outra diferença é que static:: só pode referenciar propriedades estáticas.

## Uso do static:: em um contexto não-estático

```php
<?php
echo '<pre>';

class Chatinho {
    private function foo() {
        echo "success!\n";
    }
    public function test() {
        $this->foo();
        static::foo();
    }
}

class Leandro extends Chatinho {
   /*
    * foo() será copiado para Leandro, assim seu escopo ainda será Chatinho
    * e a chamada funcionará
	*/
}

class Ivan extends Chatinho {
    private function foo() {
        /* método original foi substituído, escopo agora é Ivan */
    }
}

$l = new Leandro();
$l->test();

$i = new Ivan();
$i->test();
```

> **Nota:** As resoluções de Late static bindings terminarão quando a chamada é realizada sem retorno. Por outro lado chamadas estáticas utilizando instruções como **parent::** ou **self::** irão repassar a informação do chamador.

```php
<?php
echo '<pre>';
class Chatinho {
    public static function foo() {
        static::who();
    }

    public static function who() {
        echo __CLASS__."\n";
    }
}

class Fernando extends Chatinho {
    public static function test() {
        Chatinho::foo();
        parent::foo();
        self::foo();
    }

    public static function who() {
        echo __CLASS__."\n";
    }
}

class Adinan extends Fernando {
    public static function who() {
        echo __CLASS__."\n";
    }
}

Adinan::test();

```
