# Type Hinting

Declarações de tipo permitem que funções requiram que parâmetros sejam de certos tipos ao chamá-los. Se o valor informado no parâmetro tiver um tipo incorreto então um erro é gerado: no PHP 5 será um erro fatal recuperável, enquanto que no PHP 7 irá lançar uma exceção TypeError

Para declarar o tipo o seu nome deve ser adicionado antes no nome do parâmetro. A declaração pode ser feita para aceitar NULL se o valor default do parâmetro for configurado também para NULL.

> **Nota:** Declaração de tipos também era conhecida como type hints no PHP 5.

## Tipos Válidos

| Tipo |	Descrição |	Versão PHP Mínima |
|------|------------|-------------------|
| Classe/interface |	O parametro precisa ser um instanceof da classe ou interface informada. |	PHP 5.0.0 |
| self | O parâmetro precisa ser um instanceof da mesma classe do métrodo onde a função está definida. Somente pode ser utilizado em métodos de classe e instância. |	PHP 5.0.0 |
| array |	O parametro precisa ser um array. |	PHP 5.1.0 |
| callable |	O parâmetro precisa ser um callable válido.	| PHP 5.4.0|

### Declaração de Tipos em Classes

```php
<?php
echo '<pre>';

class Chatinho {}
class Leandro extends Chatinho {}

class Adinan {}

function affmaria(Chatinho $c) {
    echo get_class($c).PHP_EOL;
}

affmaria(new Chatinho());
affmaria(new Leandro());
affmaria(new Adinan());

```

### Declaração de Tipos por Interface

```php
<?php
echo '<pre>';

interface MinionI {
	public function pigmeu();
}

class Ivan implements MinionI {
	public function pigmeu() {
		//..
	}
}

class Adinan implements MinionI {
	public function pigmeu() {
		//..
	}
}

class Leandro {}

function MinionTeste(MinionI $i) {
    echo get_class($i).PHP_EOL;
}

MinionTeste(new Ivan());
MinionTeste(new Adinan());
MinionTeste(new Leandro);
```
