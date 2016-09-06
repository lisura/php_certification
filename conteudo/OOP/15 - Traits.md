# Traits

O PHP 5.4 já está disponível desde março/2012 e uma de suas grandes novidades em relação à Programação Orientada a Objetos foi a introdução de um novo recurso chamado "Traits". Neste artigo veremos o que é uma trait, para que ela serve e como usá-la.

O que é uma trait?
Podemos traduzir "trait" para o português como "peculiaridade", ou seja, uma característica própria de alguma coisa. No caso da programação orientada a objetos, ela representa um mecanismo para agregar características/comportamentos a um conjunto de classes de forma horizontal.

A diferença entre uma herança simples (com extends) para uma herança com trait é que a herança simples se dá de forma vertical, pois a linguagem PHP só permite que uma classe herde diretamente de uma única classe. Por outro lado, é possível agregar várias traits a uma única classe, por isso dizemos que é uma herança horizontal.

E uma trait também não é igual a uma classe pois ela não pode ser instanciada.

Resumindo: uma trait é um pacote de características/comportamentos semelhantes às classes abstratas, mas que podem ser acopladas a classes.

Quando usar Traits e quando usar Classes?
Como vimos anteriormente, o significado semântico de uma trait e o de uma classe abstrata são muito próximos e a diferença está na possibilidade de agrupamentos.

Neste sentido, podemos concluir que uma trait é mais adequada quando queremos agregar características/comportamentos que podem ser utilizadas por classes de diferentes ramificações de um modelo de herança tradicional.

Por outro lado, devemos usar classes quando temos características/comportamentos de uma entidade que só poderá ser herdado por outras entidades mais complexas.

Por exemplo: se estamos implementando um sistema acadêmico, podemos inicialmente definir uma classe abstrata "usuario", que servirá de base para todos usuários do sistema. Em seguida, implementar as classes "aluno" e "funcionario", que herdam da classe "usuario". Em seguida, implementar a classe "professor", que herda da classe "funcionario". Note que todas as classes envolvidas seguem uma linha de raciocínio lógico para que não ocorra inconsistências semânticas no futuro. Por exemplo, um objeto aluno nunca poderá ter as características da classe "funcionario", enquanto a classe "professor" sempre terá as características da classe "funcionario". Mas supomos agora que queremos que objetos da classe "aluno" e da classe "professor" possuam como característica uma tabela de aulas semanal, mas que os objetos "funcionario" não. Então, precisamos criar uma trait "matrizAulasSemanal", que vai conter atributos e métodos para manipular a matriz de aulas semanal do aluno ou do professor. Neste caso, as classes continuariam herdando das classes mais básicas, mas teriam essa trait acoplada.

Sintaxe das Traits
A sintaxe básica para montar uma trait é muito semelhante à da criação de uma classe. Basta usar a palavra-reservada "trait" e encapsular os atributos/métodos que definem as características/comportamentos da trait. Veja um exemplo de uma trait que implementa o padrão singleton:

```php
<?php
trait Singleton {

    /**
     * Instancia da classe
     * @var self
     */
    protected static $instance = null;

    /**
     * Construtor
     */
    protected function __construct() {
        // void
    }

    /**
     * Clone: nao permitido
     * @throw RuntimeException#0 Always throw this exception.
     */
    final protected function __clone() {
        throw new RuntimeException('Singleton class is not clonable', 0);
    }


    /**
     * Retorna a instancia da classe singleton
     * @return self
     */
    final public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
```

A sintaxe para acoplar uma trait em uma classe é através da palavra reservada "use":

```php
<?php
class Config {
    use Singleton;

    //...
}
```

Para usar múltiplas traits, basta informá-las separadas por vírgula.

Ao acoplar uma trait em uma classe, podemos imaginar que estamos copiando o código da trait e colando na classe. Porém, assim como na herança simples entre classes, a classe que utiliza uma trait pode sobrescrever métodos, desde que não sejam finais.

Traits também podem utilizar outras traits, mas não podem implementar interfaces, nem realizar herança simples de outra trait ou classe.

Conflitos de nomes na classe
Como uma classe pode acoplar mais de uma trait, pode ocorrer de uma trait ter um método com o mesmo nome do método de outra trait acoplada. Neste caso, a classe que acopla as traits precisa obrigatoriamente especificar qual dos métodos terá preferência, e, opcionalmente, podemos definir apelidos para os métodos.

Por exemplo, se a classe X utiliza as traits A e B que possuem o método "teste", então podemos:

1 - utilizar em X o método "teste" definido em A, e ignorar o método de B:

```php
<?php
class X {
    use A, B {
        A::teste insteadof B;
    }
    ...
}
```
2 - utilizar em X o método "teste" definido em A, mas apelidar o método "teste" definido em B como "testeB":

```php
<?php
class X {
    use A, B {
        A::teste insteadof B;
        B::teste as testeB;
    }
    //...
}
```

3 - utilizar em X o método "teste" definido em A, mas apelidar o método "teste" definido em A como "testeA" e apelidar o método "teste" definido em B como "testeB":

```php
<?php
class X {
    use A, B {
        A::teste insteadof B;
        A::teste as testeA;
        B::teste as testeB;
    }
    //...
}

```

Neste último caso, se a classe X chamar o método "teste", irá utilizar o método da trait A. Mas a classe também pode chamar os métodos "testeA" e "testeB".

Na verdade, é possível dar vários apelidos para o mesmo método, embora isso não seja recomendado, já que perde a legibilidade do código.

> Referência :  [Rubens 滝口Ribeiro](http://rubsphp.blogspot.com.br/2012/10/traits-para-heranca-horizontal-de-classes-em-php.html)
