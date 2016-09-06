## Autoload

### Recapitulando

Para trabalhar com \_\_autoload é necessario ter em mente o uso de informações de configurações do PHP como include_path que pode ser obtido por meio da impressão da função **phpinfo()** ou da impressão da função **get_include_path()**


** Funções e Constantes que podemos usar para trabalhar com \_\_autoload() **

| Funções                |
|------------------------|
| get_include_path()     |
| include_once()         |
| require_once()         |
| realpath()             |
| dirname()              |
| getcwd()               |
| chdir()               |


| Constantes             |
|------------------------|
| \_\_FILE\_\_           |
| \_\_DIR\_\_            |
| \_\_NAMESPACE\_\_      |
| DIRECTORY_SEPARATOR    |
| PATH_SEPARATOR         |


## \_\_autoload

Caso um função de \_\_autoload esteja definida, ela será executada sempre que uma class não for encontrada na memória do processamento do script.

> **PARAMS:**
> classname : Nome da Classe a ser carregada

```php
<?php
function __autoload($classname)
{
    $filename = "./". $classname .".php";
    include_once($filename);
}
```

> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/OOP/Autoload/__autoload/)

---

> **Nota Pessoal:** O uso de desse meio para autoload é Bem Old School.

---

> **Dica**  Embora a função \_\_autoload() também pode ser utilizada para carregar automaticamente classes e interfaces, é preferível a utilização da função spl_autoload_register(). Por que é uma alternativa mais flexível (permitindo que vários autoloaders sejam especificados na aplicação, assim como bibliotecas de terceiros). Por esta razão, o uso da função \_\_autoload() é desencorajado e pode se tornar obsoleta em versões futuras.

---

> **Nota:** Antes do PHP 5.3.0 exceções disparadas na função \_\_autoload() não eram capturadas no bloco catch e resultavam em um erro fatal. Do PHP 5.3.0 em diante, isso é possível sendo que se uma exceção customizada é disparada, então a classe da exceção customizada se tornará disponível. A função \_\_autoload() deve ser usada recursivamente para carregar a classe de exceção customizada

---

> **Nota:** Autoloading não é disponível usando PHP em modo interativo CLI.
[Mais Detalhes](http://stackoverflow.com/questions/14696961/why-doesnt-phps-autoload-feature-work-in-cli-mode)

---

> **Nota:** Se o nome da classe é usado por exemplo em call_user_func() então ela pode conter alguns caracteres perigosos como ../. É recomendado não usar entrada de usuário nestas funções ou pelo menos verificar a entrada em \_\_autoload().

---


## spl_autoload

Esta funçao é para ser usada como implementação padrão para \_\_autoload(). Se nenhuma outra função for especificada e a autoload_register() for chamada sem argumentos, esta função será usada para qualquer posterior chamada ao \_\_autoload(). Por padrão, ela verifica todos os caminhos de inclusão por arquivos formados pelo nome da classe em minúsculo acrescido das extensões de arquivo .inc e .php.

```php
<?php

define('CLASS_DIR', 'Classes/')
set_include_path(get_include_path() . DIRECTORY_SEPARATOR. CLASS_DIR);
spl_autoload_extensions('.class.php');

// Usa autoload implementação padrão do spl_autoload
spl_autoload_register();

```

> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/OOP/Autoload/spl_autoload/)

---

> **Nota Pessoal:** O uso de desse meio para autoload é Bem Old School.

---

## Composer: a luz no fim do túnel

O PHP é uma das linguagens de programação mais usadas no mundo, isso ninguém pode negar. Mas, em relação a outras, tais como Ruby, Python e Perl, PHP possui uma tremenda desvantagem: não possui um sistema totalmente confiável e unificado para gerenciamento de pacotes. Ruby tem Gems; Python, PIP; Perl, CPAN; e, estendendo um pouco, é possível citar o NPM do Node.js. Mas e o PHP?

E é aí que entra em cena o Composer. Conforme pode ser lido no próprio site oficial do Composer:

Composer é uma ferramenta para gerenciamento de dependências em PHP. Ele permite que você declare as bibliotecas dependentes que seu projeto precisa e as instala para você.

Para quem não está acostumado ou nunca ouviu falar em Gerenciamento de Dependências, pode não ter ficado claro (ou difícil de entender por ser bom demais para ser verdade), mas, na prática, o que acontece é que, usando Composer, você simplesmente especifica quais pacotes (códigos reutilizáveis) seu projeto precisa – podendo estes pacotes também ter dependências – e ele vai, automaticamente, baixar isso e incluir nos locais apropriados de seu projeto!

Caso seja preciso acrescentar, remover ou atualizar algum pacote, sem problemas: o gerenciador também faz o trabalho todo! Acreditem: depois que se começa a trabalhar usando este tipo de ferramenta, realmente é difícil abrir mão de suas facilidades e comodidades; além disso, a produtividade vai às alturas – e é isso, mesmo, que todos os programadores queremos, não é verdade?

Nils Adermann e Jordi Boggiano, os “cabeças” do Composer, certamente marcaram seus nomes na história ao dar início ao desenvolvimento e tornar o Composer um projeto open source com o intuito de beneficiar toda a comunidade de programadores PHP.
Como funciona o Composer

O Composer funciona, basicamente, através de duas vertentes: um repositório para os pacotes (Packagist) e instruções via linha de comando para gerenciamento dos pacotes (para procurar, instalar, atualizar, remover, etc).

A instalação dos pacotes é feita por projeto e, por default, nada é instalado globalmente. Por isso o Composer é considerado mais um Gerenciador de Dependências do que um Gerenciador de Pacotes (mas usar o termo “pacotes”, no caso, também não é errado).

O primeiro passo para entrar no mundo de gerenciamento de pacotes PHP é instalar o Composer – e é altamente desejado você conhecer PHP OO, Namespaces e ter uma noção das PSR-0, 1, 2, e 4.

> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/OOP/Autoload/composer/)


**Referências:**
> Php do Jeito Certo : [LINK](http://br.phptherightway.com/)

> Desenvolvimento Para web [LINK](http://desenvolvimentoparaweb.com/php/composer-a-evolucao-php/)
