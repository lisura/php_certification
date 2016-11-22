# Perguntas

**1) Which of the following keywords is used to prevent a method/class to be overridden by a subclass?**

a) Protected

b) Final

c) Public

d) Private

----

**2) Consider the following PHP code:**
```php
<?php
class A {
static $word = "hello";
static function hello() {print self::$word;}
}
class B extends A {
static $word = "bye";
}
B::hello();
```

a) bye

b) hello

c) hellobye

d) The script will throw an error.

-----

**3) Which of the following is used to pass an object?**

a) Reference

b) Value as well as reference

c) Value

d) Handle

---

**4) What will be the output of the following PHP script:**
```php
<?php
class number {
    public $a= 10;
   public $b=20;
   private $c=30;
}
 $numbers = new number();

  foreach($numbers as $var => $value) {
    echo "$value ";
}
```

a) 10 20

b) The script will throw an error.

c) 10 20 0

d) 10 20 30

---

**5) What should be the output of this script?**
```php
<?php
class Object {
   function Object( $entity ) {
       $entity->name="John";
   }
}
class Entity {
     var $name = "Maria";
}
$entity = new Entity();
$obj = new Object( $entity );
print $entity->name;
```

---

**6) What should be the output of this script?**
```php
<?php
abstract class myBaseClass {

  abstract protected function doSomething();

  function threeDots() {
    return '...';
  }
}

class myBaseA extends myBaseClass {

  protected function doSomething() {
      echo $this->threeDots();
  }
}

$a = new myBaseA();
$a->doSomething();
```

a) ...

b) Parser error

c) Fatal error

d) None of the above

---

**7) Which of the following statements about Exceptions is NOT true?**

a) Only Objects of class Exception and classes extending it can be be throw

b) It is recommended that catch(Exception) be the last catch clause

c) Exceptions can be re-thrown after being caught

d) Uncaught exceptions always cause fatal error

---

**8) Which of the following cannot be part of the class definition?**

a) Constant

b) Variable

c) Function

d) Interface

----

**9) In which of the following situations will you use the set_exception_handler() function?**

a) When you want to set a user-defined function to handle errors.

b) When you want to restore a previously defined exception handler function.

c) When you want to generate a user-level error/warning/notice message.

d) When the try/catch block is unable to catch an error.

----

**10) Assuming every method call below returns an instance of an object, how can the following be re-written in PHP5?**
```php
<?php
$a = new MyClass();
$b = $a->getInstance();
$c = $b->doSomething();
```

a) $c = ((MyClass)$a->getInstance())->doSomething();

b) $c = (MyClass)$a->getInstance();

c) $c = $a->getInstance()->doSomething();

d) This cannot be re-written in PHP5.

----

**11) What is the output of the following code?
```php
<?php
$list = new SplStack();
$list->push("a");
$list->push("b");
$list->push("c");
$list->rewind();
echo $list->pop();
```

A. b

B. Array

C. Object

D. c

E. a

----

**12) Using the notation self::$property refers to:

A. A property of the current object

B. The $property of the current object

C. The class constant $property in this class

D. The class property $property in this class

E. A variable called $property in this class or any parent class.

----

**13) What is the output of the following code?
```php
<?php
trait A {
    public function b() {
        echo self::$name;
    }
}

class C {
    protected static $name="c";
    use A;
}

class D extends C {
    protected static $name="d";
}

$c = new D();
$c->b();
```

A) d

B) Error - class property name isn't available in class D

C) Error - method b() isn't available in class D 

D) Error - "use" must be the first thing in a class 

E) c

----

**14) Which of the following is a magic method in PHP 5.3? (choose three)

A. __walk()

B. __sleep()

C. __return()

D. __call()

E. __function()

F. __add()

G. __set()

----

**15) Which line of code can be used to replace the INSERT comment in order to output "hello"?
```php
class C {
    public $ello = 'ello';
    public $c;
    public $m;
    
    function __construct($y) {
        $this->c = static function($f) {
            // INSERT LINE OF CODE HERE
        };
    
        $this->m = function() {
            return "h";
        };
    }
}

$x = new C("h");
$f = $x->c;
echo $f($x->m);
```

A. return $this->m() . "ello";

B. return $f() . "ello";

C. return "h". $this->ello;

D. return $y . "ello";

----

**16) What is the output of the following code?
```php
class C {
    public $x = 1;
    
    function __construct() { ++$this->x; }
    function __invoke() { return ++$this->x; }
    function __toString() { return (string) --$this->x; }
}

$obj = new C();
echo $obj();
```

A. 0

B. 1

C. 2

D. 3

----

**17) Late static binding is used in PHP to:

A. Load dynamic libraries and extensions at runtime

B. Use caller class information provided in static method call

C. Resolve undefined class names by automatically including needed files

D. Find proper method to call according to the call arguments

----

**18) Which of the following tasks can be achieved by using magic methods? (Choose 3)

A. Initializing or uninitializing object data

B. Creating a new stream wrapper

C. Creating an iterable object

D. Processing access to undefined methods or properties

E. Overloading operators like +, *, etc.

F. Converting objects to string representation

----

**19) How should class MyObject be defined for the following code to work properly? Assume
$array is an array and MyObject is a user-defined class.
```php
$obj = new MyObject();
array_walk($array, $obj);
```

A. MyObject should extend class Closure

B. MyObject should implement interface Callable

C. MyObject should implement method __call

D. MyObject should implement method __invoke

----

**20) Which of the following methods is invoked when a class method is inaccesible or doesn't exist?

a) __autoload

b) __test

c) __call

d) __load

----
# Respostas

1 - b

2 - b  
Obs.: Quando usado self::, está se referindo a classe A. Se fosse utilizado static::, o resultado seria bye, da classe B.

3 -a  
Obs.: Objetos sempre são passados por referência.

4 - a  
Obs.: a propriedade $c é privada e não pode ser acessada no escopo global.

5 - John

6 - c

7 - d  
Obs.: exception_handler permite que exceções não capturadas sejam tratadas, sem causar fatal error.

8 - d

9 - d

10 - c  
Obs.: a) e b) error sintax. d não faz nem sentido.

11 - D

12 - D

13 - E

14 - B,D,G

15 - B

16 - D

17 - B

18 - A,D,F

19 - D

20 - C
