## Interfaces

Permitem a criação de códigos que especificam quais métodos uma classe deve implementar, sem definir como esses métodos serão tratados.

São definidas da mesma forma que classes, mas com a palavra-chave interface substituindo class e com nenhum dos métodos tendo seu conteúdo definido.

Todos os métodos declarados em uma interface devem ser públicos, essa é a natureza de uma interface.

Para implementar uma interface, o operador **implements** é utilizado. Todos os métodos na interface devem ser implementados na classe; não fazê-lo resultará em um erro fatal.

>Interfaces podem ser estendidas como as classes, usando o operador extends.

```php
echo '<pre>';
interface movie {
    public function watch($name, $number);
    public function watchAgain($number);
}
class Sharknado implements movie{
    private $vars;
    public function watch($name, $number){
		if($name != 'Sharkando'){
			return 'Your movie Sux';
		}
		$this->vars = 'Lets watch '.$name . ' '.$number;
		return $this->vars;
    }
    public function watchAgain($number){
        return 'Sharknado '.$number;
    }
}
$sharks = new Sharknado();
echo $sharks->watch('Sociedade dos poetas mortos', 1) . PHP_EOL;
echo $sharks->watch('Sharkando', 3) . PHP_EOL;
echo $sharks->watchAgain(2) . PHP_EOL;
```

>```php
// E_ERROR :  type 1 -- ....
class BadSharknado implements movie{
    private $vars;
    public function watch($name, $var){
        if($name != 'Sharkando'){
			return 'Your movie Sux';
		}
		$this->vars = 'Lets watch '.$name . ' '.$number;
		return $this->vars;
    }
}
```

É possível ter constantes em interfaces. Constantes de interfaces funcionam exatamente como constantes de classes, com exceção de não poderem ser sobrescritas por uma classe/interface herdeira.

```php
echo '<pre>';
interface movie {
    const best = 'Sharknado franchise';
}
echo movie::best;
```

>```php
// Não funciona
class Movies implements movie {
    const best = 'Other movie';
}
```

Uma interface, juntamente com a declaração de tipo, fornecem uma boa maneira de garantir que um objeto em particular possua determinados métodos.

Detalhe: Classes podem implementar mais de uma interface se assim for desejado, separando cada interface com uma vírgula.

```php
echo '<pre>';
interface Sharknado1 {
    public function one();
}

interface Sharknado2 {
    public function theSecondOne();
}

interface Sharknado3 extends Sharknado1, Sharknado2 {
    public function ohHellNo();
}

class Trilogy implements Sharknado3{
    public function one(){
		echo 'good' . PHP_EOL;
    }

    public function theSecondOne(){
		echo 'better' . PHP_EOL;
    }

    public function ohHellNo(){
		echo 'perfect' . PHP_EOL;
    }
}
$success = new Trilogy();
$success->one();
$success->theSecondOne();
$success->ohHellNo();
```


### Caso de uso

Uma interface é fornecida para que você possa descrever um conjunto de funções e, em seguida, ocultar a implementação final dessas funções em uma classe de implementação. Isso permite que você altere a implementação dessas funções sem alterar como você usá-lo.

Por exemplo: Eu tenho um banco de dados. Eu quero escrever uma classe que acessa os dados no meu banco de dados. Eu defino uma interface como esta:

```php
interface Database {
  function listOrders();
  function addOrder();
  function removeOrder();
}
```

Então vamos dizer que você começa usando um banco de dados MySQL. Portanto, tem que escrever uma classe para acessar o banco de dados MySQL:

```php
class MySqlDatabase implements Database {
  function listOrders() {
    //Implementacao vai aqui
  }
}
```

Podemos escrever esses métodos conforme necessário para obter as tabelas de banco de dados MySQL. Em seguida, você pode escrever seu controlador para usar a interface como tal:

```php
$database = new MySqlDatabase();
foreach ($database->listOrders() as $order) {
....
```

Então vamos dizer que decidiu migrar para um banco de dados Oracle. Poderíamos escrever outra classe para chegar ao banco de dados Oracle como tal:

```php
class OracleDatabase implements Database {
  function listOrders() {
    //Implementacao vai aqui
  }
}
```

Então, para mudar o nosso aplicativo para usar o banco de dados Oracle em vez do banco de dados MySQL, só temos que mudar uma linha de código:

```php
$database = new OracleDatabase();
```

Todas as outras linhas de código, permanecerão inalteradas. O ponto é, a interface descreve os métodos que precisam acessar nosso banco de dados. Ele não descreve de forma alguma como nós conseguiremos isso. Isso é o que a classe implementando faz. Podemos implementar essa interface quantas vezes precisamos de tantas maneiras diferentes como precisamos. Podemos, então, alternar entre implementações da interface sem impacto para o nosso código porque a interface define como vamos usá-lo, independentemente de como ele realmente funciona.

### Interface vs Abstract

Use uma interface quando você quer forçar os desenvolvedores que trabalham em seu sistema para implementar um número definido de métodos sobre as classes que estará construindo.

Use uma classe abstrata quando você quer forçar os desenvolvedores que trabalham em seu sistema para implementar um número conjunto de métodos **E** pretende fornecer alguns métodos básicos que irão ajudá-los a desenvolver suas classes filhas.
