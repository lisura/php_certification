# Databases

## Introdução

Definição básica de base de dados é uma forma eficiente de armazenar e recuperar dados.

Um banco de dados relacional modela os dados de uma forma que eles sejam percebidos pelo usuário como tabelas, ou relações. A linguagem padrão dos Bancos de Dados Relacionais é a Structured Query Language (SQL).

## Structured Query Language (SQL)

*Structured Query Language* (Linguagem de Consulta Estruturada) ou **SQL**, é uma linguagem de pesquisa declarativa padrão para banco de dados relacional.  
Possui muitas variações e extensões produzidos pelos diferentes fabricantes de sistemas gerenciadores de bases de dados. Tipicamente a linguagem pode ser migrada de plataforma para plataforma sem mudanças estruturais principais.

### Tabelas

Nos modelos de bases de dados relacionais, a tabela é um conjunto de dados dispostos em *n* colunas e *m* linhas.  
As colunas são os campos da tabela, e caracterizam os tipos de dados que deverão constar na tabela (numéricos, alfa-numéricos, datas, etc). O número de linhas pode ser interpretado como o número de combinações de valores dos campos da tabela. A forma de identificar uma linha única é através de uma chave primária.

---

## Instruções Preparadas

Instruções Preparadas (*Prepared Statements*) são uma forma de executar um mesmo (ou similar) comando
SQL repetidamente de forma eficiente.  
Com uma instrução preparada, a query só é passada uma vez, mas pode ser executada repetidamente com os mesmos ou diferentes parâmentros. Os parâmentros não precisam ser colocados entre aspas, diminuindo a chance de sofrer *SQL injection*.

Exemplo:
````PHP
<?php
$sql = "INSERT INTO casa (nome, lema, sede) VALUES (?, ?, ?)";
````

---

## Transaction

*Transaction* permite executar um conjunto de operações SQL para garantir que o banco de dados nunca execute operações parciais. Num conjunto de operações, se um deles falhar, a reversão (*rollback*) ocorre para restaurar a base de dados. Se não houve erro, todo o conjunto de instruções é 'commitado'.

Exemplo:
````SQL
START TRANSACTION;

INSERT INTO casa (nome, lema, sede) VALUES ('Stark', 'O Inverno está chegando', 'Winterfell');
INSERT INTO casa (nome, lema, sede) VALUES ('Targaryen', 'Fogo e Sangue', 'Fortaleza Vermelha');

COMMIT;
````

---
