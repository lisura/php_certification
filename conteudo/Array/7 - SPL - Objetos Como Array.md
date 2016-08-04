# SPL - Objetos Como Array

SPL é uma das extenções basicas do PHP. Dentre as várias Classes, Métodos e Funções temos algumas que são diretamente ligadas a interações com Array.

**ArrayObject**
**ArrayIterator**
**RecursiveArrayIterator**
**iterator_to_array**
**SplFixedArray**

> **Nota**: Mais informações no módulo de OOP 14 - SPL.

## Gostinho de Quero Mais: (8P)

```php
<?php

class Livro {
    private $titulo;
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
}

class Colecao {
    private $titulo;
    private $livros;

    public function __construct($titulo)
    {
        $this->titulo = $titulo;
        $this->livros = new ArrayObject();
        // poderia implementar com extends para herdar todos metodos de ArrayObject
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function addLivro(Livro $livro)
    {
        $this->livros->offsetSet($livro->getTitulo(),$livro);
        //$this->livros->append($livro); //adiciona um indice automatico
    }

    public function delLivro(Livro $livro)
    {
        $this->livros->offsetUnset($livro->getTitulo() );
    }

    public function findLivro(Livro $livro)
    {
        return $this->livros->offsetExists($livro->getTitulo());
    }

	public function getLivros()
	{
		return $this->livros;
	}
}

$livro = new Livro();
$livro->setTitulo('Apocalipse');
$livro2 = new Livro();
$livro2->setTitulo('Geneses');

echo "<hr />";
$colecao = new Colecao('Biblia');
$colecao->addLivro($livro);
$colecao->addLivro($livro2);

echo "<hr />";
echo 'Livros:' ;
echo "<pre>";
print_r($livro);
print_r($livro2);
echo "</pre>";

echo "<hr />";
echo 'Colecao:';
echo "<pre>";
print_r($colecao);
echo "</pre>";

echo "<hr />";
echo 'Encontrou, '.$livro->getTitulo().'?';
echo "<pre>";
print_r($colecao->findLivro($livro));
echo "</pre>";

echo "<hr />";
echo 'Livro excluido!';
$colecao->delLivro($livro2);
echo "<pre>";
print_r($colecao);
echo "</pre>";


foreach($colecao->getLivros() as $k => $livro)
{
	echo "<pre>";
    echo $k.' => '.$livro->getTitulo().', ';
	echo "</pre>";
}

// total dos livros
echo 'total: '.$colecao->getLivros()->count();

?>

```
