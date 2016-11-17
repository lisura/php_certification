# Perguntas

**1) Which of the following keywords is used to prevent a method/class to be overridden by a subclass?**

a) Protected

b) Final

c) Public

d) Private

----

**2) Consider the following PHP code:**
````php
<?php
class A {
static $word = "hello";
static function hello() {print self::$word;}
}
class B extends A {
static $word = "bye";
}
B::hello();
````

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
````php
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
````

a) 10 20

b) The script will throw an error.

c) 10 20 0

d) 10 20 30

---

**5) What should be the output of this script?**
````php
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
````

---

**6) What should be the output of this script?**
````php
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
````

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
````php
<?php
$a = new MyClass();
$b = $a->getInstance();
$c = $b->doSomething();
````

a) $c = ((MyClass)$a->getInstance())->doSomething();

b) $c = (MyClass)$a->getInstance();

c) $c = $a->getInstance()->doSomething();

d) This cannot be re-written in PHP5.

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
