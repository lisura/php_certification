# Reflection

## Introdução

O PHP 5 vem com uma API completa de reflexão que acrescenta a capacidade de realizar engenharia reversa em classes, interfaces, funções, métodos e extensões. Além disso, a API de reflexão oferece maneiras de recuperar comentários de documentação para as funções, classes e métodos.

## Principais Classes usada para Reflections

* Reflector — Interface
* **ReflectionClass** — ReflectionClass Trata de Classes
* **ReflectionObject** — ReflectionObject Trata de Objetos
* **ReflectionProperty** — ReflectionProperty Trata de Propriedade de uma classe
* **ReflectionMethod** — ReflectionMethod Trata de Métodos
* **ReflectionParameter** — ReflectionParameter Trata de Parâmetros de Métodos
* ReflectionType — ReflectionType Trata de tipos de Retorno
* ReflectionZendExtension — ReflectionZendExtension Trata de Extensões Zend
* ReflectionExtension — ReflectionExtension Trata de Extensões
* ReflectionFunctionAbstract — ReflectionFunctionAbstract classes Abstratas
* **ReflectionFunction** — ReflectionFunction Trata de Funções
* ReflectionGenerator — ReflectionGenerator Trata de Geradores???
* ReflectionException — ReflectionException Trata de Exceptions

> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/OOP/Reflection/)



## Descobrindo Coisa com Reflection


### ReflectionClass

$reflBancoClass = new \ReflectionClass('PhpCertification\Banco\BancoItau');


* ReflectionClass::export()
Obter Estrutura total da Classe em String

```php
<?php
print_r($reflBancoClass->export('PhpCertification\Banco\BancoItau'));
```

* ReflectionClass::getDocComment()
Obter Estrutura total da Classe em String

```php
<?php
print_r($reflBancoClass->getDocComment());
```

* ReflectionClass::getInterfaceNames()
Obter Nomes Interfaces da Classe em Array()

```php
<?php
print_r($reflBancoClass->getInterfaceNames ());
```


* ReflectionClass::getInterfaces()
Obter Interfaces da Classe em ReflectionClass()

```php
<?php
print_r($reflBancoClass->getInterfaces());
```


* ReflectionClass::hasMethod()
Checar Method da Classe em ReflectionProperty()

```php
<?php
print_r($reflBancoClass->hasMethod('setCorrentista'));
```

* ReflectionClass::getProperties()
Obter Propriedades da Classe em ReflectionProperty()

```php
<?php
$properties = $reflBancoClass->getProperties();
print_r($properties);
```

* ReflectionClass::getMethods()
Obter Methods da Classe em ReflectionMethod()

```php
<?php
$methods = $reflBancoClass->getMethods();
print_r($methods);
```

* ReflectionClass::getName()
Obter nome da Classe em String

```php
<?php
print_r($reflBancoClass->getName());
```

* ReflectionClass::getShortName()
Obter nome da Classe em String

```php
<?php
print_r($reflBancoClass->getShortName());
```

* ReflectionClass::getNamespaceName()
Obter Namespace da Classe em String

```php
<?php
print_r($reflBancoClass->getNamespaceName());
```

* ReflectionClass::isFinal()
Obter se Classe é Final em Boolean

```php
<?php
print_r($reflBancoClass->isFinal());
```

* ReflectionClass::isSubclassOf()
Obter se Classe é SubliClasse de (?)

```php
<?php
print_r($reflBancoClass->isSubclassOf('PhpCertification\Banco\BancoBase'));```

* ReflectionClass::newInstance()
Obter Instância nova da Classe

```php
<?php
$object = $reflBancoClass->newInstance();
print_r($object);
```

---




### ReflectionObject


Com ReflectionObject é possível fazer tudo que um ReflectionClass faz,
pois ele herda todos os Métodos. E trada e um Objeto Instânciado.

```php
<?php
$reflBancoObject = new \ReflectionObject($object);
print_r($reflBancoObject);
```



### ReflectionProperty

```php
<?php
$properties = $reflBancoClass->getProperties();
foreach($properties as $reflProperty ) {
	//...
}
```



* ReflectionProperty::getName ()
Obter Nome da Propriedade String

```php
<?php
print_r($reflProperty->getName());
```


* ReflectionProperty::export()
Obter Estrutura total da Propriedade em String

```php
<?php
print_r(
 	$reflProperty::export($reflBancoClass->getName(), $reflProperty->getName())
);
```


* ReflectionProperty::getDocComment ()
Obter Documentação da Propriedade em String

```php
<?php
print_r($reflProperty->getDocComment());
```


* ReflectionProperty::isPublic ()
Checa Visibilidade Public da Propriedade em Boolean

```php
<?php
print_r($reflProperty->isPublic());
```

* ReflectionProperty::isProtected ()
Checa Visibilidade Protected da Propriedade em Boolean

```php
<?php
print_r($reflProperty->isProtected());
```

* ReflectionProperty::isPrivate ()
Checa Visibilidade Private da Propriedade em Boolean

```php
<?php
print_r($reflProperty->isPrivate());
```

* ReflectionProperty::isStatic ()
Checa acesso Static da Propriedade em Boolean

```php
<?php
print_r($reflProperty->isStatic());

```
---

### ReflectionMethod

```php
<?php
$methods = $reflBancoClass->getMethods();
foreach($methods as $reflMethod ){
	//...
}
```

* ReflectionMethod::getName ()
Obter Nome da Propriedade String

```php
<?php
print_r($reflMethod->getName()); echo PHP_EOL;
```

* ReflectionMethod::export()
 Obter Estrutura total do Method em String

```php
<?php
print_r(
 	$reflMethod::export($reflBancoClass->getName(), $reflMethod->getName())
);
```

* ReflectionMethod::getDocComment ()
Obter Documentação do Método em String

```php
<?php
print_r($reflMethod->getDocComment());
```

* ReflectionMethod::isPublic ()
Checa Visibilidade Public do Método em Boolean

```php
<?php
print_r($reflMethod->isPublic());
```

* ReflectionMethod::isProtected ()
Checa Visibilidade Protected do Método em Boolean

```php
<?php
print_r($reflMethod->isProtected());
```


* ReflectionMethod::isPrivate ()
Checa Visibilidade Private do Método em Boolean

```php
<?php
print_r($reflMethod->isPrivate());
```

* ReflectionMethod::isStatic ()
Checa acesso Static do Método em Boolean

```php
<?php
print_r($reflMethod->isStatic());
```

---

### ReflectionParameter

```php
<?php
$parameters = $reflMethod->getParameters();
foreach($parameters as $reflParameter ) {
	//...
}
```

* ReflectionParameter::getName()
Obter Nome do Parâmetro

```php
<?php
print_r($reflParameter->getName());
```

* ReflectionParameter::getPosition()
Obter Posição do Parâmetro

```php
<?php
print_r($reflParameter->getPosition());
```

* ReflectionParameter::isOptional()
Checar se é Optional

```php
<?php
print_r($reflParameter->isOptional());
```

---

### ReflectionFunction

```php
<?php
$reflFunction = new \ReflectionFunction('toInteiro');
```

* ReflectionFunction::getDocComment()
Obter Documentação da Função

```php
<?php
print_r($reflFunction->getDocComment());
```

* ReflectionFunction::getNumberOfParameters()
Obter Número de parametros da Função

```php
<?php
print_r($reflFunction->getNumberOfParameters());
```
