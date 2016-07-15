# Introdução

## O que é o PHP?

O PHP (um acrônimo recursivo para PHP: Hypertext Preprocessor) é uma linguagem de script open source de uso geral, muito utilizada, e especialmente adequada para o desenvolvimento web e que pode ser embutida dentro do HTML.

## O que o PHP pode fazer?

* Scripts do lado do servidor para prover págians WEB;
* Scripts de Gestão de Servidor como: Crons e Gestão de manutenção;
* Aplicações Desktop com  Extenções como [PHP-GTK](http://gtk.php.net/)

## Um pouco da História

* Criado inicialment por **Rasmus Lerdof** para acompanhar o número de visitantes em seu site;

* Exemplo de código do antigo php/fi 0.XXX criado em 1994

```php
<!--include /text/header.html-->

<!--getenv HTTP_USER_AGENT-->
<!--ifsubstr $exec_result Mozilla-->
  Hey, you are using Netscape!<p>
<!--endif-->

<!--sql database select * from table where user='$username'-->
<!--ifless $numentries 1-->
  Sorry, that record does not exist<p>
<!--endif exit-->
  Welcome <!--$user-->!<p>
  You have <!--$index:0--> credits left in your account.<p>

<!--include /text/footer.html-->
```
* Em 1997 e 1998, PHP/FI teve o apoio de milhares de usuários ao redor do mundo. Uma pesquisa Netcraft de Maio de 1998, indicou que cerca de 60.000 domínios relataram ter cabeçalhos contendo "PHP"

* PHP 3.0 foi a primeira versão que se assemelha com o PHP como existe hoje. PHP/FI se encontrava ainda ineficiente e não tinha recursos que precisava para prover uma aplicação eCommerce que estavam desenvolvendo para um projeto da Universidade, **Andi Gutmans** e **Zeev Suraski** de **Tel Aviv**, **Israel**, começaram outra completa reescrita do interpretador em 1997 Junto com **Rasmus Lerdof**.

* Um recurso chave foi introduzido no PHP 3.0 incluindo o suporte a programação orientada a objeto

* Em junho de 1998, com muitos novos desenvolvedores ao redor do mundo unindo esforços, PHP 3.0 foi anunciado pelo novo time de desenvolvimento do PHP como o sucessor oficial para o PHP/FI 2.0. O PHP 3.0 chegou, prontamente foi instalado em 70.000 domínios em todo mundo, em seu pico, PHP 3.0 foi instalado em aproximadamente 10% dos servidores web da internet.

* Logo após o PHP 3.0 ter sido oficialmente lançado, **Zeev Suraski** e **Andi Gutmans** começaram a trabalhar em uma reescrita do core do PHP. O novo motor, chamado '**Zend Engine**' (composto pelos primeiros nome, **Ze**ev e A**nd**i), alcançou os objetivos do projeto com sucesso, e foi introduzido em meados de 1999. O PHP 4.0 baseado neste motor, e uma variedade de novos recursos adicionais, foi oficialmente lançado em Maio de 2000.

* O PHP 5 foi lançado em Julho de 2004 após um longo desenvolvimento e vários pré-lançamentos. Principalmente impulsionado pelo seu core o Zend Engine 2.0

Para Referência e mais detalhes vide [Link](http://php.net/manual/pt_BR/history.php.php)
