## Exceptions

 Uma exceção pode ser lançada (_throw_) e capturada (_catch_). Código pode ser envolvido por um bloco _try_ para facilitar a captura de exceções potenciais. Cada bloco _try_ precisa ter ao menos um bloco _catch_ ou _finally_ correspondente.

 O objeto lançado precisa ser uma instância da classe _Exception_ ou uma subclasse de _Exception_. Tentar lançar um objeto sem essa ascendência resultará em um erro fatal.

```php
<?php
echo '<pre>';
$movie = 'O Sol é Para Todos';
try{
	if($movie != 'Sharknado'){
		throw new Exception('Your movie Sux');
	}else{
		echo 'Thas a good movie';
	}
}catch(Exception $e){
	echo $e->getMessage();
}
```

Múltiplos blocos catch podem ser utilizados para capturar exceções diferentes. A execução normal (quando nenhuma exceção é lançada dentro de um try) ira continuar após o último catch definido em sequência. Exceções podem ser lançadas (ou relançadas) dentro um bloco catch.

Quando uma exceção é lançada o código seguinte não é executado, e o PHP tentará encontrar o primeiro bloco catch coincidente.

O comportamento padrão do PHP ao se deparar com uma exceção que não é tratada, um erro fatal é exibido, e o script tem sua execução terminada. Por isso usamos o tratamento de exceções através do bloco _try_ e _catch_ como mostrado no exemplo anterior.

Um bloco _finally_ pode ser especificado após ou no lugar de blocos _catch_. Códigos dentro de _finally_ sempre serão executados depois do _try_ ou _catch_, independente se houve o lançamento de uma exceção, e antes que a execução normal continue.

>Nota: Funções internas ao PHP utilizam principalmente aviso de erros. Apenas extensões orientadas a objetos utilizam exceções. No entanto os erros podem ser transformados em exceções com ErrorException.

```php
<?php
echo '<pre>';
$movie = 'O Sol é Para Todos';
try{
	if($movie != 'Sharknado'){
		throw new Exception('Your movie Sux');
	}else{
		echo 'Thas a good movie';
	}
}catch(Exception $e){
	echo $e->getMessage();
}finally {
	echo PHP_EOL . 'I also recommend: SHARKTOPUS';
}
```

### Estendendo exceções

Uma classe de exceção definida pelo usuário pode ser criada herdando a classe Exception. Os membros e propriedades abaixo mostram o que é acessível a partir da classe filha que deriva da Exception.

```php
<?php
class Exception {
    protected $message = 'Unknown exception';   // Mensagem da exceção
    private   $string;                          // Cache __toString
    protected $code = 0;                        // Código definido pelo usuário
    protected $file;                            // Nome do arquivo onde a exceção originou
    protected $line;                            // Número da linha onde a exceção originou
    private   $trace;                           // Backtrace
    private   $previous;                        // Exceção anterior (se exceção empilhada)
    public function __construct($message = null, $code = 0, Exception $previous = null);
    final private function __clone();           // Inibe a clonagem de exceções
    final public  function getMessage();        // Mensagem da exceção
    final public  function getCode();           // Código definido pelo usuário
    final public  function getFile();           // Nome do arquivo onde a exceção originou
    final public  function getLine();           // Número da linha onde a exceção originou
    final public  function getTrace();          // Um array do backtrace()
    final public  function getPrevious();       // Exceção anterior
    final public  function getTraceAsString();  // Backtrace formatado como string
    public function __toString();               // String formatada da exceção
}
```

Se uma classe estender a classe Exception e redefinir o constructor, então é altamente recomendável que também seja chamado o parent::\_\_construct() para garantir que todos os dados estejam corretamente informados. O método \_\_toString() pode ser sobrescrito para fornecer uma representação customizada do objeto quando utilizado como string.

>Nota: Exceções não podem ser clonadas. Tentativas de clonar um Exception resultarão em erros E_ERROR fatais.

```php
<?php
echo '<pre>';
class ExceptionNado extends Exception {
    public function __construct($message, $code = 0, Exception $previous = null) {
		$message = 'ExceptionNado Exception Message : ' . $message;
        parent::__construct($message, $code, $previous);
    }
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}";
    }
    public function doYouHaveSharks($boolean = true) {
		if($boolean){
			echo "This is now a Sharknado";
		}else{
			echo "Do not wanna play any more";
		}
    }
}
try {
    throw new ExceptionNado('tell me a gread movie', 5);
} catch (ExceptionNado $e) {      // Entrará aqui ...
    echo "Pegou ", $e, PHP_EOL;
    $e->doYouHaveSharks();
	echo PHP_EOL;
	$e->doYouHaveSharks(false);
} catch (Exception $e) {        // ... mas não aqui.
    echo "Pegou Exception padrão\n", $e;
}
echo PHP_EOL,PHP_EOL;
try {
    throw new Exception('tell me a gread movie', 5);
} catch (ExceptionNado $e) {      // Entrará aqui ...
    echo "Pegou ", $e, PHP_EOL;
    $e->doYouHaveSharks();
} catch (Exception $e) {        // ... mas não aqui.
	echo "Pegou Exception padrão: ", $e->getMessage();
}
```
